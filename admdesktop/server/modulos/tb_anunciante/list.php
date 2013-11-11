<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	try {
		require('../../autoLoad.php');
		$buscar = new Buscar();
		$tabela = 'tb_anunciante';
		
		if( isset($_POST['action']) AND $_POST['action'] == 'GET_VALUES' ){
		
			$pdo = $connection->prepare("
				SELECT *, 
					DATE_FORMAT(anun_dt_cadastro, '%H:%i:%s') as anun_dt_cadastro_time, 
					DATE_FORMAT(anun_dt_cadastro, '%Y-%m-%d') as anun_dt_cadastro_date 
				FROM tb_anunciante
				WHERE cid_codigo=:id
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
				$buscar->setBusca(array('anun_dsc', 'tb_anunciante.anun_dsc'), $_POST['anun_dsc'], 'like');
				$buscar->setBusca(array('anun_comentario', 'tb_anunciante.anun_comentario'), $_POST['anun_comentario'], 'like');
				$buscar->setBusca(array('anun_endereco', 'tb_anunciante.anun_endereco'), $_POST['anun_endereco'], 'like');
				$buscar->setBusca(array('anun_tel', 'tb_anunciante.anun_tel'), $_POST['anun_tel'], 'like');
				$buscar->setBusca(array('anun_cel', 'tb_anunciante.anun_cel'), $_POST['anun_cel'], 'like');
				$buscar->setBusca(array('anun_email', 'tb_anunciante.anun_email'), $_POST['anun_email'], 'like');
				$buscar->setBusca(array('anun_site', 'tb_anunciante.anun_site'), $_POST['anun_site'], 'like');
				$buscar->setBusca(array('anun_dt_cadastro', 'tb_anunciante.anun_dt_cadastro'), implode('-', array_reverse(explode('/', $_POST['anun_dt_cadastro_date'])))." ".$_POST['anun_dt_cadastro_time'], 'like');
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
				FROM tb_anunciante INNER JOIN tb_estado ON
					(tb_anunciante.est_codigo=tb_estado.est_codigo) INNER JOIN tb_cidade ON
					(tb_anunciante.cid_codigo=tb_cidade.cid_codigo) 
				{$filtro};
			");
			$pdo->execute( $buscar->getArrayExecute() );
			
			$query = $pdo->fetch(PDO::FETCH_OBJ);
			
			$countRow = $query->total;
			
			$pdo = $connection->prepare("
				SELECT tb_anunciante.*, 
					DATE_FORMAT(tb_anunciante.anun_dt_cadastro, '%H:%i:%s') as anun_dt_cadastro_time, 
					DATE_FORMAT(tb_anunciante.anun_dt_cadastro, '%Y-%m-%d') as anun_dt_cadastro_date, tb_estado.est_dsc, tb_cidade.cid_dsc 
				FROM tb_anunciante INNER JOIN tb_estado ON
					(tb_anunciante.est_codigo=tb_estado.est_codigo) INNER JOIN tb_cidade ON
					(tb_anunciante.cid_codigo=tb_cidade.cid_codigo) 
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