<?php
@session_start();
ini_set("display_errors", 'on');



require_once 'includes/configure.inc.php';
include_once 'includes/class/paginas.inc.php';
$listapagina = new paginas; 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Keywords" content=""/>
<meta name="description" content=""/>
<link rel="canonical" href="" />

<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
<link rel="shortcut icon" href="img/favicon.png" />
<title>CimentOnline - Toda Obra Começa Aqui!</title>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.js"></script>


</head>

<body>
<div id="box"><div id="box2">
<!-- CONTEÚDO -->

<!-- TOPO -->
<div id="header">

<hr />
<h1 style="font:18px 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight:bold; color:#FFF; width:auto; margin:0 auto; margin-top:-37px;"><marquee scrolldelay="10" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">CimentOnline - Toda Obra começa aqui! O maior Portal de Cotação de Preço do Brasil</marquee></h1><br />
<div id="header_logo"><a href="index.php"><img src="img/logo.png" /></a></div>
<form action="" method="" >
<div id="header_pesquisa">PESQUISAR <input type="text" /><input class="btn" type="submit" value="" /></div>
</form>
<?php

if(!empty($_SESSION["login"]))
{
  echo '<div >Olá você estar logado como ['.$_SESSION['nome'].'] </div>';
  echo '<a href="logout.php"><div id="header_login" ><img src="css/img/icons/btn-logout.png" title="" alt="" /></div></a>';
}
else
{
  echo '<a href="login.php"><div id="header_login"><img src="css/img/icons/acessar-login.png" title="" alt="" /></div></a>';
}

?>

<!-- BANNER TOPO (557x107) -->
<div id="header_banner"><a><img src="img/banners/destaque-topo.png" /></a></div>
<!-- FIM BANNER TOPO (557x107) -->

<div id="header_menu">
	
		<a href="index.php"><span>Início</span></a>
    
  <span class="ball">&#9679;</span>

		<a href="pesquisa.php"><span>Pesquisa</span></a>
        
  <span class="ball">&#9679;</span>
        
        <a href="cadastro.php"><span>Cadastre-se</span></a>
        
  <span class="ball">&#9679;</span>
        
        <a href="loja.php"><span>Anuncie</span></a>
        
  <span class="ball">&#9679;</span>
        
        <a href="#"><span>Minhas Cotações</span></a>
        
  <span class="ball">&#9679;</span>
        
        <li class="submenu"><a href="#"><span>Institucional</span></a>
          <ul>
              <?php
                $obj = $listapagina->getArraySubPage(); 
                for($c=0; $c < count($obj); $c++)
                {
                    echo '<a href="subpage.php?action='. $obj[$c]['codigo'] .'"><li>'.$obj[$c]['titulo'].'</li></a>';
                }
              ?>              
            </ul>
        </li>
        
  <span class="ball">&#9679;</span>
        
        <a href="contato.php"><span>Contato</span></a>
        
  <span class="ball">&#9679;</span>
        
        <a href="trabalhe-conosco.php"><span>Trabalhe Conosco</span></a>
 
<!-- LINHA CANTO DIREIRO -- <hr class="linha_2" /> -->
</div>

</div>
<!-- FIM TOPO -->
