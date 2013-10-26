<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_anunciante';
	try {
		
		if($_POST['action'] == 'EDITAR'){
		
			$user->getAcao($tabela, 'editar');
		
			$pdo = $connection->prepare("
					UPDATE tb_anunciante SET 
							anun_dsc = ?,							
							anun_comentario = ?,							
							anun_endereco = ?,							
							anun_tel = ?,							
							anun_cel = ?,							
							anun_email = ?,							
							anun_site = ?,							
							anun_dt_cadastro = ?							
 					WHERE cid_codigo = ?
			");
			$params = array(
				$_POST['anun_dsc'],
				$_POST['anun_comentario'],
				$_POST['anun_endereco'],
				$_POST['anun_tel'],
				$_POST['anun_cel'],
				$_POST['anun_email'],
				$_POST['anun_site'],
				implode('-', array_reverse(explode('/', $_POST['anun_dt_cadastro_date'])))." ".$_POST['anun_dt_cadastro_time'],
				$_POST['cid_codigo']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'INSERIR'){
		
			$user->getAcao($tabela, 'adicionar');
		
			$pdo = $connection->prepare("
				INSERT INTO tb_anunciante 
					(
						anun_dsc,						
						anun_comentario,						
						anun_endereco,						
						anun_tel,						
						anun_cel,						
						anun_email,						
						anun_site,						
						anun_dt_cadastro						
					) 
				VALUES 
					(
						?,	?,	?,	?,	?,	?,	?,	?			
					)
			");
			$params = array(
				$_POST['anun_dsc'],		
				$_POST['anun_comentario'],		
				$_POST['anun_endereco'],		
				$_POST['anun_tel'],		
				$_POST['anun_cel'],		
				$_POST['anun_email'],		
				$_POST['anun_site'],		
				implode('-', array_reverse(explode('/', $_POST['anun_dt_cadastro_date'])))." ".$_POST['anun_dt_cadastro_time']		
			);
			$pdo->execute($params);
		}
		else{
			throw new PDOException(utf8_encode(ACTION_NOT_FOUND));
		}
		echo json_encode(array('success'=>true, 'msg'=>SAVED_SUCCESS));
	}
	catch (PDOException $e) {
		echo json_encode(array('success'=>false, 'msg'=>ERROR_SAVE_DATA, 'erro'=>$e->getMessage()));
	}
}