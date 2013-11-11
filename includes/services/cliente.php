<?php
require_once '../configure.inc.php';
require_once '../class/cliente.inc.php';

$cliente = new cliente;

if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){

	case 'INSERT_CLIENTE':
		$cliente->insert();
		break;

	case 'LIST_CLIENTES':
		$cliente->listAll();
		break;

	case 'LIST_CLIENTE_COMBO':
		$cliente->listClienteCombo();
		break;

	case 'EDIT':
		$cliente->update();
		break;

	case 'DELETE_CLI':
		$cliente->delete();
		break;

	case 'BLOQUEIO':
		$cliente->updateStatus();
		break;

	case 'LIST_CLI':
		$cliente->listcliente();
    break;		

}
?>