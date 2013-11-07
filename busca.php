<!-- TOPO -->
<?php 
	include_once 'header.php';
	
	$buscado = $_GET['pesquisa'];

?>
<!-- FIM TOPO -->



<!-- CORPO -->
<div id="corpo">

	<div id="barra_titulo"><h1><small style="font-size:18px;">Você Busca por:</small>"<i><?php echo $buscado; ?></i>"</h1></div>

	<div id="quem-somos_conteudo">
    
    <style>
    	*[id=resultado] li{float:left; display:block; margin:10px 0;}
		*[id=resultado] li h3{color:#4674b8;}
		*[id=resultado] li:hover p{text-decoration:underline;}
		*[id=resultado] li img{float:left; margin-right:10px;}
		*[id=resultado] li:hover img{border-radius:10px;}
		
		*[id=pgn]{margin-top:25px; float:right;}
		*[id=pgn] li{margin: 0 2px;}		
    </style>

		<!-- CONTEÚDO AQUI -->
		<ul id="resultado">
        	<li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3><?php echo $buscado; ?> foi o que você buscou</h3>
                <p style="margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Este post obtem <?php echo $buscado; ?></h3>
                <p style="margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Nesse caso também achamos sua pesquisa: <?php echo $buscado; ?></h3>
                <p style="margin-top:5px;">Aqui na discrição "<?php echo $buscado; ?>". Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Titulo do Post/Materia/Pagina</h3>
                <p style="margin-top:5px;"><?php echo $buscado; ?>, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Titulo do Post/Materia/Pagina</h3>
                <p style="margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Titulo do Post/Materia/Pagina</h3>
                <p style="margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Titulo do Post/Materia/Pagina</h3>
                <p style="margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Titulo do Post/Materia/Pagina</h3>
                <p style="margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
            
            <li>
            	<a href="#link" title="Titulo">
            	<img width="100" height="100" src="http://www.placehold.it/100x100" />
                <h3>Titulo do Post/Materia/Pagina</h3>
                <p style="margin-top:5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum hendrerit risus eget feugiat. Nunc tempus consectetur purus, in aliquam odio. In hac habitasse platea dictumst.</p> 
                </a>               
            </li>
        </ul>
		
        <div id="pgn" class="paginacao-pesquisa">
    		<ul>
        		<li class="ativo">1</li>
            	<li>2</li>
            	<li>3</li>
            	<li>4</li>
        	</ul>  
    	</div>

	</div>

</div>
<!-- FIM CORPO -->




<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->


<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->
