<?php

class fornecedor {
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

	function fornecedor()
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

	function insert(){

		$this->setPostValues();
		$erro = 0;
		//if($this->status_for=='ativado') $this->status_for = 1; else $this->status_for = 0;
		if($this->razao_social == "")  {
			print '{success:false,msg:"Nome fantasia e/ou Razão Social deve ser preenchido."}';
		}else{
			if ($this->email_principal != ""){
				
				$emailVer = "SELECT COUNT(*) AS count FROM tb_fornecedor WHERE for_email= '".$this->email_principal."'";

				$v = $this->contaRegistros($emailVer);

				if($v>0) {
					header('Location: login.php?action=JACADASTRADO');
				}
				else
				{
					$this->db->start_transaction();

					$sql	= "INSERT INTO `tb_fornecedor` 
								(
									`for_dsc`, 
									`for_endereco`, 
									`for_tel`, 
									`for_cel`, 
									`for_email`, 
									`for_site`, 
									`est_codigo`, 
									`cid_codigo`
								)
								VALUES
								(
									'".$this->razao_social."', 
									'".$this->end_completo."', 
									'".$this->telefone."', 
									'".$this->celular."', 
									'".$this->email_principal."', 
									'".$this->site."', 
									'".$this->uf."', 
									'".$this->city."'
								);";
	
							if ( !$this->db->query($sql) )	{
								$erroTXT = "Erro ao cadastrar cliente, tente novamente.";
								$erro = 2;
							}

						require_once 'includes/class/usuario.inc.php';
						$usuarios = new usuarios;	
						$resultUser = $usuarios->insert($this->email_principal, $this->senha, $this->razao_social, $this->db->insert_id(), 2 );
						if($resultUser == 1){
							$erro = 30;
						}		

					if ($erro > 0)
					{
						$this->db->rollback();
						header('Location: cadastro.php');
					}
					else
					{
						$this->db->commit();
						header('Location: publicacao.php?action=FORCADASTRADOCOMSUCESSO&razao='.$this->razao_social.'&end='.$this->end_completo);
					}	
				}
			}		
		}
	}

	function listAll(){
		$this->setPostValues();		
		
		$sql	= "SELECT f.for_codigo, f.for_dsc, f.for_endereco, f.for_email, f.for_site, 
					f.for_comentario, f.for_tel, f.for_cel 
					FROM tb_fornecedor";

		$count = "SELECT COUNT(*) AS count FROM tb_fornecedor f
		           inner join estados e on e.sigl_estado = f.estado";

		if (!empty($this->valorFor) and !empty($this->type)){
			$sql .= " and ".$this->type."  LIKE '%".utf8_decode($this->valorFor)."%'";
			$count = "SELECT COUNT(*) AS count FROM tb_fornecedor f
		             inner join estados e on e.sigl_estado = f.estado
			         WHERE ".$this->type."  LIKE '%".$this->valorFor."%'";
		}
		
		$sql .= " ORDER BY f.nome LIMIT ".$this->start.",".$this->limit;

		$total	= $this->contaRegistros($count);

		$query	= $this->db->query($sql);
		while($row = $this->db->fetch_object($query)){

			if((int)$row->status==1) $status = 'ativo'; else $status = 'desativado';

			$dados[] = array(
				'id_for' 	      =>	$row->cod_fornecedor,
				'cnpj_for'		  =>	$row->cnpj,
				'nome_for'		  =>	utf8_encode($row->nome),
				'endereco_for'	  =>	utf8_encode($row->endereco),
				'bairro_for'	  =>	utf8_encode($row->bairro),
				'cidade_for'	  =>	utf8_encode($row->cidade),
				'estado_for'	  =>	$row->estado .'-'.strtoupper(utf8_encode($row->dsc_estado)),
				'cep_for'		  =>	$row->cep,
			    'fone_for'		  =>	$row->fone,
			    'fax_for'		  =>	$row->fax_celular,
			    'contato_for'	  =>	utf8_encode($row->contato),
			    'status_for'	  =>	$status
			);
		}

		//1. json_encode(array('dados'=>$dados,'total'=>$total));
		if($dados==NULL) $dados = "";
		$myData = array('dados' => $dados, 'total' => $total);

		print json_encode($myData);
	}

	function update(){
		$this->setPostValues();
		if($this->id_for != ""){

			//if($this->status_for=='ativado') $this->status_for = 1; else $this->status_for = 0;

			$cnpjVer = "SELECT COUNT(*) AS count FROM tb_fornecedor
						WHERE cnpj = '".$this->cnpj_for."' AND cod_fornecedor <> ".$this->id_for." ";

			$v = $this->contaRegistros($cnpjVer);

			if($v==1) die('{success:false,msg:"CNPJ j� Cadastrado Para Outro Fornecedor, Tente Novamente."}');

			$sql = "UPDATE `tb_fornecedor`
						SET
							`cnpj`        = '".$this->cnpj_for."',  
							`nome`        = '".utf8_decode($this->nome_for)."' , 
							`endereco`    = '".utf8_decode($this->endereco_for)."', 
							`bairro`      = '".utf8_decode($this->bairro_for)."',  
							`cidade`      = '".utf8_decode($this->cidade_for)."',  
							`estado`      = '".utf8_decode($this->estado_for)."',
							`cep`         = '".$this->cep_for."', 
							`fone`        = '".$this->fone_for."', 
							`fax_celular` = '".$this->fax_for."',  
							`contato`     = '".utf8_decode($this->contato_for)."'	
						WHERE
						`cod_fornecedor` = '".$this->id_for."'";

			if(!$this->db->query($sql)){
				print '{success:false,msg:"Erro ao atualizar fornecedor, tente novamente."}';
			} else {
				print '{success:true,msg:"Fornecedor: '.utf8_decode($this->nome_for).' atualizado com sucesso."}';
			}
		}else{
			print '{success:false,msg:"Erro ao atualizar fornecedor, tente novamente."}';
		}
	}

	function listFornecedor(){
        $this->setPostValues();
        $por_pagina = 5; // NUMERO DE VEZES QUE VAI APARECER ANTES DE CRIAR OUTRA PAGINA
		$sql	= "	SELECT f.for_codigo, f.for_dsc, f.for_endereco, f.for_email, f.for_site, 
					f.for_comentario, f.for_tel, f.for_cel 
					FROM tb_fornecedor f where 1 ";

	   if(isset($_POST['query']) and !empty($_POST['query'])){
        	$sql   .= " and f.for_dsc LIKE '%{$_POST['query']}%' ";
        }
        if(isset($_POST['uf']) and !empty($_POST['uf'])){
        	$sql   .= " and f.est_codigo = '{$_POST['uf']}' ";
        }
        if(isset($_POST['city']) and !empty($_POST['city'])){
        	$sql   .= " and f.cid_codigo = '{$_POST['city']}' ";
        }
        if(isset($_GET['sigla']) and !empty($_GET['sigla'])){
        	$sqlB = "select est_codigo from tb_estado where est_sigla = '{$_GET['sigla']}'";

			$query1	= $this->db->query($sqlB);
			while($row = $this->db->fetch_object($query1)){
				$cod_estado = $row->est_codigo;
			}

        	$sql   .= " and f.est_codigo = '".$cod_estado."' ";
        }

		$sql .=" ORDER BY f.for_dsc limit 5";
		
		$query2	= $this->db->query($sql);

		while ( $obj = $this->db->fetch_object($query2) ){

			$dados[] = array(
				'id_for'    =>	$obj->for_codigo,
				'nome'  =>	$obj->for_dsc,
				'endereco'  =>	$obj->for_endereco,
				'email'  =>	$obj->for_email,
				'site'  =>	$obj->for_site,
				'telefone'  =>	$obj->for_tel,
				'celular'  =>	$obj->for_cel,
				'comentario'  =>	$obj->for_comentario
			);
		}

		$myData = array('dados' => $dados);

		if($dados==NULL) $dados = "";

		return $dados;
	}

	function listFornecedor24($p1, $p2){

        $this->setPostValues();
        $dados = NULL;
		$param = NULL;

		$sql	= "	SELECT f.for_codigo, f.for_dsc, f.for_endereco, f.for_email, f.for_site, 
					f.for_comentario, f.for_tel, f.for_cel, 
					e.est_codigo, e.est_dsc,
					c.cid_codigo, c.cid_dsc  
					FROM tb_fornecedor f 
					inner join tb_estado e ON e.est_codigo = f.est_codigo
					inner join tb_cidade c ON c.cid_codigo = f.cid_codigo
					where 1 ";

		$count = "SELECT COUNT(*) AS count FROM tb_fornecedor f where 1 ";			

	   if(isset($_GET['query']) and !empty($_GET['query'])){
        	$sql   .= " and f.for_dsc LIKE '%{$_GET['query']}%' ";
        	$count .= " and f.for_dsc LIKE '%{$_GET['query']}%' ";
        }
        if(isset($_GET['uf']) and !empty($_GET['uf'])){
        	$sql   .= " and f.est_codigo = '{$_GET['uf']}' ";
        	$count .= " and f.est_codigo = '{$_GET['uf']}' ";
        }
        if(isset($_GET['city']) and !empty($_GET['city'])){
        	$sql   .= " and f.cid_codigo = '{$_GET['city']}' ";
        	$count .= " and f.cid_codigo = '{$_GET['city']}' ";
        }
        if(isset($_GET['sigla']) and !empty($_GET['sigla'])){
        	$sqlB = "select est_codigo from tb_estado where est_sigla = '{$_GET['sigla']}'";

			$query1	= $this->db->query($sqlB);
			while($row = $this->db->fetch_object($query1)){
				$cod_estado = $row->est_codigo;
			}

        	$sql   .= " and f.est_codigo = '".$cod_estado."' ";
        	$count .= " and f.est_codigo = '".$cod_estado."' ";
        }

		$sql .=" ORDER BY f.for_dsc limit ".$p1.' , '.$p2;

		$total	= $this->contaRegistros($count);
		//print $sql;
		$query2	= $this->db->query($sql);

		$msg = "";
		
		while ( $obj = $this->db->fetch_object($query2) ){

			$r[] = $obj;

			$dados[] = array(
				'id_for'    =>	$obj->for_codigo,
				'nome'  =>	$obj->for_dsc,
				'endereco'  =>	$obj->for_endereco,
				'email'  =>	$obj->for_email,
				'site'  =>	$obj->for_site,
				'telefone'  =>	$obj->for_tel,
				'celular'  =>	$obj->for_cel,
				'comentario'  =>	$obj->for_comentario
			);

		}

		$myData = array('dados' => $dados, 'total' => $total);

		if($dados==NULL) $myData = "";

		return $myData;

	}

	function contaFornecedor(){
        $result = $this->db->query('select count(*) AS count from tb_fornecedor');
		$row 	= $this->db->fetch_assoc($result);
		return $row['count'];
	}

}
?>