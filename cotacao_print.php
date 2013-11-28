<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', '1');
	ini_set('allow_url_fopen', 'on');

	require_once 'includes/configure.inc.php';
	require_once 'includes/class/paginas.inc.php';
	require_once 'includes/cotacao_pdf.php';
	$list = new paginas;
	
	if(isset($_GET)){
		$cotacao_id = !empty($_GET['cotacao_id']) ? $_GET['cotacao_id'] : null;
		$query = $list->db->query("
			select cl.cli_email, f.for_email from tb_cotacao as c 
			inner join tb_clientes as cl on (cl.cli_codigo=c.cod_cliente)
			inner join tb_fornecedor as f on (f.for_codigo=c.cod_fornecedor)
			where codigo = {$cotacao_id} LIMIT 1
		");

		$cotacao = $list->db->fetch_assoc($query);

		$pdf = new PDF($cotacao_id);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->Ln(20);
		$header = array(
			'Especificação dos Produtos', 
			'Quantidades',
			'Preço Unit.',
			'Tipo de Entrega'
		);
		$pdf->table($header, $pdf->cotacao);

		//$pdf->Image('http://maps.googleapis.com/maps/api/staticmap?center='.$_GET['center'].'&zoom=15&size=200x200&markers=size:mide%7Ccolor:green%7C'.$_GET['center'].'&sensor=false', 10,6,30);
		$pdf->Output();		
	}
?>