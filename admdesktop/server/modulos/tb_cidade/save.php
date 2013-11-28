<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	require('../../autoLoad.php');
	$tabela = 'correios_localidades';
	$userMain = $user->getUser();
	$user_id = null;
	if($userMain){
		$user_id = $userMain['id'];
	}
	try {
		if ($_POST['cep'] == "__.___-___") {
			$cep = "";
		} else {
			$cep = $_POST['cep'];
		}

		if($_POST['action'] == 'EDITAR'){
			$pdo = $connection->prepare("
					UPDATE correios_localidades SET 
							uf_sigla = ?,							
							loc_nome_abreviado = ?,							
							loc_nome = ?,							
							cep = ?,							
							situacao_localidade = ?,							
							loc_tipo = ?,							
							subordinacao_id = ?,							
							cod_ibge = ?,							
							ativo = ?,							
							alterado_por = ?							
 					WHERE id = ?
			");
			$params = array(
				mb_strtoupper($_POST['uf_sigla'], 'UTF-8'),
				mb_strtoupper($_POST['loc_nome_abreviado'], 'UTF-8'),
				mb_strtoupper($_POST['loc_nome'], 'UTF-8'),
				$cep,
				$_POST['situacao_localidade'],
				mb_strtoupper($_POST['loc_tipo'], 'UTF-8'),
				NULL,
				mb_strtoupper($_POST['cod_ibge'], 'UTF-8'),
				mb_strtoupper($_POST['ativo'], 'UTF-8'),
				$user_id,
				$_POST['id']
			);
			$pdo->execute($params);
		}
		else if ($_POST['action'] == 'INSERIR'){

			if ($_POST['cep'] == "__.___-___") {
				$cep = "";
			} else {
				$cep = $_POST['cep'];
			}

			$pdo = $connection->prepare("
				INSERT INTO correios_localidades 
					(
						uf_sigla,						
						loc_nome_abreviado,						
						loc_nome,						
						cep,						
						situacao_localidade,						
						loc_tipo,						
						subordinacao_id,						
						cod_ibge,						
						ativo,						
						cadastrado_por,						
						data_cadastro,						
						alterado_por						
					) 
				VALUES 
					(
						?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?,	?			
					)
			");
			$params = array(
				mb_strtoupper($_POST['uf_sigla'], 'UTF-8'),
				mb_strtoupper($_POST['loc_nome_abreviado'], 'UTF-8'),
				mb_strtoupper($_POST['loc_nome'], 'UTF-8'),
				$cep,		
				$_POST['situacao_localidade'],
				mb_strtoupper($_POST['loc_tipo'], 'UTF-8'),
				NULL,		
				mb_strtoupper($_POST['cod_ibge'], 'UTF-8'),
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