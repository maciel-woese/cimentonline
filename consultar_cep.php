<?php

if(isset($_POST['cep']))  {
	$cep = $_POST['cep'];

	$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . str_replace(".", "",str_replace("-", "", $cep)));
 
	$dados['sucesso'] = (string) $reg->resultado;
	$dados['rua_numero'] = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
	$dados['bairro']  = (string) $reg->bairro;
	$dados['cidade']  = (string) $reg->cidade;
	$dados['estado']  = (string) $reg->uf;
	 
	echo json_encode($dados);

} 


 

 
?>