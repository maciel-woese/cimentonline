<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login SAC - CimentOnline</title>
<link rel="stylesheet" href="style-sac.css" type="text/css" media="all" />

</head>
<body bgcolor="#EEEEEE">

	<img class="logo-login" src="img/logo-painel.png" />

	<div class="bg-barra">
    
    	<div class="form-login">
        <br />
        <form name="loginForm" method="post" action="<?php echo $webimroot ?>../atendimento/operator/login.php">
        <label>Login:</label><br />
        <input name="login" type="text" />
        <label>Senha:</label><br />
        <input type="password" name="password" /><br />
        <span><a href="#esquecesenha">Esqueceu a senha?</a></span>
        <input class="btn-acessar" type="submit" value="Acessar" />
        </form>
        </div>
    
    </div>

</body>
</html>
