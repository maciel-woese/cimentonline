<?php
require('xmlfunc.php');
ini_set("display_errors", 'on');
//extract($_POST);
function plotaveiculo($veiculo,$px,$py,$cor,$icone,$id_sessao,$velocidadealta,$paradas,$pontosinteresse,$foco,$camera,$rota,$usuario)
{

	$veiculos = json_decode(veiculoespecifico2($veiculo),true);

	$nome= $veiculos[0]["DESC"]."[".$veiculos[0]["DATE_TIME"]."]";
	//$nome= win3utf($nome);

	$lat=$veiculos[0]["Y"];
	$lon=$veiculos[0]["X"];

	$lat = str_replace(",",".",$lat);
	$lon = str_replace(",",".",$lon);

	if ($foco == $veiculo)
	{
		if ($camera == "true") {
			$altitude = 4000;
			$inclinacao = 40;
			printlookat($lat,$lon,$altitude,$inclinacao);// Camera sobre posicao
		}
	}
	
	printpoint($lat,$lon,$px,$py,$nome,$icone); // Plota o veiculo no mapa

	if (($rota=="true")||($velocidadealta =="true"))
	{

		$hor1 = date("H:i:s",strtotime($veiculos[0]["DATE_TIME"])- 3600);
		$hor2 = date("H:i:s",strtotime($veiculos[0]["DATE_TIME"]));

		$data = date("Y-m-d H:i:s",strtotime($veiculos[0]["DATE_TIME"])- 3600);
		$data2 = date("Y-m-d H:i:s",strtotime($veiculos[0]["DATE_TIME"]));
		
		$d1 = date("Y-m-d  H:i:s",strtotime($veiculos[0]["DATE_TIME"])-(+3600));
		//print $veiculo.','.$d1.','.$veiculos[0]["DATE_TIME"];
        $posicoesdarota = json_decode(cursodoveiculo3($veiculo,$d1,$veiculos[0]["DATE_TIME"]),true);        
        
		$numrows = count($posicoesdarota);

		$parada=0;

		for ($i=0;$i< count($posicoesdarota); $i++)
		{

			$datu=strtotime($posicoesdarota[$i]["pData"]);
			$dant=strtotime($posicoesdarota[$i]["pData"]);

			$data=date("Y-m-d H:i:s",$datu*3600);

			$vetlat[]=$posicoesdarota[$i]["pLat"];
			$vetlon[]=$posicoesdarota[$i]["pLng"];

			$vel= $posicoesdarota[$i]["pVel"];
			$velmax = 60;
			if (($velocidadealta=="true")&&($vel > $velmax)) {
				printvelocidade($posicoesdarota[$i]["pLat"],$posicoesdarota[$i]["pLng"],1,1,$vel);
			}
			
		}
		
        if (($rota=="true") && (count($posicoesdarota)>0))printline($vetlat,$vetlon,$numrows,$cor);

	}



}


headertxt();
//extract($_POST);
$elements = $_GET['total_el'];
$lista_veiculos = $_GET['lista_veiculos'];
//print $lista_veiculos;
$par = $_GET['par'];

$el = explode(",", $lista_veiculos);

list($usuario,$id_cliente,$velocidadealta,$paradas,$pontosinteresse,$rota,$camera,$foco,$id_sessao) = split(",",$par);


startkml(0);

$cores = array(
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png'),
	array('cor'  => 'FFFF0000', 'ico' => 'google_blue.png'),
	array('cor'  => 'FF00FFFF', 'ico' => 'google_yellow.png'),
	array('cor'  => 'FF008080', 'ico' => 'google_olive.png'),
	array('cor'  => 'FFFFFF00', 'ico' => 'google_aqua.png'),
	array('cor'  => 'FF808000', 'ico' => 'google_teal.png'),
	array('cor'  => 'FFFF00FF', 'ico' => 'google_fuchsia.png'),
	array('cor'  => 'FF800080', 'ico' => 'google_purple.png'),
	array('cor'  => 'FFFFFFFF', 'ico' => 'google_white.png'),
	array('cor'  => 'FFC0C0C0', 'ico' => 'google_silver.png'),
	array('cor'  => 'FF800000', 'ico' => 'google_navy.png'),
	array('cor'  => 'FF000000', 'ico' => 'google_black.png'),
	array('cor'  => 'FF808080', 'ico' => 'google_gray.png'),
	array('cor'  => 'FF0000FF', 'ico' => 'google_red.png'),
	array('cor'  => 'FF000080', 'ico' => 'google_maroon.png'),
	array('cor'  => 'FF00FF00', 'ico' => 'google_lime.png'),
	array('cor'  => 'FF008000', 'ico' => 'google_green.png')

);

//print_r($cores);

/*if ($todos=="on")
{
	$vc = mostraveiculos($id_cliente,$id_sessao);
	for ($i = 0; $i < count($vc); $i++){
		$vid = $vc[$i]["ID"];
		plotaveiculo($vid,6,0,"FF16FF08");
	}
}
else
{*/

	for ( $i = 0; $i < count($el); $i++ ) {

		plotaveiculo($el[$i],6,0,$cores[$i]["cor"],$cores[$i]["ico"],$id_sessao,$velocidadealta,$paradas,$pontosinteresse,$foco,$camera,$rota,$usuario);
	    
	}

//}

endkml();

?>
