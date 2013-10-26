<?php
class cliente {

	var $cargo;	
	var $conf_senha;
	var $email;
	var $nome;
	var $nome_empresa;
	var $senha;
	var $telefone;
	var $celular;

    var $query;
	var $type;
	var $valorCli;
	var	$start = 0;
	var $limit = 25;

	function cliente()
	{
		$this->db	=	$GLOBALS['db'];
	}

	function setPostValues(){
		//POST
		if(isset($_POST['cargo']))          $this->cargo	       =	$_POST['cargo'];
		if(isset($_POST['conf_senha']))     $this->conf_senha	   =	$_POST['conf_senha'];
		if(isset($_POST['conf_senha']))     $this->conf_senha      =	$_POST['conf_senha'];
		if(isset($_POST['email']))          $this->email	       =	$_POST['email'];
		if(isset($_POST['nome']))           $this->nome	           =	$_POST['nome'];
		if(isset($_POST['nome_empresa']))   $this->nome_empresa	   =	$_POST['nome_empresa'];
		if(isset($_POST['senha']))          $this->senha	       =	$_POST['senha'];
		if(isset($_POST['telefone']))       $this->telefone	       =	$_POST['telefone'];
		if(isset($_POST['celular']))        $this->celular	       =	$_POST['celular'];

		if(isset($_POST['query']))          $this->query	       =	$_POST['query'];
		if(isset($_POST['start']))          $this->start	       =	$_POST['start'];
		if(isset($_POST['limit']))          $this->limit	       =	$_POST['limit'];

		//GET
		if(isset($_GET['cargo']))          $this->cargo	        =	$_GET['cargo'];
		if(isset($_GET['conf_senha']))     $this->conf_senha	=	$_GET['conf_senha'];
		if(isset($_GET['conf_senha']))     $this->conf_senha    =	$_GET['conf_senha'];
		if(isset($_GET['email']))          $this->email	        =	$_GET['email'];
		if(isset($_GET['nome']))           $this->nome	        =	$_GET['nome'];
		if(isset($_GET['nome_empresa']))   $this->nome_empresa	=	$_GET['nome_empresa'];
		if(isset($_GET['senha']))          $this->senha	        =	$_GET['senha'];
		if(isset($_GET['telefone']))       $this->telefone	    =	$_GET['telefone'];
		if(isset($_GET['celular']))        $this->celular	    =	$_GET['celular'];


	

		if(isset($_GET['query']))         $this->query	       =	$_GET['query'];
		if(isset($_GET['start']))            $this->start	   =	$_GET['start'];
		if(isset($_GET['limit']))            $this->limit	   =	$_GET['limit'];
	}

	function contaRegistros($sql){

		$result = $this->db->query($sql);
		$row 	= $this->db->fetch_assoc($result);
		return $row['count'];
	}


	function insert(){

		$this->setPostValues();
		$this->db->start_transaction();
		$erro = 0;

		if ($this->nome != "")
		{

			$Ver = "SELECT COUNT(*) AS count FROM tb_clientes WHERE cli_email = '".$this->email."'";
			
			$v = $this->contaRegistros($Ver);
 
			if($v > 0) {

				header('Location: login.php?action=JACADASTRADO');
			}
			else
			{	
						$this->db->start_transaction();
						
						$sql	= "	INSERT INTO `tb_clientes` 
									(
										`cli_nome`, 
										`cli_nome_fan`, 
										`cli_email`, 
										`cli_tel`, 
										`cli_cel`
									)
									VALUES
									(
										'".$this->nome."', 
										'".$this->nome_empresa."', 
										'".$this->email."', 
										'".$this->telefone."', 
										'".$this->celular."'
									);";

						if ( !$this->db->query($sql) )	{
							$erroTXT = "Erro ao cadastrar cliente, tente novamente.";
							$erro = 2;
						}

						require_once 'includes/class/usuario.inc.php';
						$usuarios = new usuarios;	
						$resultUser = $usuarios->insert($this->email, $this->senha, $this->db->insert_id(), 5 );
						if($resultUser == 1){
							$erro = 30;
						}

				if ($erro > 0)
				{
					$this->db->rollback();
					print '{success:false,msg:"Cod. '.$erro.' '.$erroTXT.'"}';
				}
				else{
					$this->db->commit();
					header('Location: login.php?action=USUCADASTRADOCOMSUCESSO');
				}
			}
		}
	}

	function listClientes(){
        $this->setPostValues();
		$sql	= "	SELECT * FROM tb_clientes c where 1 ";

		$sql .=" ORDER BY c.cli_nome";
		
		$query2	= $this->db->query($sql);

		while ( $obj = $this->db->fetch_object($query2) ){

			$r[] = $obj;

			$dados[] = array(
				'id_for'    =>	$obj->cli_codigo,
				'nome'  =>	$obj->cli_nome,
				'nome_fan'  =>	$obj->cli_nome_fan,
				'cargo'  =>	$obj->cli_cargo,
				'email'  =>	$obj->cli_email,
				'telefone'  =>	$obj->cli_tel,
				'celular'  =>	$obj->cli_cel,
				'uf'  =>	$obj->est_codigo,
				'city'  =>	$obj->cid_codigo
			);
		}

		$myData = array('dados' => $dados);

		if($dados==NULL) $dados = "";

		return $dados;

	}


}
?>