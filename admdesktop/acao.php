<?php
$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

function listarImagens(){
	$dir = "imagens/";
	$images = array();
	$d = dir($dir);
	while($name = $d->read()){
		if(!preg_match('/\.(jpg|gif|png)$/', $name)) continue;
		$size = filesize($dir.$name);
		$lastmod = filemtime($dir.$name)*1000;
		$images[] = array('name'=>$name, 'size'=>$size, 'lastmod'=>$lastmod, 'url'=>$dir.$name);
	}
	$d->close();
	$o = array('images'=>$images);
	echo json_encode($o);
}

function upload(){
	$target_path = "imagens/" . strtolower(trim(basename($_FILES['upload']['name'])));

	if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_path))
	{
		die ('({"success":true})');
	}
	else
	{
		die ('({"success":false})');
	}
}

function deletarImagem(){
	$imagem = $_POST['imagem'];

	if(unlink(getcwd() .'/imagens/'.$imagem) === true){
		echo "{success:true}";
	} else {
		echo "{success:false}";
	}	
}

function renomearImagem(){
	$oldName = $_POST['oldName'];
	$newName = $_POST['newName'];
	$renamePath = getcwd().'/imagens/'; 
	
	if(@rename($renamePath .'/'. $oldName, $renamePath . $newName) == false) {
		echo "{success: false}";
	} else {
		echo "{success: true}";
	}
}

call_user_func($acao);
?>