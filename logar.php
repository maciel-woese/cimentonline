<?php
require_once 'includes/configure.inc.php';
require_once 'includes/class/usuario.inc.php';
$usuarios = new usuarios;

$login = $_POST['login'];
$senha = $_POST['senha'];

/* Verifica se existe usuario, o segredo ta aqui quando ele procupa uma 
linha q contenha o login e a senha digitada */
$objectUsu = $usuarios->logar( $login, $senha);
$num_logar = $objectUsu['total'];

for($i=0; $i < count($objectUsu['dados']); $i++)
{
	$id = $objectUsu['dados'][$i]['usu_codigo'];
   $usu_codigo_id = $objectUsu['dados'][$i]['usu_cod_usu'];
   
   $nome = $objectUsu['dados'][$i]['usu_nome'];
   $login = $objectUsu['dados'][$i]['usu_login'];
	$tipo = $objectUsu['dados'][$i]['usu_tp_usu'];
   $tipo_nome = $objectUsu['dados'][$i]['usu_tipo_nome'];
}

//Verifica se n existe uma linha com o login e a senha digitado
if ($num_logar == 0)
{
   echo '<script>alert("Login Invalido!");history.back();</script>';
} 
else if($objectUsu[0]['activo'] == "N")
{
   echo '<script>alert("Usuario Desativado!");history.back();</script>';
}
else
{
   //Cria a sessão e manda pra pagina principal.php
   @session_start();
   $_SESSION['codigo'] = $id;
   $_SESSION['usu_codigo_id'] = $usu_codigo_id;
      
   $_SESSION['nome'] = $nome;
   $_SESSION['tipo_nome'] = $tipo_nome;
   $_SESSION['login'] = md5($login);
   $_SESSION['tipo'] = $tipo;
   if($_GET['url']){
      header("Location:".$_GET['url']);      
   }
   else{
      header("Location:index.php");
   }
}
?>