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

	<div id="barra_titulo"><h1>Tecnologia</h1></div>

	<div id="quem-somos_conteudo">


		<!-- CONTEÚDO AQUI -->
		<?php
			$listapagina->listPagina('9'); 
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
