<?php
require_once '../configure.inc.php';
require_once '../class/paginas.inc.php';

$paginas = new paginas;

if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){

	case 'BUSCACITY':
		$paginas->drop_1();
		break;	

	case 'BUSCAFOR':
		$paginas->listFornecedor24();
		break;			

}
?>