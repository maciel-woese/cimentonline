<?php
	session_start();

	require_once 'includes/configure.inc.php';
	require_once 'includes/class/paginas.inc.php';
	require_once 'includes/class/redimensiona.inc.php';
	$list = new paginas; 
    $redim = new Redimensiona();

	if(isset($_POST)){
		$empresa = !empty($_POST['empresa']) ? $_POST['empresa'] : null;
		$endereco = !empty($_POST['endereco']) ? $_POST['endereco'] : null;
		$estado = !empty($_POST['estado']) ? $_POST['estado'] : null;
		$cidade = !empty($_POST['cidade']) ? $_POST['cidade'] : null;
		$telefone = !empty($_POST['telefone']) ? $_POST['telefone'] : null;
		$celular = !empty($_POST['celular']) ? $_POST['celular'] : null;
		$email = !empty($_POST['email']) ? $_POST['email'] : null;
		$site = !empty($_POST['site']) ? $_POST['site'] : null;
				
		$ft01 = !empty($_FILES['ft01']) ? $_FILES['ft01'] : null;
		$ft02 = !empty($_FILES['ft02']) ? $_FILES['ft02'] : null;
		$ft03 = !empty($_FILES['ft03']) ? $_FILES['ft03'] : null;
		$ft04 = !empty($_FILES['ft04']) ? $_FILES['ft04'] : null;
		
		$set = '';

		if($ft01){$ft01 = $redim->Redimensionar($ft01, 160, "images"); $set .= "ft01 = '{$ft01}',";}
		if($ft02){$ft02 = $redim->Redimensionar($ft02, 160, "images"); $set .= "ft02 = '{$ft02}',";}
		if($ft03){$ft03 = $redim->Redimensionar($ft03, 160, "images"); $set .= "ft03 = '{$ft03}',";}
		if($ft04){$ft04 = $redim->Redimensionar($ft04, 160, "images"); $set .= "ft04 = '{$ft04}',";}

		$query = $list->db->query("
			update tb_fornecedor set
				for_dsc= '{$empresa}',
                for_endereco= '{$endereco}',
                est_codigo= '{$estado}',
                cid_codigo= '{$cidade}',
                for_tel= '{$telefone}',
                for_cel= '{$celular}',
                for_email= '{$email}',
                
                {$set}

                for_site= '{$site}'
            where for_codigo = {$_SESSION['codigo']}
		");

		if($query){
			echo '<script>alert("Dados Atualizado!");window.location = "meu-painel.php?idmenu=dados";</script>';
		}
		else{
			echo '<script>alert("Erro ao Atualizar!");history.back();</script>';
		}
	}

?>