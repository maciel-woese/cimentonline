<?php
@session_start();
ini_set("display_errors", 'off');



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
<script type='text/javascript' src='js/cep.js'></script>


</head>

<body>
<div id="box"><div id="box2">
<!-- CONTEÚDO -->

<!-- TOPO -->
<div id="header">

<hr />
<h1 style="font:18px 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight:bold; color:#FFF; width:auto; margin:0 auto; margin-top:-37px;"><marquee scrolldelay="10" scrollamount="4" onmouseover="this.stop()" onmouseout="this.start()">CimentOnline - Toda Obra começa aqui! O maior Portal de Cotação de Preço do Brasil</marquee></h1><br />
<div id="header_logo"><a href="index.php"><img src="img/logo.png" /></a></div>

<div id="pesquisa-logon" style="float:rigth; height:35px;">

<?php

if(!empty($_SESSION["login"]))
{
  echo '<div class="logado"><i>Olá,</i> <b>'.$_SESSION['nome'].'</b> &nbsp;<a href="logout.php"><img style="float:right; margin-top:-7px;" src="img/logout-icon.png" /></a></div>';
}
else
{
  echo '<a class="logado" href="login.php">&nbsp;&nbsp;Acessar minha Conta&nbsp;&nbsp;</a>';
}

?>

<form action="busca.php" method="GET" >
<div class="header_pesquisa">PESQUISAR <input name="pesquisa" type="text" /><input class="btn" type="submit" value="" /></div>
</form>

</div>

<!-- BANNER TOPO (557x107) -->
<div id="header_banner"><a><img src="img/banners/destaque-topo.png" /></a></div>
<!-- FIM BANNER TOPO (557x107) -->

<div id="header_menu">
	
		<a href="index.php"><span>Início</span></a>
    
  <span class="ball">&#9679;</span>

		<a href="pesquisa.php"><span>Pesquisa</span></a>
        
  
        
        <?php

        if(!empty($_SESSION["login"]))
        {
        }
        else
        {
          echo '<span class="ball">&#9679;</span>';
          echo '<a href="cadastro.php"><span>Cadastre-se</span></a>';
        }

        ?>
        
        
  <span class="ball">&#9679;</span>
        
        <a href="loja.php"><span>Anuncie</span></a>
        
  <span class="ball">&#9679;</span>
        <?php
        if(!empty($_SESSION['tipo']))
        {
          if($_SESSION["tipo"] == 2){
            $meuPainel = '';
            $minhasCotacoes = 'none';
            echo '<a href="meu-painel.php?idmenu=cotacoes"><span>Meu Painel</span></a>';
          }
          else
          {
            $meuPainel = 'none';
            $minhasCotacoes = '';
            echo '<a href=""><span>Minhas Cotações</span></a>';
          }
        }
        else
        {
          $meuPainel = 'none';
          $minhasCotacoes = '';
          echo '<a href=""><span>Minhas Cotações</span></a>';
        }

        ?> 
        
        
  <span class="ball">&#9679;</span>
        
        <li class="submenu"><a href="#"><span>Institucional</span></a>

          <ul style="display:<? echo $minhasCotacoes; ?>;">
              <?php
                $obj = $listapagina->getArraySubPage(); 
                for($c=0; $c < count($obj); $c++)
                {
                    echo '<a href="subpage.php?action='. $obj[$c]['codigo'] .'"><li>'.$obj[$c]['titulo'].'</li></a>';
                }
              ?>              
            </ul>


            <ul style="display:<? echo $meuPainel; ?>; margin-left:396px;">
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
