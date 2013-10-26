<?php
require_once 'includes/configure.inc.php';
require_once 'includes/class/usuario.inc.php';
$usuarios = new usuarios; 

print $usuarios->countEmail('sousa.justa@gmail.com'); 

?>