<?php
	session_start();

	require_once 'includes/configure.inc.php';
	include_once 'includes/class/paginas.inc.php';
	$list = new paginas; 

	if(isset($_POST)){
		$fornecedores 	= !empty($_POST['fornecedores']) ? $_POST['fornecedores'] : null;
		$solicitante 	= !empty($_POST['solicitante']) ? $_POST['solicitante'] : null;
		$contato 		= !empty($_POST['contato']) ? $_POST['contato'] : null;
		$telefone 		= !empty($_POST['telefone']) ? $_POST['telefone'] : null;
		$email 			= !empty($_POST['email']) ? $_POST['email'] : null;
		$quant 			= !empty($_POST['quant']) ? $_POST['quant'] : null;
		$tipo 			= !empty($_POST['tipo']) ? $_POST['tipo'] : null;
		$marca 			= !empty($_POST['marca']) ? $_POST['marca'] : null;
		$prazo 			= !empty($_POST['prazo']) ? $_POST['prazo'] : null;
		$tipo_entrega 	= !empty($_POST['tipo_entrega']) ? $_POST['tipo_entrega'] : null;
		$endereco 		= !empty($_POST['endereco']) ? $_POST['endereco'] : null;
		$observacoes 	= !empty($_POST['observacoes']) ? $_POST['observacoes'] : null;

		if($fornecedores!=null and $solicitante!=null and $contato!=null and $telefone!=null or 
			$email==null and $quant!=null and $prazo!=null and $endereco!=null){
			
			$fornecedores = explode(',', $fornecedores);

			foreach ($fornecedores as $key => $value) {
				$query = $list->db->query("
					INSERT INTO  `cimentonline`.`tb_cotacao` (
						`cod_cliente` ,
						`cod_fornecedor`,
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
						`obs`,
						`data_cadastro`
					)
					VALUES (
						{$_SESSION['codigo']} , '{$value}', '{$solicitante}' , '{$contato}' , '{$telefone}' , '{$email}' , '{$quant}' , 
						'{$tipo}' , '{$marca}' , '{$prazo}' , '{$tipo_entrega}' , '{$endereco}' , '{$observacoes}', NOW()
					);
				");				
			}
			

			echo '<script>alert("'.utf8_encode("Cotação").' Cadastrada!");window.location = "index.php";</script>';
		}
		else{
			echo '<script>alert("Erro ao Cadastrar!");history.back();</script>';
		}
	}
	else{
		echo '<script>alert("Erro ao Cadastrar!");history.back();</script>';
	}

?>