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
			$posts = $listapagina->getPosts();
			$i = 'e';
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
	</div>

</div>
<!-- FIM CORPO -->




<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->


<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->
