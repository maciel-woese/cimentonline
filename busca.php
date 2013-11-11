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
            <?php
                $num_por_pagina = 4; 
                $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                $primeiro_registro = ($pagina*$num_por_pagina) - $num_por_pagina;

                $object = $listapagina->getPosts($primeiro_registro, $num_por_pagina, 150);
                $posts = $object['dados'];
                $total_paginas = $object['total']/$num_por_pagina;
                foreach ($posts as $key => $value) {
                    echo "<li>
                            <a href='subpage.php?action={$value['codigo']}' title='{$value['titulo']}'>
                                <h3>{$value['titulo']}</h3>
                                <p style='margin-top:5px;'>{$value['texto']}</p> 
                            </a>               
                        </li>";
                }
            ?>
        </ul>
		
        <div id="pgn" class="paginacao-pesquisa">
    		<?php
                $PHP_SELF = $_SERVER['PHP_SELF'];

                $prev = $pagina - 1;
                $next = $pagina + 1;
                // se página maior que 1 (um), então temos link para a página anterior
                if ($pagina > 1) 
                {
                    $prev_link = "<a href=\"$PHP_SELF?pagina=$prev\"> <li> << </li> </a>";
                    $pg_inicio = "<a href=\"$PHP_SELF?pagina=1\"> <li> < </li> </a> ";
                } 
                else 
                { // senão não há link para a página anterior
                    $prev_link = "<li class='ativo'> << </li>";
                    $pg_inicio = "<li class='ativo'> < </li>";
                }
                // se número total de páginas for maior que a página corrente, 
                // então temos link para a próxima página  
                if ($total_paginas > $pagina) {
                    $totalPg = ceil($total_paginas);
                    $next_link = "<a href=\"$PHP_SELF?pagina=$next\"> <li> >> </li> </a>";
                    $pg_ultima = " <a href=\"$PHP_SELF?pagina=$totalPg\"> <li> > </li> </a>";
                } 
                else 
                { 
                // senão não há link para a próxima página
                    $next_link = "<li class='ativo'> >> </li>";
                    $pg_ultima = " <li class='ativo'> > </li>";
                }
                $total_paginas = ceil($total_paginas);
                  echo '<ul>';
                  $painel = "";
                  for ($x=1; $x <= $total_paginas; $x++) 
                  {
                    if ($x == $pagina) 
                    {
                      //se estivermos na página corrente, não exibir o link para visualização desta página 
                      //$painel .= " [$x] ";

                      $painel .= "<li class='ativo'>$x</li>";  

                    } 
                    else 
                    {
                      $painel .= " <a href=\"$PHP_SELF?pagina=$x\"><li>$x</li></a>";
                    }
                  }
                //$painel .= '</ul></div>';
                // exibir painel na tela
                echo " $painel "; 
                echo '</ul>';   
            ?> 
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
