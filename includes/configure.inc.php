<?php
date_default_timezone_set('America/Fortaleza');

if ($_SERVER['SERVER_NAME'] == 'localhost')
	$interno = true;
else
	$interno = false;

ini_set("session.gc_maxlifetime", 60000);
ini_set("allow_url_fopen", 1);


if ($interno) {
	

	$arhost[0]	= "67.205.67.147";
	$ardb[0]	= "cimentonline";
	$aruser[0]	= "cimentonline";
	$arpass[0]	= "fsj@1600";
	
} else {
	

	$arhost[0]	= "67.205.67.147";
	$ardb[0]	= "cimentonline";
	$aruser[0]	= "cimentonline";
	$arpass[0]	= "fsj@1600";
	
}

	$arhost[0]	= "127.0.0.1";
	$ardb[0]	= "cimentonline";
	$aruser[0]	= "root";
	$arpass[0]	= "";

require_once('funcoes.inc.php');
require_once('db.inc.php');
require_once('sendMail.inc.php');

$db = new db();
$db->connect();
$noheader = 1;

if ( !$noheader ) {
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last Modified: '. gmdate('D, d M Y H:i:s') .' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	header('Pragma: no-cache');
	header('Expires: 0');

	if(!noPrint){
		print '<script>';
		if ( !$interno )	print 'var showError = 1; window.onerror=function(){return true;}';
		else				print 'var showError = 0; window.onerror=function(){return false;}';
		print '</script>';
	}
}
?>