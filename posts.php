<!-- TOPO -->
<?php 
include_once 'header.php';
require_once 'includes/configure.inc.php';
include_once 'includes/class/paginas.inc.php';
$listapagina = new paginas; 
?> 
<!-- FIM TOPO -->



<!-- CORPO -->
<div id="corpo">

	<div id="barra_titulo"><h1>Postagens</h1></div>

	<div id="corpo_posts">
		<?php
			$num_por_pagina = 4; 
	    	$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
	    	$primeiro_registro = ($pagina*$num_por_pagina) - $num_por_pagina;

			$object = $listapagina->getPosts($primeiro_registro, $num_por_pagina);

			$posts = $object['dados'];
			$i = 'e';
			$total_paginas = $object['total']/$num_por_pagina;
			foreach ($posts as $key => $value) {
				echo "
					<div id=\"corpo_post_{$i}\">
						<a href=\"subpage.php?action={$value['codigo']}\"><h1>{$value['titulo']}</h1></a>
						<p>{$value['texto']}</p>
						<a href=\"subpage.php?action={$value['codigo']}\"><span>Leia mais</span></a>
					</div>
				";

				if($i=='e'){$i='d';}
				else{$i='e'; echo '<div style="clear:both;"></div>';}
			}
		?>
		<div style="clear:both;"></div>
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

	        // vamos arredondar para o alto o número de páginas  que serão necessárias para exibir todos os 
	        // registros. Por exemplo, se  temos 20 registros e mostramos 6 por página, nossa variável  
	        // $total_paginas será igual a 20/6, que resultará em 3.33. Para exibir os  2 registros 
	        // restantes dos 18 mostrados nas primeiras 3 páginas (0.33),  será necessária a quarta página. 
	        // Logo, sempre devemos arredondar uma  fração de número real para um inteiro de cima e isto é 
	        // feito com a  função ceil()/  
	        $total_paginas = ceil($total_paginas);
	          echo '<div class="paginacao-pesquisa"><ul>';
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
	        echo "$pg_inicio $prev_link $painel $next_link $pg_ultima"; 
	        echo '</ul></div>';   
		?>
	</div>
</div>
<!-- FIM CORPO -->




<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->


<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->
