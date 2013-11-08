<?php
	session_start();

	require_once 'includes/configure.inc.php';
	require_once 'includes/class/paginas.inc.php';
	require_once 'includes/class/redimensiona.inc.php';
	$list = new paginas; 
    $redim = new Redimensiona();

    if(isset($_POST)){
		$logo = !empty($_FILES['logo']['name']) ? $_FILES['logo'] : null;
    	if($logo!=null){
    		$logo = $redim->Redimensionar($logo, 110, "images", 550); 
    		$set .= "logo = '{$logo}'";

    		$query = $list->db->query("
				update tb_anuncios set
					logo = '{$logo}'
	            where anu_codigo = {$_POST['codigo']}
			");

			if($query){
				die('<script>alert("Dados Atualizado!");window.location = "meu-painel.php?idmenu=dados";</script>');
			}
    	}
    }

    die('<script>alert("Erro ao Atualizar!");history.back();</script>');
?>