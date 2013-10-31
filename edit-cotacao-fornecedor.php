<?php
	session_start();

	require_once 'includes/configure.inc.php';
	include_once 'includes/class/paginas.inc.php';
	$list = new paginas; 

	if(isset($_POST)){
		$cotacao_id = !empty($_POST['cotacao_id']) ? $_POST['cotacao_id'] : null;
		$prazo = !empty($_POST['prazo']) ? $_POST['prazo'] : null;
		$obs = !empty($_POST['obs']) ? $_POST['obs'] : null;
		
		if($cotacao_id!=null and $prazo!=null){
			$query = $list->db->query("
				update tb_cotacao set prazo_entrega = '{$prazo}', obs = '{$obs}' where codigo = {$cotacao_id}
			");

			if($query){
				echo '<script>alert("'.utf8_encode("Cotação").' Atualizada!");window.location = "menu-painel.php?idmenu=cotacoes";</script>';
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