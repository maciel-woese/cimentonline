<?php
ini_set("display_errors", 'on');
require_once '../includes/configure.inc.php';
require_once '../includes/class/fornecedor.inc.php';
$listaFornecedores = new fornecedor;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel Admin - CimentOnline</title>
<link rel="stylesheet" href="style-painel.css" type="text/css" media="all" />

</head>
<body>
	<!-- // HEADER -->
	<div id="header">
    	<div id="box">
       		
            <img class="logo" src="img/logo-painel.png" alt="" title="" />
            
 
            	<table class="logado">
                	<tr>
                    	<td align="right">
                        <h4>Ola, <b>Administrador</b></h4>
                        <span><a href="#alterardados">Alterar dados</a></span>
                        </td>
                        <td bgcolor="#000" width="2">
                        </td>
                        <td width="35" align="right">
                        <a href="#sair"><img src="img/icones/logout.png" alt="" title="" /></a>
                        </td>            	
                	</tr>
                </table>
                                
                <div class="menu-painel">
                	<ul>
                    	<a href="usuarios.php"><li>Usuários</li></a>
                        <a href="fornecedores.php"><li>Fornecedores</li></a>
                    </ul>
                </div>           

		</div>
        <!-- FIM BOX // -->
    
    </div>
    <!-- FIM HEADER // -->
    
    <div id="box">    	
    
    	<div id="corpo-painel" >
    
    		<h1>Consulta de Fornecedores Cadastrados</h1>
            
            <br /><br />
            
            <table width="950">
            	<tr bgcolor="#DDD" height="25">
                	<th width="185">&nbsp;Nome Fantasia</th>
                    <th width="150">&nbsp;Cidade/UF</th>
                    <th width="190">&nbsp;Email</th>
                    <th width="180">&nbsp;Telefone/Celular</th>
                    <th width="180">&nbsp;Site</th>
                    <th>&nbsp;Status</th>
                </tr>
                <?php
                    $objectFor = $listaFornecedores->listFornecedor();
                    if($objectFor != ""){
                    for($i=0; $i < count($objectFor); $i++)
                    {
                ?>
                <tr height="25">
                	<td class="valor"><?php echo $objectFor[$i]['nome'];?></td>
                    <td class="valor"><?php echo $objectFor[$i]['endereco'];?></td>
                    <td class="valor"><?php echo $objectFor[$i]['email'];?></td>
                    <td class="valor"><?php echo $objectFor[$i]['telefone']. ' - '.$objectFor[$i]['celular'];?></td>
                    <td class="valor"><?php echo $objectFor[$i]['site'];?></td>
                    <td align="center"><img src="img/icones/ativo.png" alt="" title="" /></td>
                </tr>
                <?php  
                    }  
                }else{
                ?>
                    <div><h1 style="font-size:16px; text-align:center">Nenhum Resultado Encontrado. </div>
                <?php
                }
                ?>
                </font>
            </table>
    
    	</div>
    	<!-- FIM CORPO-PAINE // -->
    
    </div>        
	<!-- FIM BOX // -->
    
</body>
</html>
