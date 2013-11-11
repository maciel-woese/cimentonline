<?php

require_once "../pdf/fpdf.php";
//define('FPDF_FONTPATH','../pdf/font/');
class pdf extends FPDF {
	
	function Header() 
	{	
		//$this->Image('logo01.png',10,8,33,'PNG');
		$this->Image('../../scripts/images/logo01.png',10,8,33);
		
		$this->SetFont('Arial','B',12);
		$this->Cell(190,6,utf8_decode("LISTAGEM DE POSIÇÕES"),0,1,'C');
		$this->Ln(7);
		//$this->Ln(7);
		$this->SetFont('Arial','B',12);
		$this->Cell(17,4,utf8_decode("Veículo: "),0,0,"L");
		
		$this->SetFont('Arial','B',7);
		$this->Cell(20,4,$_GET["vDsc"], 0 , 1,'L' );
		
		$this->SetFont('Arial','B',12);
		$this->Cell(25,4,"Velocidade: ",0,0,"L");
		
		$this->SetFont('Arial','B',7);
		$this->Cell(20,4,$_GET["vVel"], 0 , 1,'L' );
		
		$this->SetFont('Arial','B',12);
		$this->Cell(25,4,"Data Inicial: ",0,0,"L");
		
		$this->SetFont('Arial','B',7);
		$this->Cell(20,4,$_GET["dInicio"] ." ".$_GET["hInicio"], 0 , 1,'L' );
		
		$this->SetFont('Arial','B',12);
		$this->Cell(23,4,"Data Final: ",0,0,"L");
		
		$this->SetFont('Arial','B',7);
		$this->Cell(20,4,$_GET["dFim"]." ".$_GET["hFim"], 0 , 1,'L' );
		
		
		$this->Ln(7);
		$this->SetFont('Arial','B',6);
		$this->Cell(20,4,"Data/Hora",0,0,"L");
		$this->Cell(40,4,"Ponto mais Proximo",0,0,"L");
		$this->Cell(25,4,utf8_decode("Dist. até o ponto"),0,0,"L");
		$this->Cell(13,4 ,"Latitude",0,0,"L");
		$this->Cell(13,4 ,"Longitude",0,0,"L");
		$this->Cell(23,4 ,utf8_decode("Dist. Posições"),0,0,"L");
		$this->Cell(15,4 ,utf8_decode("Direção"),0,0,"L");
		$this->Cell(13,4 ,"Vel.(Km)",0,0,"L");
		$this->Cell(13,4 ,utf8_decode("Tensão"),0,0,"L");
		$this->Cell(13,4 ,utf8_decode("Ignição"),0,1,"L");
	}

	function Footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(10,10,"","T"); $this->Cell(30,10,date("d/m/Y - H:i:s"),"T",0,'L');
		$this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),"T",0,'R');
	}


}

?>