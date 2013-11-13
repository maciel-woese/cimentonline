<?php
	session_start();

	require_once 'includes/configure.inc.php';
	include_once 'includes/class/paginas.inc.php';
	include_once 'includes/cotacao_pdf.php';
	$list = new paginas; 

	if(isset($_POST)){
		$cotacao_id = !empty($_POST['cotacao_id']) ? $_POST['cotacao_id'] : null;
		$prazo = !empty($_POST['prazo']) ? $_POST['prazo'] : null;
		$obs = !empty($_POST['obs']) ? $_POST['obs'] : null;
		$valor = !empty($_POST['valor']) ? $_POST['valor'] : '0.00';
		$validade_proposta = !empty($_POST['validade']) ? $_POST['validade'] : null;
		if($cotacao_id!=null and $prazo!=null){
			$query = $list->db->query("
				update tb_cotacao set prazo_entrega = '{$prazo}', obs = '{$obs}', valor = '{$valor}', validade_proposta = '{$validade_proposta}'
				where codigo = {$cotacao_id}
			");

			if($query){
				$query = $list->db->query("
					select cl.cli_email, f.for_email from tb_cotacao as c 
					inner join tb_clientes as cl on (cl.cli_codigo=c.cod_cliente)
					inner join tb_fornecedor as f on (f.for_codigo=c.cod_fornecedor)
					where codigo = {$cotacao_id} LIMIT 1
				");

				$cotacao = $this->db->fetch_assoc($query);

				$pdf = new PDF($cotacao_id);
				$pdf->AliasNbPages();
				$pdf->AddPage();				
				$pdf->getSubject();
				$pdf->getCotacao();
				$name = time().'.pdf';
				$pdf->Output($name, 'F');
				enviar_email(utf8_decode("Proposta de Cotação"), utf8_decode('Proposta de Cotação'), array(
					$cotacao['cli_email'],
					$cotacao['for_email']
				) $name);
				@unlink($name);

				echo '<script>alert("Cotação Atualizada!");window.location = "meu-painel.php?idmenu=cotacoes";</script>';
			}
			else{
				echo '<script>alert("Erro ao Atualizar!");history.back();</script>';
			}
		}
		else{
			echo '<script>alert("Erro ao Atualizar!");history.back();</script>';
		}
	}

?>