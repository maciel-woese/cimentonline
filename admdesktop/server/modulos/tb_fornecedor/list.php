<?php
/**
*	@Autor: Maciel Sousa
*	@Email: macielcr7@gmail.com
**/

if($_POST){
	try {
		require('../../autoLoad.php');
		$buscar = new Buscar();
		$tabela = 'tb_fornecedor';
		
		if( isset($_POST['action']) AND $_POST['action'] == 'GET_VALUES' ){
		
			$pdo = $connection->prepare("
				SELECT * 
				FROM tb_fornecedor
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
				$buscar->setBusca(array('for_dsc', 'tb_fornecedor.for_dsc'), $_POST['for_dsc'], 'like');
				$buscar->setBusca(array('for_comentario', 'tb_fornecedor.for_comentario'), $_POST['for_comentario'], 'like');
				$buscar->setBusca(array('for_endereco', 'tb_fornecedor.for_endereco'), $_POST['for_endereco'], 'like');
				$buscar->setBusca(array('for_tel', 'tb_fornecedor.for_tel'), $_POST['for_tel'], 'like');
				$buscar->setBusca(array('for_cel', 'tb_fornecedor.for_cel'), $_POST['for_cel'], 'like');
				$buscar->setBusca(array('for_email', 'tb_fornecedor.for_email'), $_POST['for_email'], 'like');
				$buscar->setBusca(array('for_site', 'tb_fornecedor.for_site'), $_POST['for_site'], 'like');
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
				FROM tb_fornecedor INNER JOIN tb_estado ON
					(tb_fornecedor.est_codigo=tb_estado.est_codigo) INNER JOIN tb_cidade ON
					(tb_fornecedor.cid_codigo=tb_cidade.cid_codigo) 
				{$filtro};
			");
			$pdo->execute( $buscar->getArrayExecute() );
			
			$query = $pdo->fetch(PDO::FETCH_OBJ);
			
			$countRow = $query->total;
			
			$pdo = $connection->prepare("
				SELECT tb_fornecedor.*, tb_estado.est_dsc, tb_cidade.cid_dsc 
				FROM tb_fornecedor INNER JOIN tb_estado ON
					(tb_fornecedor.est_codigo=tb_estado.est_codigo) INNER JOIN tb_cidade ON
					(tb_fornecedor.cid_codigo=tb_cidade.cid_codigo) 
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