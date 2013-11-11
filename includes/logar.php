<?php
require_once 'includes/configure.inc.php';
require_once 'includes/class/usuario.inc.php';
$usuarios = new usuarios;

$login = mysql_real_escape_string($_POST['login']);
$senha = mysql_real_escape_string($_POST['senha']);

/* Verifica se existe usuario, o segredo ta aqui quando ele procupa uma 
linha q contenha o login e a senha digitada */
$objectUsu = $usuarios->logar( $login, $senha);
$num_logar = $objectUsu['total'];

for($i=0; $i < count($objectUsu['dados']); $i++)
{
	$login = $objectUsu['dados'][$i]['usu_login'];
	$tipo = $objectUsu['dados'][$i]['usu_tp_usu'];
}

//Verifica se n existe uma linha com o login e a senha digitado
if ($num_logar == 0)
{
   echo "Login ou senha invalido.";
   echo "<br><a href='javascript:window.history.go(-1)'>Clique aqui para volta.</a>";   
} 
else if($fet_logar['activo'] == "N")
{
   echo "Usuario não ativado, verifique seu e-mail para ativa a conta.";
   echo "<br><a href='javascript:window.history.go(-1)'>Clique aqui para volta.</a>"; 
}
else
{
   //Cria a sessão e manda pra pagina principal.php
   session_start();
   $_SESSION['login'] = md5($login);
   $_SESSION['tipo'] = $tipo;

   header("Location:index.php");
}
?>