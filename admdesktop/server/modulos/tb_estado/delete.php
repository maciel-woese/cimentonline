<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_estado';
	try {
		if($_POST['action'] == 'DELETAR'){
			$pdo = $connection->prepare("DELETE FROM tb_estado WHERE est_codigo = ?");
			$pdo->execute(array(
				$_POST['est_codigo']
			));
			
			echo json_encode(array('success'=>true, 'msg'=>DESATIVADO_SUCESSO));
		}
		else{
			throw new PDOException(utf8_encode(ACTION_NOT_FOUND));
		}
	}
	catch (PDOException $e) {
		echo json_encode(array('success'=>false, 'msg'=>ERRO_DELETE_DATA, 'erro'=>$e->getMessage()));
	}
}