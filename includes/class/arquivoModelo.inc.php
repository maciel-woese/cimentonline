<?php

class arquivoModelo {
	var $variavel1;
	var $variavel2;
	var $variavel3;

	var $query;
	var $type;
	var $valorFor;
	var	$start;
	var $limit;

	function arquivoModelo()
	{
		$this->db	=	$GLOBALS['db'];
	}

	function setPostValues(){
		//POST
		if(isset($_POST['variavel1']))             $this->variavel1	      =	$_POST['variavel1'];
		if(isset($_POST['variavel2']))           $this->variavel2	      =	$_POST['variavel2'];
		if(isset($_POST['variavel3']))           $this->variavel3       =	$_POST['variavel3'];
        if(isset($_POST['query']))              $this->query	      =	$_POST['query'];

		if(isset($_POST['start']))              $this->start	      =	$_POST['start'];
		if(isset($_POST['limit']))              $this->limit	      =	$_POST['limit'];

		//GET
		if(isset($_GET['variavel1']))         $this->variavel1		  =	$_GET['variavel1'];
		if(isset($_GET['variavel2']))       $this->variavel2	      =	$_GET['variavel2'];
		if(isset($_GET['variavel3']))       $this->variavel3	      =	$_GET['variavel3'];
        if(isset($_GET['query']))          $this->query	          =	$_GET['query'];

		if(isset($_GET['start']))          $this->start	          =	$_GET['start'];
		if(isset($_GET['limit']))          $this->limit	          =	$_GET['limit'];
	}

	function setPostSearchValues(){
		if(isset($_POST['type']))
		{
			switch($_POST['type']){

				case 'CNPJ':
					$filter	= 'f.CNPJ';
					break;

				case 'NOME':
					$filter	= 'f.NOME';
					break;
			}

			if(isset($_POST['type']))  $this->type	= $filter;
			if(isset($_POST['valorFor']))    $this->valorFor	= $_POST['valorFor'];
		}
	}

	function contaRegistros($sql){

		$result = $this->db->query($sql);
		$row 	= $this->db->fetch_assoc($result);
		return $row['count'];
	}

	function insert(){

		$this->setPostValues();

				$sql	= "	INSERT INTO `teste`
					(
						`variavel1`, 
						`variavel2`, 
						`variavel3`
					)
					VALUES
					(
						'".$this->variavel1."', 
						'".utf8_decode($this->variavel2)."', 
						'".utf8_decode($this->variavel3)."'
					)";
				//print $sql;
				//1.	json_encode(array('success'=>true ou false ,msg: 'msg_para_mostrar_ao_usuario'));
				if ( !$this->db->query($sql) )	print '{success:false,msg:"Erro ao cadastrar TESTE, tente novamente."}';
				else							print '{success:true,msg:"TESTE: '.utf8_encode($this->variavel1).' cadastrado com sucesso."}';
	}

	function listAll(){
		$this->setPostValues();
		$this->setPostSearchValues();

		$acess = "SELECT * FROM ";
		
		$sql	= "SELECT f.*, e.dsc_estado FROM TESTE T";

		$count = "SELECT COUNT(*) AS count FROM TESTE T";

		if (!empty($this->valorFor) and !empty($this->type)){
			$sql .= " and ".$this->type."  LIKE '%".utf8_decode($this->valorFor)."%'";
			$count = "SELECT COUNT(*) AS count FROM TESTE T
		             inner join estados e on e.sigl_estado = f.estado
			         WHERE ".$this->type."  LIKE '%".$this->valorFor."%'";
		}
		
		$sql .= " ORDER BY T.nome LIMIT ".$this->start.",".$this->limit;

		$total	= $this->contaRegistros($count);

		$query	= $this->db->query($sql);
		while($row = $this->db->fetch_object($query)){

			$dados[] = array(
				'variavel1' 	      =>	$row->variavel1,
				'variavel2'		  =>	$row->variavel2,
				'variavel3'		  =>	utf8_encode($row->variavel3)
			);
		}

		//1. json_encode(array('dados'=>$dados,'total'=>$total));
		if($dados==NULL) $dados = "";
		$myData = array('dados' => $dados, 'total' => $total);

		print json_encode($myData);
	}

	function update(){
		$this->setPostValues();
		if($this->variavel1 != ""){

			$sql = "UPDATE `TESTE`
						SET
							`variavel1`        = '".$this->variavel1."',  
							`variavel2`        = '".utf8_decode($this->variavel2)."' , 
							`variavel3`    = '".utf8_decode($this->variavel3)."'
						WHERE
						`variavel1` = '".$this->variavel1."'";

			if(!$this->db->query($sql)){
				print '{success:false,msg:"Erro ao atualizar TESTE, tente novamente."}';
			} else {
				print '{success:true,msg:"TESTE: '.utf8_decode($this->variavel1).' atualizado com sucesso."}';
			}
		}else{
			print '{success:false,msg:"Erro ao atualizar TESTE, tente novamente."}';
		}
	}

	function listfornecedor(){
        $this->setPostValues();
		$sql	= "	SELECT T.variavel1, T.variavel2 FROM TESTE T where 1 ";

	   if(isset($_POST['query']) and !empty($_POST['query'])){
        	$sql   .= " and T.variavel2 LIKE '%{$_POST['query']}%' ";
        }

		$sql .=" ORDER BY T.variavel1";
		
		$query2	= $this->db->query($sql);

		while ( $obj = $this->db->fetch_object($query2) ){

			$r[] = $obj;

			$dados[] = array(
				'variavel1'    =>	$obj->variavel1,
				'variavel2'  =>	utf8_encode($obj->variavel2)
			);
		}

		$myData = array('dados' => $dados);

		if($dados==NULL) $dados = "";
		else		print json_encode($myData);
	}


}
?>