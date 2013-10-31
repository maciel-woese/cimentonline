<?php
class usuarios {

	var $login;
	var $senha;
	var $nome;

	function usuarios()
	{
		$this->db	=	$GLOBALS['db'];
	}

	function setPostValues(){
		if(isset($_POST['login']))     $this->login	      =	$_POST['login'];
		if(isset($_POST['senha']))     $this->senha	      =	$_POST['senha'];
		if(isset($_POST['nome']))     $this->nome	      =	$_POST['nome'];


		if(isset($_GET['login']))     $this->login	      =	$_GET['login'];
		if(isset($_GET['senha']))     $this->senha	      =	$_GET['senha'];
		if(isset($_GET['nome']))     $this->nome	      =	$_GET['nome'];
	}

	function contaRegistros($sql){

		$result = $this->db->query($sql);
		$row 	= $this->db->fetch_assoc($result);
		return $row['count'];
	}

	function insert($param1, $param2, $param3, $param4, $param5 ){

		$this->setPostValues();
		$erro =0;
		//if($this->status_for=='ativado') $this->status_for = 1; else $this->status_for = 0;
		if($param1 == "")  {
			return 1;
			//header('Location: cadastro.php');
		}else{
			if ($param1 != ""){
				
				$emailVer = "SELECT COUNT(*) AS count FROM tb_usuarios WHERE login= '".$param1."'";

				$v = $this->contaRegistros($emailVer);

				if($v>0) {
					return 1;
					//header('Location: login.php?action=JACADASTRADO');
				}
				else
				{

					$sql	= "INSERT INTO `tb_usuarios` 
								(
									`login`, 
									`senha`, 
									`nome`,
									`cod_usu`, 
									`tp_usu`
								)
								VALUES
								(
									'".$param1."', 
									'".md5($param2)."', 
									'".$param3."', 
									'".$param4."', 
									'".$param5."'
								);";
	
							if ( !$this->db->query($sql) )	{
								
								$erro = 2;
							}

					if ($erro > 0)
					{
						//$this->db->rollback();
						return 1;
						//header('Location: cadastro.php');
					}
					else
					{
						//$this->db->commit();
						return 0;
						//header('Location: loja.php?action=FORCADASTRADOCOMSUCESSO');
					}	
				}
			}		
		}
	}

	function countEmail($param1){

		$sql = "select count(*) as count from tb_usuarios where login = '".$param1."'";

		$query1	= $this->db->query($sql);
		while($row2 = $this->db->fetch_object($query1))
		{
			$teste = $row2->count;
		}
		return $teste;
	}

	function logar($param1, $param2){

		$sql = "select * from tb_usuarios where login = '". $param1."' && senha = '". md5($param2)."'";
		
		$total	= $this->contaRegistros("select count(*) as count from tb_usuarios where login = '". $param1."' && senha = '".  md5($param2)."'");
		
		$query1	= $this->db->query($sql);
		$dados = NULL;
		while($obj = $this->db->fetch_object($query1))
		{
			switch($obj->tp_usu){

				case'1':
					$tp_nome = 'Administrador';
					break;
					
				case '2':

					$sql = "SELECT f.for_codigo as codigo_id FROM `tb_fornecedor` as f 
					inner join tb_usuarios as t on f.for_email = t.login
					where usu_codigo = {$obj->usu_codigo}";

					$tp_nome = 'Fornecedor';
					break;
					
				case '3':
					$tp_nome = 'Anunciante';
					break;
			
				case '4':
					$tp_nome = 'Usuário';
					break;

				case '5':
					$tp_nome = 'Cliente';
					break;					
			}		

			$query2	= $this->db->query($sql);
			$row = $this->db->fetch_assoc($query2);
			
			$dados[] = array(
				'usu_codigo_id'=>   $row['codigo_id'],
				'usu_login'    =>	$obj->login,
				'usu_nome'     =>	$obj->nome,
				'usu_codigo'   =>	$obj->usu_codigo,
				'usu_activo'   =>	$obj->activo,
				'usu_cod_usu'  =>	$obj->cod_usu,
				'usu_tp_usu'   =>	$obj->tp_usu
			);
		}


		if($dados==NULL) $myData = array('dados' => array(), 'total' => 0);
		else{
			$myData = array('dados' => $dados, 'total' => $total);			
		}

		return $myData;
	}

}
?>