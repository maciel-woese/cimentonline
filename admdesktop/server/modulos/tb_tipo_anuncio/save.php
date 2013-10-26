<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_tipo_anuncio';
	try {
		
		if($_POST['action'] == 'EDITAR'){
		
			$user->getAcao($tabela, 'editar');
		
			$pdo = $connection->prepare("
					UPDATE tb_tipo_anuncio SET 
							anu_nome = ?,							
							anu_tamanho = ?
 					WHERE anu_codigo = ?
			");
			$params = array(
				$_POST['anu_nome'],
				$_POST['anu_tamanho'],
				$_POST['anu_codigo']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'INSERIR'){
		
			$user->getAcao($tabela, 'adicionar');
		
			$pdo = $connection->prepare("
				INSERT INTO tb_tipo_anuncio 
					(
						anu_nome,						
						anu_tamanho					
					) 
				VALUES 
					(
						?,	?
					)
			");
			$params = array(
				$_POST['anu_nome'],		
				$_POST['anu_tamanho']	
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