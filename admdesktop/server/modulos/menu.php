<?php


	require_once('../lib/Connection.class.php');
	require_once('../lib/Usuarios.class.php');
	$user = new Usuarios();
	$connection = new Connection;
	if(!$user->isLogado()){
		die(json_encode(array('success'=> false, 'logout'=> true)));
	}
	echo $user->getMenu();
	