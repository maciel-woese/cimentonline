<?php
	session_start();
	require_once 'configure.inc.php';
	require_once 'pdf/fpdf.php';

	class PDF extends FPDF{
		public $db = null;
		public $fornecedor = null;
		public $cotacao_id = null;
		public $cotacao    = array();

		function pdf($cotacao_id){
			parent::__construct('P');
			$this->db =	$GLOBALS['db'];
			$this->cotacao_id = $cotacao_id;
			$this->setDados();
		}

		function setDados(){
			$query = $this->db->query("
				SELECT t.descricao as tipo, c.*, t.valor, e.descricao as entrega from tb_cotacao as c 
				inner join tb_tipo_cimento as t on (c.tp_cimento=t.codigo)
				inner join tb_tipo_entrega as e on (c.tp_entrega=e.codigo)
				where c.codigo = {$this->cotacao_id} limit 1
			");

			$this->cotacao = $this->db->fetch_assoc($query);

			$query = $this->db->query("
				SELECT f.*, e.est_dsc, c.cid_dsc FROM  `tb_fornecedor` as f 
				left join tb_estado as e ON (f.est_codigo=e.est_codigo)
				left join tb_cidade as c ON (f.cid_codigo=c.cid_codigo)
				where for_codigo = {$this->cotacao['cod_fornecedor']} limit 1
			");
			$this->fornecedor = $this->db->fetch_assoc($query);

			
		}

		function Header(){
			if(!empty($fornecedor['logo'])){
		    	$this->Image($fornecedor['logo'], 10,6,30);	
			}
			$data = date('d')." de ".monthName(date('m'))." de ".date('Y');

		    $this->Cell(60);
		    $this->SetFont('Arial','B',15);
		    $this->Cell(30,10,$this->fornecedor['for_dsc'],0,0);
		    $this->Ln();
		    $this->SetFont('Arial','',14);
		    $this->Cell(60);
		    $this->Cell(30,5,$this->fornecedor['for_endereco'],0,0);
		    $this->Ln();
		    $this->Cell(60);
		    $this->Cell(30,10,$this->fornecedor['for_tel'].", ".$this->fornecedor['for_cel'],0,0);
		    $this->Ln();
		    $this->Cell(60);
		    $this->Cell(30,5,$this->fornecedor['for_email'],0,0);
		    $this->Ln();
		    $this->Cell(60);
		    $this->Cell(30,10,$this->fornecedor['for_site'],0,0);
		    $this->SetFont('Arial','',12);
		    $this->Ln();
		    $this->Cell(60);
		    $this->Cell(30,10, $this->fornecedor['cid_dsc'].", ".$data,0,0);
		}

		function getSubject(){
			$this->Ln(20);
			$this->MultiCell(0,5, utf8_decode("Atendendo seu pedido de cotação nº (".$this->cotacao_id.") que nos foi enviada pelo sistema CimentOnline®, abaixo informo as condições para fornecimento dos produtos solicitados."));
		}

		function getCotacao(){
			$this->Ln();
			$header = array(
				'Especificação dos Produtos', 
				'Quantidades',
				'Preço Unit.',
				'Pzos pgto',
				'Tipo de Entrega'
			);
			$this->table($header, $this->cotacao);

			$this->Ln(20);
			$this->MultiCell(0,5, utf8_decode("Informamos que temos plenas condições para atender as quantidades solicitadas, dentro do prazo de entrega definido e das condições comerciais propostas, aceitas e acordadas entre nossas empresas."));
			$this->Ln();
			$this->MultiCell(0, 5, utf8_decode('Condições para o atendimento:

			>	Os preços constantes na cotação são com ICMS incluso de acordo com a legislação pertinente e refletem as condições específicas de cada negociação e podem refletir descontos incondicionais. Ou seja, os preços propostos nesse pedido, após o aceite do cliente e confirmação de nossa empresa, refletem individualmente a realidade econômica, financeira, comercial, jurídica e tributária na data vigente. Quaisquer modificações ou alterações tributárias ou de qualquer outra natureza, quer sejam criando, extinguindo, aumentando ou modificando tributos, contribuições fiscais, ou quaisquer outras espécies de prestação pecuniária compulsória, poderão determinar a revisão e/ou alteração nos preços informados antes da conclusão do atendimento ao pedido aceito;
			>	Os preços e condições são válidos por 3 dias e estarão sujeitos a alterações apenas para pedidos ainda não aceitos;
			>	Todos os pedidos estão sujeitos à aceitação de nossa empresa, que se dará via confirmação por e-mail, fax e/ou ligação telefônica com o contato que assina a cotação;
			>	Qualquer fatura que não tiver sido paga pelo cliente ou comprador após o prazo concedido e acordado na proposta aceita pelas partes, sofrerá os encargos constantes nas observações dos boletos que acobertam a operação;
			>	As mercadorias serão entregues na obra ou retiradas em nossos depósitos dentro do prazo negociado.
			'));

			
			$this->Ln();
			$this->MultiCell(0, 5, utf8_decode('Atenciosamente,
			'.$this->fornecedor['for_dsc']));
		}

		function table($header, $row){
		    // Column widths
		    $w = array(60, 30, 35, 30, 35);
		    // Header
		    for($i=0;$i<count($header);$i++)
		        $this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
		    $this->Ln();
		    // Data
	        $this->Cell($w[0],6,$row['tipo'],'LR');
	        $this->Cell($w[1],6,$row['qtd_sacos'],'LR');
	        $this->Cell($w[2],6,$row['valor'],'LR',0,'R');
	        $this->Cell($w[3],6,"10 dias*",'LR',0,'R');
	        $this->Cell($w[4],6,$row['entrega'],'LR',0,'R');
	        $this->Ln();

	        //$row['prazo_entrega']

	        $this->Cell(60,7, utf8_decode("Prazo de entrega"),1,0,'C');
	        $this->Cell(95,7, utf8_decode("Observações pertinentes"),1,0,'C');
	        $this->Cell(35,7, utf8_decode("Validade"),1,0,'C');
		    $this->Ln();

		    $this->Cell(60,6,$row['prazo_entrega'],'LR');
	        $this->Cell(95,6,$row['obs'],'LR');
	        $this->Cell(35,6,'3 dias','LR',0,'R');
	        $this->Ln();

		    // Closing line
		    $this->Cell(array_sum($w),0,'','T');
		}

		function Footer(){
		    $this->SetY(-15);
		    $this->SetFont('Arial','I',8);
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
?>