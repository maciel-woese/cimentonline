<?php
ini_set("display_errors", 'on');
require_once '../includes/configure.inc.php';
require_once '../includes/class/cliente.inc.php';
$listaClientes = new cliente;

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
    
    		<h1>Consulta de Usuários Cadastrados</h1>
            
            <br /><br />
            
            <table width="950">
            	<tr bgcolor="#DDD" height="25">
                	<th width="145">&nbsp;Nome</th>
                    <th width="165">&nbsp;Empresa</th>
                    <th width="125">&nbsp;Função</th>
                    <th width="115">&nbsp;Cidade/UF</th>
                    <th width="165">&nbsp;Email</th>
                    <th width="165">&nbsp;Telefone/Celular</th>
                    <th>&nbsp;Status</th>
                </tr>
                <?php
                $objectCli = $listaClientes->listClientes();
                if($objectCli != ""){
                    for($i=0; $i < count($objectCli); $i++)
                    {
                ?>
                <tr height="25">
                	<td class="valor"><?php echo $objectCli[$i]['nome'];?></td>
                    <td class="valor"><?php echo $objectCli[$i]['nome_fan'];?></td>
                    <td class="valor"><?php echo $objectCli[$i]['cargo'];?></td>
                    <td class="valor"><?php echo $objectCli[$i]['city'].'/'.$objectCli[$i]['uf'];?></td>
                    <td class="valor"><?php echo $objectCli[$i]['email'];?></td>
                    <td class="valor"><?php echo $objectCli[$i]['telefone']. ' - '.$objectCli[$i]['celular'];?></td>
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
