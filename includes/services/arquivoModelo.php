<?php
require_once '../configure.inc.php';
require_once '../class/fornecedor.inc.php';

$fornecedor = new fornecedor;

if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){
	
	case 'INSERT':
		$fornecedor->insert();
	break;
	
	case 'LIST':
		$fornecedor->listAll();
	break;
	
	case 'EDIT':
		$fornecedor->update();
	break;

	
	case 'LIST_FOR':
		$fornecedor->listfornecedor();
    break;
}
?>