<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	try {
		require('../../autoLoad.php');
		$buscar = new Buscar();
		$tabela = 'tb_clientes';
		
		if( isset($_POST['action']) AND $_POST['action'] == 'GET_VALUES' ){
		
			$pdo = $connection->prepare("
				SELECT *, 
					DATE_FORMAT(cli_dt_cadastro, '%H:%i:%s') as cli_dt_cadastro_time, 
					DATE_FORMAT(cli_dt_cadastro, '%Y-%m-%d') as cli_dt_cadastro_date 
				FROM tb_clientes
				WHERE cli_codigo=:id
			");
			
			$pdo->bindParam(':id', $_POST['id']);
			$pdo->execute();
		
			$linhas = $pdo->fetch(PDO::FETCH_OBJ);
			echo json_encode( array('success'=>true, 'dados'=>$linhas) );
		}
	
		else{
			$pag = new Paginar($_POST);
			
			$page 	= $pag->getPage();
			$start	= $pag->getStart();
			$limit	= $pag->getLimit();
			$sort 	= $pag->getSort();
			$order 	= $pag->getOrder();
			
			$result = array();
			
			if(isset($_POST['action']) AND $_POST['action'] == 'FILTER'){
				$buscar->setBusca(array('cli_nome', 'tb_clientes.cli_nome'), $_POST['cli_nome'], 'like');
				$buscar->setBusca(array('cli_nome_fan', 'tb_clientes.cli_nome_fan'), $_POST['cli_nome_fan'], 'like');
				$buscar->setBusca(array('cli_email', 'tb_clientes.cli_email'), $_POST['cli_email'], 'like');
				$buscar->setBusca(array('cli_tel', 'tb_clientes.cli_tel'), $_POST['cli_tel'], 'like');
				$buscar->setBusca(array('cli_cel', 'tb_clientes.cli_cel'), $_POST['cli_cel'], 'like');
				$buscar->setBusca(array('cli_cargo', 'tb_clientes.cli_cargo'), $_POST['cli_cargo'], 'like');
				$buscar->setBusca(array('est_codigo', 'tb_clientes.est_codigo'), $_POST['est_codigo']);
				$buscar->setBusca(array('cid_codigo', 'tb_clientes.cid_codigo'), $_POST['cid_codigo']);
				$buscar->setBusca(array('cli_dt_cadastro', 'tb_clientes.cli_dt_cadastro'), implode('-', array_reverse(explode('/', $_POST['cli_dt_cadastro_date'])))." ".$_POST['cli_dt_cadastro_time'], 'like');
			}
			
			if (isset($_POST['sort']))
			{
				$sortJson = json_decode( $_POST['sort'] );
				$sort = trim(rtrim(addslashes($sortJson[0]->property )));
				$order = trim(rtrim(addslashes( $sortJson[0]->direction )));
			}
			
			$filtro = $buscar->getSql();
			
			$pdo = $connection->prepare("
				SELECT count(*) as total 
				FROM tb_clientes 
				{$filtro};
			");
			$pdo->execute( $buscar->getArrayExecute() );
			
			$query = $pdo->fetch(PDO::FETCH_OBJ);
			
			$countRow = $query->total;
			
			$pdo = $connection->prepare("
				SELECT tb_clientes.*, tb_estado.est_dsc, tb_cidade.cid_dsc,
					DATE_FORMAT(tb_clientes.cli_dt_cadastro, '%H:%i:%s') as cli_dt_cadastro_time, 
					DATE_FORMAT(tb_clientes.cli_dt_cadastro, '%Y-%m-%d') as cli_dt_cadastro_date 
				FROM tb_clientes 
				left join tb_estado ON (tb_clientes.est_codigo=tb_estado.est_codigo)
				left join tb_cidade ON (tb_clientes.cid_codigo=tb_cidade.cid_codigo)
				{$filtro} 
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