<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'correios_estados';
	$userMain = $user->getUser();
	$user_id = null;
	if($userMain){
		$user_id = $userMain['id'];
	}
	try {
		
		if($_POST['action'] == 'EDITAR'){
			$pdo = $connection->prepare("
					UPDATE correios_estados SET 
							uf = ?, 
							descricao = ?, 
							ativo = ?, 
							alterado_por = ?
 					WHERE id = ?
			");
			$params = array(
				$_POST['uf'],
				$_POST['descricao'],
				$_POST['ativo'],
				$user_id,
				$_POST['id']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'INSERIR'){
		
			$pdo = $connection->prepare("
				INSERT INTO correios_estados 
					(
						uf, 
						descricao, 
						ativo, 
						cadastrado_por, 
						data_cadastro, 
						alterado_por
					) 
				VALUES 
					(
						?,	?,	?,	?,	?,	?
					)
			");
			$params = array(
				$_POST['uf'], 
				$_POST['descricao'], 
				'S', 
				$user_id, 
				date('Y-m-d H:i:s'), 	
				$user_id
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