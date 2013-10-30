<?php
class estados {

	var $sigla;
	var $drop_var;
	var $uf;
	var $city;

	function estados()
	{
		$this->db	=	$GLOBALS['db'];
	}

	function setPostValues(){
		if(isset($_POST['sigla']))        $this->sigla	    =	$_POST['sigla'];
		if(isset($_POST['drop_var']))     $this->drop_var	=	$_POST['drop_var'];
		if(isset($_POST['uf']))           $this->uf	        =	$_POST['uf'];
		if(isset($_POST['city']))         $this->city	    =	$_POST['city'];

		if(isset($_GET['sigla']))        $this->sigla	    =	$_GET['sigla'];
		if(isset($_GET['drop_var']))     $this->drop_var	=	$_GET['drop_var'];
		if(isset($_GET['uf']))           $this->uf	        =	$_GET['uf'];
		if(isset($_GET['city']))         $this->city	    =	$_GET['city'];

	}

	function listEstados(){
     
		$sql	= "SELECT SIGL_ESTADO, DSC_ESTADO FROM estados";

		$query	= $this->db->query($sql);

		while ( $obj = $this->db->fetch_object($query) ){
			$dados[] = array(
				'code'  =>	$obj->SIGL_ESTADO,
				'name'  =>	$obj->SIGL_ESTADO.'-'.strtoupper(utf8_encode($obj->DSC_ESTADO))
			);
		}

		$myData = array('dados' => $dados);

		if($dados==NULL) $dados = "";
		else		print json_encode($myData);

	}

	function listEstados2(){
     
		$sql	= "SELECT est_codigo, est_sigla, est_dsc FROM tb_estado";

		$query	= $this->db->query($sql);

		while ( $obj = $this->db->fetch_object($query) ){
			$dados[] = array(
				'code'  =>	$obj->est_codigo,
				'sigla'  =>	$obj->est_sigla,
				'name'  =>	$obj->est_sigla.'-'.strtoupper(utf8_encode($obj->est_dsc))
			);
		}

		if($dados==NULL) $dados = "";

		return $dados;

	}
	
	function listCidades(){
        $this->setPostValues();
		$sql	= "SELECT ID_CIDADE, DSC_CIDADE FROM cidades c
                   WHERE c.COD_ESTADO = (SELECT ID_ESTADO FROM estados WHERE SIGL_ESTADO = '".$this->sigla."') 
                   ORDER BY DSC_CIDADE ";

		$query	= $this->db->query($sql);

		while ( $obj = $this->db->fetch_object($query) ){
			$dados[] = array(
				'name'  =>	strtoupper(utf8_encode($obj->DSC_CIDADE))
			);
		}

		$myData = array('dados' => $dados);

		if($dados==NULL) $dados = "";
		else		print json_encode($myData);
	}

		//**************************************
	//     Page load dropdown results     //
	//**************************************
	function getEstados($s){
		
		$sql = "SELECT DISTINCT est_codigo, est_dsc, est_sigla FROM tb_estado";
		
		$query2	= $this->db->query($sql);

			//echo '<option value="'.$obj->est_codigo.'">'.utf8_encode($obj->est_dsc).'</option>';
		while ( $obj = $this->db->fetch_object($query2) )
		{
			if($s == $obj->est_codigo){
				echo '<option value="'.$obj->est_codigo.'" selected="selected">'.utf8_encode($obj->est_dsc).'</option>'; 
			}else if($s == $obj->est_sigla){
				echo '<option value="'.$obj->est_codigo.'" selected="selected">'.utf8_encode($obj->est_dsc).'</option>'; 
			}else{
				echo '<option value="'.$obj->est_codigo.'">'.utf8_encode($obj->est_dsc).'</option>';
			}
		}
	}

	//**************************************
	//     First selection results     //
	//**************************************
	function getCidades($sigla=null){  
		$this->setPostValues();
	   	if($sigla!=null){
	   		$sql = "SELECT * FROM tb_cidade c 
	   		inner join tb_estado e ON e.est_codigo = c.cod_estado
	   		WHERE e.est_sigla ='".$sigla."' or e.est_codigo = '".$sigla."'";
	   	}
	   	else{
	   		$sql = "SELECT * FROM tb_cidade WHERE cod_estado ='".$this->drop_var."'";
	   	}

		
		$query2	= $this->db->query($sql);
		
		echo '<select name="city" id="CITY" style="width:180px; height:30px; margin:5px 0 0 0; padding:5px;"> ';
		echo '<option value=" " disabled="disabled" selected="selected">Selecione uma Cidade</option>';

			   while ( $obj = $this->db->fetch_object($query2) )
				{
					if($this->city == $obj->cid_codigo){
						echo '<option value="'.$obj->cid_codigo.'" selected="selected">'.utf8_encode($obj->cid_dsc).'</option>'; 
					}else{
				  		echo '<option value="'.$obj->cid_codigo.'">'.$obj->cid_dsc.'</option>';
				  	}
				}
		
		echo '</select> ';
	}

	function getArrayEstados($param){

       	$sqlB = "select est_codigo, est_dsc, est_sigla from tb_estado where 1 ";

       	if(isset($_GET['uf']) and !empty($_GET['uf'])){
        	$sqlB   .= " and est_codigo =  '".$param."' ";
        }
        
        if(isset($_GET['sigla']) and !empty($_GET['sigla'])){
        	$sqlB .= " and est_sigla =  '".$param."'";
        }

		$query1	= $this->db->query($sqlB);
		while($row = $this->db->fetch_object($query1)){
			$dados[] = array(
				'codigo' => $row->est_codigo,
				'estado' => utf8_encode($row->est_dsc),
				'uf' => $row->est_sigla
			);	
		}

		if($dados == NULL) $dados = "";

		return $dados;

	}

	function getArrayCidades($param){  
		$this->setPostValues();
	   
		$sql = "SELECT * FROM tb_cidade WHERE cod_estado ='".$param."'";
		
		$query2	= $this->db->query($sql);

		while ( $obj = $this->db->fetch_object($query2) )
		{
			$dados[] = array(
				'codigo'    =>	$obj->cid_codigo,
				'cidade'  =>	utf8_encode($obj->cid_dsc)
			);
		}

		if($dados == NULL) $dados = "";

		return $dados;

	}
}
?>