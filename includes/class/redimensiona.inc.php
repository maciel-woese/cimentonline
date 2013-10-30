<?php
class Redimensiona{
	
	public function Redimensionar($imagem, $largura, $pasta){
		
		$name = md5(uniqid(rand(),true));
		
		if ($imagem['type']=="image/jpeg"){
			$img = imagecreatefromjpeg($imagem['tmp_name']);
		}else if ($imagem['type']=="image/gif"){
			$img = imagecreatefromgif($imagem['tmp_name']);
		}else if ($imagem['type']=="image/png"){
			$img = imagecreatefrompng($imagem['tmp_name']);
		}
		$x   = imagesx($img);
		$y   = imagesy($img);
		$autura = 140;//($largura * $y)/$x;
		
		$nova = imagecreatetruecolor($largura, $autura);
		imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $autura, $x, $y);
		
		if ($imagem['type']=="image/jpeg"){
			$local="$pasta/{$name}_".time().".jpg";
			imagejpeg($nova, $local);
		}else if ($imagem['type']=="image/gif"){
			$local="$pasta/{$name}_".time().".gif";
			imagejpeg($nova, $local);
		}else if ($imagem['type']=="image/png"){
			$local="$pasta/{$name}_".time().".png";
			imagejpeg($nova, $local);
		}		
		//Jpeg, Gif e Png
		imagedestroy($img);
		imagedestroy($nova);	
		
		return $local;
	}
}
?>