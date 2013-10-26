<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_fornecedor';
	try {
		
		if($_POST['action'] == 'EDITAR'){
		
			$user->getAcao($tabela, 'editar');
		
			$pdo = $connection->prepare("
					UPDATE tb_fornecedor SET 
							for_dsc = ?,							
							for_comentario = ?,							
							for_endereco = ?,							
							for_tel = ?,							
							for_cel = ?,							
							for_email = ?,							
							for_site = ?							
 					WHERE for_codigo = ?
			");
			$params = array(
				$_POST['for_dsc'],
				$_POST['for_comentario'],
				$_POST['for_endereco'],
				$_POST['for_tel'],
				$_POST['for_cel'],
				$_POST['for_email'],
				$_POST['for_site'],
				$_POST['for_codigo']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'ATIVAR_DESATIVAR'){
			$user->getAcao($tabela, 'ativar_desativar');
			
			$set = '';
			$msg = "Desativado com Sucesso";

			if($_POST['ativo']==1){
				$set .= ', dt_ativacao = NOW() ';
				$msg = "Ativado com Sucesso";
			}
			
			$pdo = $connection->prepare("
					UPDATE tb_fornecedor SET 
							ativo = ?
							{$set}
 					WHERE for_codigo = ?
			");
			$params = array(
				$_POST['ativo'],
				$_POST['for_codigo']
			);
			$pdo->execute($params);

			define(SAVED_SUCCESS, $msg);
		}
		else if ($_POST['action'] == 'INSERIR'){
		
			$user->getAcao($tabela, 'adicionar');
		
			$pdo = $connection->prepare("
				INSERT INTO tb_fornecedor 
					(
						for_dsc,						
						for_comentario,						
						for_endereco,						
						for_tel,						
						for_cel,						
						for_email,						
						for_site						
					) 
				VALUES 
					(
						?,	?,	?,	?,	?,	?,	?			
					)
			");
			$params = array(
				$_POST['for_dsc'],		
				$_POST['for_comentario'],		
				$_POST['for_endereco'],		
				$_POST['for_tel'],		
				$_POST['for_cel'],		
				$_POST['for_email'],		
				$_POST['for_site']		
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