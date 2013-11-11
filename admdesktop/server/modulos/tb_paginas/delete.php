<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_paginas';
	try {
		if($_POST['action'] == 'DELETAR'){
		
			$user->getAcao($tabela, 'deletar');
		
			$pdo = $connection->prepare("DELETE FROM tb_paginas WHERE cod_pagina = ?");
			$pdo->execute(array(
				$_POST['id']
			));
			
			echo json_encode(array('success'=>true, 'msg'=>REMOVED_SUCCESS));
		}
		else{
			throw new PDOException(utf8_encode(ACTION_NOT_FOUND));
		}
	}
	catch (PDOException $e) {
		echo json_encode(array('success'=>false, 'msg'=>ERRO_DELETE_DATA, 'erro'=>$e->getMessage()));
	}
}