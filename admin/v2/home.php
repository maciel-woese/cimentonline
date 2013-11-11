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
                                <li id="current"><a href="home.php">Painel</a></li>
                                <li><a href="consultar.php">Consultar</a></li>
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
                        <!-- <ul>
                            <li><a href="#">link 1</a></li>
                            <li><a href="#">link 2</a></li>
                            <li><a href="#">link 3</a></li>
                            <li><a href="#">link 4</a></li>
                            <li><a href="#">link 5</a></li>
                        </ul> -->
                        
                    </div><!-- End. .grid_12-->
                </div><!-- End. .container_12 -->
                <div style="clear: both;"></div>
            </div> <!-- End #subnav -->
        </div> <!-- End #header -->
        
		<div class="container_12">
        

            
            <!-- Dashboard icons -->
            <div class="grid_7">
            	<a href="cosultar.php" class="dashboard-module">
                	<img src="img/icon-lupa.png" width="64" height="64" alt="consultar" />
                	<span>Consultar</span>
                </a>
                
                <a href="loja.php" class="dashboard-module">
                	<img src="img/Crystal_Clear_loja.gif" width="64" height="64" alt="loja" />
                	<span>Loja</span>
                </a>
                
                <a href="conteudo.php" class="dashboard-module">
                	<img src="img/Crystal_Clear_write.gif" width="64" height="64" alt="conteudo" />
                	<span>Conteúdo</span>
                </a>
                                                                
                <a href="configuracoes.php" class="dashboard-module">
                	<img src="img/Crystal_Clear_settings.gif" width="64" height="64" alt="edit" />
                	<span>Configurações</span>
                </a>
                <div style="clear: both"></div>
            </div> <!-- End .grid_7 -->
            
            <!-- Account overview -->
            <div class="grid_5">
                <div class="module">
                        <h2><span>Painel de Dados</span></h2>
                        
                        <div class="module-body">
                        
                        	<p>
                                <strong>Fornecedores: </strong>756 Cadastrados<br />
                                <strong>Anunciantes: </strong>56 Cadastrados<br />
                                <strong>Usuários: </strong>1300 Cadastrados
                            </p>
                        		
                              <div>
                              	<strong>Cotação:</strong>
                                 <div class="indicator">
                                     <div style="width: 89%;"></div>
                                 </div>
                                 <p>648 Fornecedores Ativos</p>
                             </div> 
                             
                             <div>
                              	<strong>Anuncios:</strong>
                                 <div class="indicator">
                                     <div style="width: 6%;"></div>
                                 </div>
                                 <p>23 Anunciantes Ativos</p>
                             </div>
                             

                        </div>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- End .grid_5 -->

            <div style="clear:both;"></div>
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