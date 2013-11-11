<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_opcoes_anuncio';
	try {
		
		if($_POST['action'] == 'EDITAR'){
		
			$user->getAcao($tabela, 'editar');
		
			$pdo = $connection->prepare("
					UPDATE tb_opcoes_anuncio SET 
							tipo_anucio_id = ?,							
							valor = ?,							
							periodo = ?							
 					WHERE id = ?
			");
			$params = array(
				$_POST['tipo_anucio_id'],
				$_POST['valor'],
				$_POST['periodo'],
				$_POST['id']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'INSERIR'){
		
			$user->getAcao($tabela, 'adicionar');
		
			$pdo = $connection->prepare("
				INSERT INTO tb_opcoes_anuncio 
					(
						tipo_anucio_id,						
						valor,						
						periodo						
					) 
				VALUES 
					(
						?,	?,	?			
					)
			");
			$params = array(
				$_POST['tipo_anucio_id'],		
				$_POST['valor'],		
				$_POST['periodo']		
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