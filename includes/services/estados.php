<?php
require_once '../configure.inc.php';
require_once '../class/estados.inc.php';

$estados = new estados;

if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){
	
	case 'INSERT':
		$estados->insert();
		break;
	
	case 'LIST_ESTADO':
		$estados->listEstados();
		break;

	case 'LIST_ESTADO2':
		$estados->listEstados2();
		break;

	case 'LIST_CIDADE':
		$estados->listCidades();
		break;	
	
	case 'EDIT':
		$estados->update();
		break;

	case 'DELETE':
		$estados->delete();
		break;
	
	case 'DROPDOWN':
		$estados->listEstados();
    	break;

    case 'BUSCACITY':
		$estados->getCidades();
		break;	
}
?>