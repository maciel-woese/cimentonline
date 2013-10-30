<?php
	session_start();

	require_once 'includes/configure.inc.php';
	include_once 'includes/class/paginas.inc.php';
	$list = new paginas; 

	if(isset($_POST)){
		$anuncio_ids 	= (isset($_POST['anuncio_ids']) and !empty($_POST['anuncio_ids'])) ? $_POST['anuncio_ids'] : null;
		$solicitante 	= (isset($_POST['solicitante']) and !empty($_POST['solicitante']))  ? $_POST['solicitante'] : null;
		$contato 		= (isset($_POST['contato']) and !empty($_POST['contato'])) ? $_POST['contato'] : null;
		$telefone 		= (isset($_POST['telefone']) and !empty($_POST['telefone'])) ? $_POST['telefone'] : null;
		$email 			= (isset($_POST['email']) and !empty($_POST['email'])) ? $_POST['email'] : null;
		$quant 			= (isset($_POST['quant']) and !empty($_POST['quant'])) ? $_POST['quant'] : null;
		$tipo 			= (isset($_POST['tipo']) and !empty($_POST['tipo'])) ? $_POST['tipo'] : null;
		$marca 			= (isset($_POST['marca']) and !empty($_POST['marca'])) ? $_POST['marca'] : null;
		$prazo 			= (isset($_POST['prazo']) and !empty($_POST['prazo'])) ? $_POST['prazo'] : null;
		$tipo_entrega 	= (isset($_POST['tipo_entrega']) and !empty($_POST['tipo_entrega'])) ? $_POST['tipo_entrega'] : null;
		$endereco 		= (isset($_POST['endereco']) and !empty($_POST['endereco'])) ? $_POST['endereco'] : null;
		$observacoes 	= (isset($_POST['observacoes']) and !empty($_POST['observacoes'])) ? $_POST['observacoes'] : null;

		if($anuncio_ids==null or $solicitante==null or $contato==null or $telefone==null or 
			$email==null or $quant==null or $prazo==null or $endereco==null){
			
			$query = $list->db->query("
				INSERT INTO  `cimentonline`.`tb_cotacao` (
					`cod_cliente` ,
					`nm_solicitante` ,
					`nm_contato` ,
					`telefone` ,
					`email` ,
					`qtd_sacos` ,
					`tp_cimento` ,
					`marca` ,
					`prazo_entrega` ,
					`tp_entrega` ,
					`local_entrega` ,
					`obs`
				)
				VALUES (
					{$_SESSION['codigo']} , '{$solicitante}' , '{$contato}' , '{$telefone}' , '{$email}' , '{$quant}' , 
					'{$tipo}' , '{$marca}' , '{$prazo}' , '{$tipo_entrega}' , '{$endereco}' , '{$observacoes}'
				);
			");

			echo '<script>alert("Cotação Cadastrada!");window.location = "index.php";</script>';
		}
		else{
			echo '<script>alert("Erro ao Cadastrar!");history.back();</script>';
		}
	}
	else{
		echo '<script>alert("Erro ao Cadastrar!");history.back();</script>';
	}

?>