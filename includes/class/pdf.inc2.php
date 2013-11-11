<?php
include_once('pdf.php');

class pdfListaPosicoes extends pdf{

	var	$id_veic;
	var	$vVel;
	var	$dInicio;
	var $hInicio;
	var	$dFim;
	var	$hFim;
	var $start;
	var $limit;
	
	function pdfListaPosicoes()
	{
		$this->db	=	$GLOBALS['db'];
	}

	function setPostValues(){
		if(isset($_POST['id_veic']))    $this->id_veic  =	$_POST['id_veic'];
		if(isset($_POST['vVel']))       $this->vVel     =	$_POST['vVel'];
		if(isset($_POST['dInicio']))    $this->dInicio  =	$_POST['dInicio'];
		if(isset($_POST['hInicio']))    $this->hInicio  =	$_POST['hInicio'];
		if(isset($_POST['dFim']))       $this->dFim     =	$_POST['dFim'];
		if(isset($_POST['hFim']))       $this->hFim     =	$_POST['hFim'];
		if(isset($_POST['start']))       $this->start     =	$_POST['start'];
		if(isset($_POST['limit']))       $this->limit     =	$_POST['limit'];
		
		
		if(isset($_GET['id_veic']))    $this->id_veic  =	$_GET['id_veic'];
		if(isset($_GET['vVel']))       $this->vVel     =	$_GET['vVel'];
		if(isset($_GET['dInicio']))    $this->dInicio  =	$_GET['dInicio'];
		if(isset($_GET['hInicio']))    $this->hInicio  =	$_GET['hInicio'];
		if(isset($_GET['dFim']))       $this->dFim     =	$_GET['dFim'];
		if(isset($_GET['hFim']))       $this->hFim     =	$_GET['hFim'];
		if(isset($_GET['start']))       $this->start     =	$_GET['start'];
		if(isset($_GET['limit']))       $this->limit     =	$_GET['limit'];
	}
	
	
	function geraPDF(){
		/*
		 cria documento
		 */
		$pdf = new pdf();
		//$pdf->setAuthor("PROCERGS");
		//$pdf->setTitle("Listatagem de Posições");
		$pdf->setCreator("PHP/FPDF 1.7","");
		/*
		 abre documento
		 */
		$pdf->Open();
		/*
		 primeira p�gina (as demais s�o autom�ticas)
		 */
		$pdf->AddPage();

		$this->setPostValues();
		$id_sessao = $_SESSION['id_sessao'];
		$cliente = $_SESSION["id_cliente"];
	
		$dadosB = cursodoveiculo2($this->id_veic,dateConversion($this->dInicio),dateConversion($this->dFim),$this->hInicio,$this->hFim,$this->vVel,'','');

		$object = json_decode($dadosB,true);
		
        $pdf->SetFont('Arial','',5);
        for($i=0; $i < count($object['dados']); $i++) {
        	$pdf->Cell(20,4,$object['dados'][$i]['pData'],"T",0,"L");
        	$pdf->Cell(40,4,$object['dados'][$i]['pPonto'],"T",0,"L");
        	$pdf->Cell(25,4,$object['dados'][$i]['pDistancia'],"T",0,"L");
        	$pdf->Cell(13,4,$object['dados'][$i]['pLat'],"T",0,"L");
        	$pdf->Cell(13,4,$object['dados'][$i]['pLng'],"T",0,"L");
        	$pdf->Cell(23,4,$object['dados'][$i]['pDist_Between_Positions'],"T",0,"L");
        	$pdf->Cell(15,4,$object['dados'][$i]['pDirecao'],"T",0,"L");
        	$pdf->Cell(13,4,$object['dados'][$i]['pVel'],"T",0,"L");
        	$pdf->Cell(13,4,$object['dados'][$i]['pTen'],"T",0,"L");
        	$pdf->MultiCell(0,4,utf8_decode($object['dados'][$i]['pIgnicao']),"T","L");       	
        }

		$pdf->Output();

	}


}
?>