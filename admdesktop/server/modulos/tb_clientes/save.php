<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'tb_clientes';
	try {
		
		if($_POST['action'] == 'EDITAR'){
		
			$user->getAcao($tabela, 'editar');
		
			$pdo = $connection->prepare("
					UPDATE tb_clientes SET 
							cli_nome = ?,							
							cli_nome_fan = ?,							
							cli_email = ?,							
							cli_tel = ?,							
							cli_cel = ?,							
							cli_cargo = ?,							
							est_codigo = ?,							
							cid_codigo = ?,							
							cli_dt_cadastro = ?							
 					WHERE cli_codigo = ?
			");
			$params = array(
				$_POST['cli_nome'],
				$_POST['cli_nome_fan'],
				$_POST['cli_email'],
				$_POST['cli_tel'],
				$_POST['cli_cel'],
				$_POST['cli_cargo'],
				$_POST['est_codigo'],
				$_POST['cid_codigo'],
				implode('-', array_reverse(explode('/', $_POST['cli_dt_cadastro_date'])))." ".$_POST['cli_dt_cadastro_time'],
				$_POST['cli_codigo']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'INSERIR'){
		
			$user->getAcao($tabela, 'adicionar');
		
			$pdo = $connection->prepare("
				INSERT INTO tb_clientes 
					(
						cli_nome,						
						cli_nome_fan,						
						cli_email,						
						cli_tel,						
						cli_cel,						
						cli_cargo,						
						est_codigo,						
						cid_codigo,						
						cli_dt_cadastro						
					) 
				VALUES 
					(
						?,	?,	?,	?,	?,	?,	?,	?,	?			
					)
			");
			$params = array(
				$_POST['cli_nome'],		
				$_POST['cli_nome_fan'],		
				$_POST['cli_email'],		
				$_POST['cli_tel'],		
				$_POST['cli_cel'],		
				$_POST['cli_cargo'],		
				$_POST['est_codigo'],		
				$_POST['cid_codigo'],		
				implode('-', array_reverse(explode('/', $_POST['cli_dt_cadastro_date'])))." ".$_POST['cli_dt_cadastro_time']		
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