<?php
	session_start();
	require_once 'configure.inc.php';
	require_once 'pdf/fpdf.php';

	class PDF extends FPDF{
		public $db = null;
		public $fornecedor = null;

		function pdf(){
			parent::__construct('L');
			$this->db =	$GLOBALS['db'];
			$this->setFornecedor();
		}

		function setFornecedor(){
			$cod_fornecedor = 20;
			$query = $this->db->query("
				SELECT * FROM  `tb_fornecedor` left join

				where for_codigo = {$cod_fornecedor} limit 1
			");
			$this->fornecedor = $this->db->fetch_assoc($query);
		}

		function Header(){
			if(!empty($fornecedor['ft01'])){
		    	$this->Image($fornecedor['ft01'], 10,6,30);				
			}
		    $this->Cell(80);
		    $this->SetFont('Arial','B',15);
		    $this->Cell(30,10,$this->fornecedor['for_dsc'],0,0);
		    $this->Ln();
		    $this->Cell(80);
		    $this->Cell(30,5,$this->fornecedor['for_endereco'],0,0);
		    $this->Ln();
		    $this->Cell(80);
		    $this->Cell(30,10,$this->fornecedor['for_tel'].", ".$this->fornecedor['for_cel'],0,0);
		    $this->Ln();
		    $this->Cell(80);
		    $this->Cell(30,10,$this->fornecedor['for_email'],0,0);
		    $this->Ln();
		    $this->Cell(80);
		    $this->Cell(30,10,$this->fornecedor['for_site'],0,0);
		}

		function getLogo(){

		}

		function Footer(){
		    $this->SetY(-15);
		    $this->SetFont('Arial','I',8);
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Output();
?>