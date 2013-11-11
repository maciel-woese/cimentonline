<?php	
include_once('teste02.php');

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

		//$this->setPostValues();
		$id_sessao = $_SESSION['id_sessao'];
		$cliente = $_SESSION["id_cliente"];
	
		$dadosB = "";//cursodoveiculo2($this->id_veic,dateConversion($this->dInicio),dateConversion($this->dFim),$this->hInicio,$this->hFim,$this->vVel,'','');

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

	
?>