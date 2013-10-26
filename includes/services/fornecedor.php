<?php
require_once '../configure.inc.php';
require_once '../class/fornecedor.inc.php';

$fornecedor = new fornecedor;

if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){

	case 'BUSCACITY':
		$fornecedor->drop_1();
		break;	

	case 'BUSCAFOR':
		$fornecedor->listFornecedor24();
		break;			

}
?>