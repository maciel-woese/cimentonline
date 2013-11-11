<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Painel Administrativo - CimentOnline</title>
       
		<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/jquery.wysiwyg.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/tablesorter.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/thickbox.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/theme-blue.css" media="screen" />
        
		<script type="text/javascript" src="js/jquery-1.3.2.min.js" ></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js" ></script>
		<script type="text/javascript" src="js/jquery.tablesorter.min.js" ></script>
		<script type="text/javascript" src="js/jquery.tablesorter.pager.js" ></script>
		<script type="text/javascript" src="js/jquery.pstrength-min.1.2.js" ></script>
		<script type="text/javascript" src="js/thickbox.js" ></script>
        
        <!-- Initiate WYIWYG text area -->
		<script type="text/javascript">
			$(function()
			{
			$('#wysiwyg').wysiwyg(
			{
			controls : {
			separator01 : { visible : true },
			separator03 : { visible : true },
			separator04 : { visible : true },
			separator00 : { visible : true },
			separator07 : { visible : false },
			separator02 : { visible : false },
			separator08 : { visible : false },
			insertOrderedList : { visible : true },
			insertUnorderedList : { visible : true },
			undo: { visible : true },
			redo: { visible : true },
			justifyLeft: { visible : true },
			justifyCenter: { visible : true },
			justifyRight: { visible : true },
			justifyFull: { visible : true },
			subscript: { visible : true },
			superscript: { visible : true },
			underline: { visible : true },
            increaseFontSize : { visible : false },
            decreaseFontSize : { visible : false }
			}
			} );
			});
        </script>
        
        <!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						6: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>
        
        <!-- Initiate password strength script -->
		<script type="text/javascript">
			$(function() {
			$('.password').pstrength();
			});
        </script>
	</head>
	<body>
    	<!-- Header -->
        <div id="header">

            <!-- Header. Main part -->
            <div id="header-main">
                <div class="container_12">
                    <div class="grid_12">
                        <div id="logo">
                            <ul id="nav">
                                <li><a href="home.php">Painel</a></li>
                                <li id="current"><a href="consultar.php">Consultar</a></li>
                                <li><a href="loja.php">Loja</a></li>
                                <li><a href="conteudo.php">Conteúdo</a></li>
                            </ul>
                        </div><!-- End. #Logo -->
                    </div><!-- End. .grid_12-->
                    <div style="clear: both;"></div>
                </div><!-- End. .container_12 -->
            </div> <!-- End #header-main -->
            <div style="clear: both;"></div>
            <!-- Sub navigation -->
            <div id="subnav">
                <div class="container_12">
                    <div class="grid_12">
                         <ul>
                            <li><a href="#id_fornecedores">Fornecedores</a></li>
                            <li><a href="#id_usuarios">Usuários</a></li>
                            <li><a href="#id_anunciantes">Anunciantes</a></li>
                        </ul> 
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
		<div class="container_12">

		<!-- SCRIPT PARA TROCA DE PAINEL -->
		<script type="text/javascript" src="js/jquery.js" ></script>
        <script type="text/javascript">

			$(function(){
				$("#btn_fornecedor").click(function(){
					$("#id_usuarios, #id_anunciantes").hide();
					beforeSend:$("#carregando").show("slow");
						complete:$("#carregando").hide("slow");
						$("#id_fornecedor").show("slow");
				
					});
				});
			
			$(function(){
				$("#btn_usuarios").click(function(){
					$("#id_fornecedor, #id_anunciantes").hide();
					beforeSend:$("#carregando").show("slow");
						complete:$("#carregando").hide("slow");
						$("#id_usuarios").show("slow");
				
					});
				});
			
			$(function(){
				$("#btn_anunciantes").click(function(){
					$("#id_usuarios, #id_fornecedor").hide();
					beforeSend:$("#carregando").show("slow");
						complete:$("#carregando").hide("slow");
						$("#id_anunciantes").show("slow");
				
					});
				});	

		</script>
        <!-- FIM SCRIPT PARA TROCAR DE PAINEL -->
        
            <div style="clear:both;"></div>
             
                <div class="module">
                	                        	
                            <?php
							include ("inc-consulta-fornecedor.php");
							//include ("inc-consulta-usuarios.php");
							//include ("inc-consulta-anunciantes.php");
							  ?>
                            
                        </table>
                        
                        </form>
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="img/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="img/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="img/arrow.gif" alt="next"/>
                                <img class="last" src="img/arrow-stop.gif" alt="last"/> 
								<span>&nbsp &nbsp Exibir por pagina: </span>
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div class="table-apply">
                            <form action="">
                            <div>
                            <span>Exibir Todos:</span> 
                            <select class="input-small">
                                <option value="1" selected="selected">Cadastrados</option>
                                <option value="2">Ativos</option>
                                <option value="3">Inativos</option>
                            </select>
                            </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
			</div> <!-- End .grid_12 -->
                
				<div style="clear: both;"></div> 
				
        </div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p style="float:right;">&copy; 2013. <a href="http://www.gesti-net.com.br" title="Gesti-Net">Gesti-Net | Soluções em TI & Telecomunicações</a></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>