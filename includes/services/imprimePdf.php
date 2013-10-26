<?php

include_once '../configure.inc.php';
include_once '../xmlfunc.php';
include_once '../class/pdf.inc2.php';
include_once '../class/pdf_listPontos.inc.php';
include_once '../class/pdfParadas.inc.php';
include_once '../class/pdfEstatistica.inc.php';
include_once '../class/pdf_comandos.inc.php';
include_once '../class/pdf_bocaTanque.inc.php';
include_once '../class/pdf_horimetro.inc.php';
include_once '../class/pdf_veiculo.inc.php';
include_once '../class/pdf_cad_cli.inc.php';


$pdf   = new pdfListaPosicoes;
$listPontos = new pdflistPontos;
$listParadas = new pdfListaParadas;
$listEstatistica = new pdfListaEstatistica;
$listComandos = new pdfListaComandos;
$listEventosBocaTanque = new pdfListaEventosBocaTanque;
$listEventosHorimetro = new pdfListaEventosHorimetro;
$listVeiculos = new pdfListaVeiculo;
$listCadCli = new pdfListaCadCli;


if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){

	case 'CAD_CLI_PDF':
		$listCadCli->geraPDFCadCli();
		break;

	case 'VEICULO_PDF':
		$listVeiculos->geraPDFVEICULO();
		break;

	case 'POSICOES_PDF':
		$pdf->geraPDF();
		break;
	
	case 'PONTOS_PDF':
		$listPontos->geraPDFPontos();
		break;

	case 'PARADAS_PDF':
		$listParadas->geraPDFParadas();
		break;

	case 'ESTATISTICA_PDF':
		$listEstatistica->geraPDFEstatistica();
		break;

	case 'COMANDOS_PDF':
		$listComandos->geraPDFComandos();
		break;

	case 'BOCA_DE_TANQUE_PDF':
		$listEventosBocaTanque->geraPDFBocaTanque();
		break;

	case 'HORIMETRO_PDF':
		$listEventosHorimetro->geraPDFHorimetro();
		break;
}
?>