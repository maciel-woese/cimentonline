<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	try {
		require('../../autoLoad.php');
		$buscar = new Buscar();
		$tabela = 'tb_cidade';
		
		if( isset($_POST['action']) AND $_POST['action'] == 'GET_VALUES' ){
			$pdo = $connection->prepare("
				SELECT *
				FROM tb_cidade
				WHERE cid_codigo=:id
			");
			
			$pdo->bindParam(':id', $_POST['id']);
			$pdo->execute();
		
			$linhas = $pdo->fetch(PDO::FETCH_OBJ);
			echo json_encode( array('success'=>true, 'dados'=>$linhas) );
		}
		else if (isset($_POST['action']) AND $_POST['action'] == 'LIST_COMBO') {
			$buscar->setBusca(array('cod_estado', 'tb_cidade.cod_estado'), $_POST['cod_estado']);
			$filtro = $buscar->getSql();
			$sql = "
				SELECT cid_codigo as id, cid_dsc as descricao 
				FROM tb_cidade
				{$filtro}
			";
			$pdo = $connection->prepare($sql);
			$pdo->execute( $buscar->getArrayExecute() );
			
			$linhas = $pdo->fetchAll(PDO::FETCH_OBJ);
			$rows = array();
			foreach ($linhas as $key => $value) {
				$rows[$key] = $value;
				$rows[$key]->descricao = mb_strtoupper($rows[$key]->descricao, UTF8);
			}
			echo json_encode( array('dados'=>$rows) );
		}
		else if (isset($_POST['action']) and isset($_POST['query']) and !empty($_POST['query'])) {
			$pag = new Paginar($_POST);
			
			$page 	= $pag->getPage();
			$start	= $pag->getStart();
			$limit	= $pag->getLimit();
			$sort 	= $pag->getSort();
			$order 	= $pag->getOrder();

			if (isset($_POST['sort'])){
				$sortJson = json_decode( stripslashes($_POST['sort']), true);
				$sort = trim($sortJson[0]['property']);
				$order = trim($sortJson[0]['direction']);
			}

			$pdo = $connection->prepare("
				SELECT SQL_CACHE 
					tb_cidade.id,
					tb_cidade.uf_sigla, 
					CASE WHEN
						tb_cidade.loc_nome_abreviado != tb_cidade.loc_nome THEN CONCAT(UPPER(tb_cidade.loc_nome_abreviado), ' ', UPPER(tb_cidade.loc_nome))
					ELSE
						UPPER(tb_cidade.loc_nome)
					END AS loc_nome,
					tb_cidade.cep,
					tb_cidade.cod_ibge,
					tb_cidade.ativo,
					tb_cidade.data_cadastro,
					UPPER(usuarios.nome) AS cadastrado_por,
					DATE_FORMAT(tb_cidade.data_cadastro, '%H:%i:%s') as data_cadastro_time, 
					DATE_FORMAT(tb_cidade.data_cadastro, '%Y-%m-%d') as data_cadastro_date 
				FROM tb_cidade INNER JOIN usuarios ON (usuarios.id=tb_cidade.cadastrado_por)
				WHERE tb_cidade.uf_sigla = '$_POST[uf_sigla]' AND tb_cidade.loc_tipo = 'M' AND (tb_cidade.loc_nome_abreviado like '%$_POST[query]%' OR tb_cidade.loc_nome like '%$_POST[query]%') 
				ORDER BY {$sort} {$order} 
				LIMIT $_POST[start], $_POST[limit]
			");
			$pdo->execute();
			
			$linhas = $pdo->fetchAll(PDO::FETCH_OBJ);
			$rows = array();
			foreach ($linhas as $key => $value) {//esse aqui precisa?
				$rows[$key] = $value;
				$rows[$key]->descricao = $rows[$key]->descricao;
			}
			echo json_encode( array('dados'=>$rows) );
		}
		else{
			$pag = new Paginar($_POST);
			
			$page 	= $pag->getPage();
			$start	= $pag->getStart();
			$limit	= $pag->getLimit();
			$sort 	= $pag->getSort();
			$order 	= $pag->getOrder();
			
			$result = array();
			
			$buscar->setBusca(array('uf_sigla', 'tb_cidade.uf_sigla'), $_POST['uf_sigla']);

			if (isset($_POST['action']) AND $_POST['action'] == 'FILTER') {
				$buscar->setBusca(array('loc_nome_abreviado', 'tb_cidade.loc_nome_abreviado'), $_POST['loc_nome_abreviado'], 'like');
				$buscar->setBusca(array('loc_nome', 'tb_cidade.loc_nome'), $_POST['loc_nome'], 'like');
				$buscar->setBusca(array('cep', 'tb_cidade.cep'), $_POST['cep'], 'like');
				$buscar->setBusca(array('situacao_localidade', 'tb_cidade.situacao_localidade'), $_POST['situacao_localidade']);
				$buscar->setBusca(array('loc_tipo', 'tb_cidade.loc_tipo'), $_POST['loc_tipo'], 'like');
				$buscar->setBusca(array('subordinacao_id', 'tb_cidade.subordinacao_id'), $_POST['subordinacao_id']);
				$buscar->setBusca(array('cod_ibge', 'tb_cidade.cod_ibge'), $_POST['cod_ibge'], 'like');
				$buscar->setBusca(array('ativo', 'tb_cidade.ativo'), $_POST['ativo'], 'like');
				$buscar->setBusca(array('cadastrado_por', 'tb_cidade.cadastrado_por'), $_POST['cadastrado_por']);
				$buscar->setBusca(array('data_cadastro', 'tb_cidade.data_cadastro'), implode('-', array_reverse(explode('/', $_POST['data_cadastro_date'])))." ".$_POST['data_cadastro_time'], 'like');
				$buscar->setBusca(array('alterado_por', 'tb_cidade.alterado_por'), $_POST['alterado_por']);
			}
			
			if (isset($_POST['sort'])) {
				$sortJson = json_decode( stripslashes($_POST['sort']), true);
				$sort = trim($sortJson[0]['property']);
				$order = trim($sortJson[0]['direction']);
			}
			
			$filtro = $buscar->getSql();
			
			$pdo = $connection->prepare("
				SELECT SQL_CACHE count(*) as total 
				FROM tb_cidade INNER JOIN correios_estados ON
					(tb_cidade.uf_sigla=correios_estados.uf) 
				{$filtro} AND tb_cidade.loc_tipo = 'M';
			");
			$pdo->execute( $buscar->getArrayExecute() );
			
			$query = $pdo->fetch(PDO::FETCH_OBJ);
			
			$countRow = $query->total;
			
			$pdo = $connection->prepare("
				SELECT SQL_CACHE 
					tb_cidade.id,
					tb_cidade.uf_sigla, 
					CASE WHEN
						tb_cidade.loc_nome_abreviado != tb_cidade.loc_nome THEN CONCAT(UPPER(tb_cidade.loc_nome_abreviado), ' ', UPPER(tb_cidade.loc_nome))
					ELSE
						UPPER(tb_cidade.loc_nome)
					END AS loc_nome,
					tb_cidade.cep,
					tb_cidade.cod_ibge,
					tb_cidade.ativo,
					tb_cidade.data_cadastro,
					UPPER(usuarios.nome) AS cadastrado_por,
					DATE_FORMAT(tb_cidade.data_cadastro, '%H:%i:%s') as data_cadastro_time, 
					DATE_FORMAT(tb_cidade.data_cadastro, '%Y-%m-%d') as data_cadastro_date 
				FROM tb_cidade INNER JOIN usuarios ON (usuarios.id=tb_cidade.cadastrado_por)
				{$filtro} AND tb_cidade.loc_tipo = 'M' 
				ORDER BY {$sort} {$order}
				LIMIT {$start}, {$limit};
			");
			$pdo->execute( $buscar->getArrayExecute() );
			
			$query = $pdo->fetchAll(PDO::FETCH_OBJ);

			$result["total"] = $countRow;
			$result["dados"] = $query;
			
			echo json_encode($result);
		}
	} 
	catch (PDOException $e) {
		echo json_encode(array('dados'=>array(),'total'=>0, 'erro'=>$e->getMessage()));
	}	
}
?>