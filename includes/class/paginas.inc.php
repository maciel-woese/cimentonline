<?php
class paginas {
	var $for_codigo;
	var $razao_social;
	var $end_completo;
	var $telefone;
	var $celular;
	var $email_principal;
	var $site;
	var $senha;
	var $conf_senha;
	var $uf;
	var $city;
	var $drop_var;
	var $sigla;

	var $page;
	
	var $type;
	var $valorFor;
	var	$start;
	var $limit;

	function paginas()
	{
		$this->db	=	$GLOBALS['db'];
	}

	function setPostValues(){
		//POST
		if(isset($_POST['drop_var']))          $this->drop_var	   =	$_POST['drop_var'];
		if(isset($_POST['sigla']))          $this->sigla	   =	$_POST['sigla'];

		if(isset($_POST['page']))          $this->page	   =	$_POST['page'];

		if(isset($_POST['for_codigo']))        $this->for_codigo	   =	$_POST['for_codigo'];
		if(isset($_POST['razao_social']))      $this->razao_social	   =	$_POST['razao_social'];
		if(isset($_POST['end_completo']))      $this->end_completo     =	$_POST['end_completo'];
		if(isset($_POST['telefone']))          $this->telefone	       =	$_POST['telefone'];
		if(isset($_POST['celular']))           $this->celular	       =	$_POST['celular'];
		if(isset($_POST['email_principal']))   $this->email_principal  =	$_POST['email_principal'];
		if(isset($_POST['site']))              $this->site	           =	$_POST['site'];
		if(isset($_POST['senha']))             $this->senha	           =	$_POST['senha'];
		if(isset($_POST['conf_senha']))        $this->conf_senha	   =	$_POST['conf_senha'];
		if(isset($_POST['uf']))      $this->uf	  =	$_POST['uf'];
		if(isset($_POST['city']))      $this->city	  =	$_POST['city'];

		if(isset($_POST['status_for']))         $this->status_for	  =	$_POST['status_for'];
		if(isset($_POST['start']))              $this->start	      =	$_POST['start'];
		if(isset($_POST['limit']))              $this->limit	      =	$_POST['limit'];

		//GET
		if(isset($_GET['drop_var']))          $this->drop_var	   =	$_GET['drop_var'];
		if(isset($_GET['sigla']))          $this->sigla	   =	$_GET['sigla'];

		if(isset($_POST['page']))          $this->page	   =	$_POST['page'];

		if(isset($_GET['for_codigo']))        $this->for_codigo	   =	$_GET['for_codigo'];
		if(isset($_GET['razao_social']))      $this->razao_social	   =	$_GET['razao_social'];
		if(isset($_GET['end_completo']))      $this->end_completo     =	$_GET['end_completo'];
		if(isset($_GET['telefone']))          $this->telefone	       =	$_GET['telefone'];
		if(isset($_GET['celular']))           $this->celular	       =	$_GET['celular'];
		if(isset($_GET['email_principal']))   $this->email_principal  =	$_GET['email_principal'];
		if(isset($_GET['site']))              $this->site	           =	$_GET['site'];
		if(isset($_GET['senha']))             $this->senha	           =	$_GET['senha'];
		if(isset($_GET['conf_senha']))        $this->conf_senha	   =	$_GET['conf_senha'];
		if(isset($_POST['uf']))      $this->uf	  =	$_POST['uf'];
		if(isset($_POST['city']))      $this->city	  =	$_POST['city'];

		if(isset($_GET['status_for']))     $this->status_for	  =	$_GET['status_for'];
		if(isset($_GET['start']))          $this->start	          =	$_GET['start'];
		if(isset($_GET['limit']))          $this->limit	          =	$_GET['limit'];
	}

	function contaRegistros($sql){

		$result = $this->db->query($sql);
		$row 	= $this->db->fetch_assoc($result);
		return $row['count'];
	}

	function listPagina($p){

        $this->setPostValues();

		$sql	= "SELECT * FROM tb_paginas WHERE cod_pagina = ".$p;

		$query2	= $this->db->query($sql);
		
		while ( $obj = $this->db->fetch_object($query2) ){

				$conteudo =	$obj->texto_pagina;

		}

		print $conteudo;

	}

	function listTitulo($p){

        $this->setPostValues();

		$sql	= "SELECT * FROM tb_paginas WHERE cod_pagina = ".$p;

		$query2	= $this->db->query($sql);
		
		while ( $obj = $this->db->fetch_object($query2) ){

				$titulo =	$obj->dsc_pagina;
		}

		print $titulo;
	}

	function getArraySubPage(){

       	$sqlB = "SELECT cod_pagina, dsc_pagina FROM tb_paginas where tipo_pagina = 1 ";

		$query1	= $this->db->query($sqlB);
		while($row = $this->db->fetch_object($query1)){
			$dados[] = array(
				'codigo' => $row->cod_pagina,
				'titulo' => $row->dsc_pagina
			);	
		}

		if($dados == NULL) $dados = "";

		return $dados;

	}

	function getPosts($start, $limit, $truncate=300){
		$filtro = '';
		if(isset($_GET['pesquisa'])){
			$filtro .= " and (dsc_pagina LIKE '%{$_GET['pesquisa']}%' OR texto_pagina LIKE '%{$_GET['pesquisa']}%')";
		}
		$count = $this->contaRegistros("SELECT count(*) as count FROM tb_paginas where tipo_pagina = 2 {$filtro}");
		$sqlB = "SELECT * FROM tb_paginas where tipo_pagina = 2 {$filtro} order by cod_pagina desc limit {$start}, {$limit}";
		$dados = array();
		$query1	= $this->db->query($sqlB);
		while($row = $this->db->fetch_object($query1)){
			$texto = truncate($row->texto_pagina, $truncate, '...');

			$dados[] = array(
				'codigo' => $row->cod_pagina,
				'titulo' => $row->dsc_pagina,
				'texto' => $texto
			);	
		}

		return array('dados'=> $dados, 'total'=> $count);
	}

}
?>