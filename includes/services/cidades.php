<?php
require_once '../configure.inc.php';
require_once '../class/cidade.inc.php';

$cidade = new cidade;

if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){
	
	case 'LIST_CIDADE':
		$cidade->listCidade($sigla);
	break;

}
?>