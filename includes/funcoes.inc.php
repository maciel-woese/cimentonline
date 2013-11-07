<?php
require_once("phpmailer/class.phpmailer.php");


function redireciona($link){
if ($link==-1){
	echo" <script>history.go(-1);</script>";
}else{
	echo" <script>document.location.href='$link'</script>";
}
}

function tipoEvento($tipo){
				switch($tipo){
					
				case '16':
					$tipoEvento	= 'Cerca Eletrônica';
					break;

				case '2013':
					$tipoEvento	= 'Revisão';
					break;

				case '2014':
					$tipoEvento	= 'Troca de Óleo';
					break;

				case '2015':
					$tipoEvento	= 'Troca Filtro de Óleo';
					break;

				case '36':
					$tipoEvento	= 'Excesso Velocidade';
					break;

				case '1':
					$tipoEvento	= 'Pânico';
					break;

				case '17':
					$tipoEvento	= 'Excesso de tempo parado';
					break;	
			}

		return $tipoEvento;
}

function tipoSituacaoEvento($tipo){
	//1 = Solicitada, 2 = Autorizada, 3 = Em Andamento, 4 = Concluida
				switch($tipo){
					
				case '1':
					$tipo	= 'Solicitada';
					break;

				case '2':
					$tipo	= 'Autorizada';
					break;

				case '3':
					$tipo	= 'Em Andamento';
					break;

				case '4':
					$tipo	= 'Concluida';
					break;
			}

		return $tipo;
}


function verificaCNPJ( $cnpj ){
	if( strlen( $cnpj ) <> 14 or !is_numeric( $cnpj ) )
	{
	return false;
	}
	$k = 6;
	$soma1 = "";
	$soma2 = "";
	for( $i = 0; $i < 13; $i++ )
	{
	$k = $k == 1 ? 9 : $k;
	$soma2 += ( $cnpj{$i} * $k );
	$k--;
	if($i < 12)
	{
	if($k == 1)
	{
	$k = 9;
	$soma1 += ( $cnpj{$i} * $k );
	$k = 1;
	}
	else
	{
	$soma1 += ( $cnpj{$i} * $k );
	}
	}
	}

	$digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
	$digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

	return ( $cnpj{12} == $digito1 and $cnpj{13} == $digito2 );
}

function m2h($mins) {
        // Se os minutos estiverem negativos
        if ($mins < 0)
            $min = abs($mins); 
        else
            $min = $mins; 
 
        // Arredonda a hora
        $h = floor($min / 60); 
        $m = ($min - ($h * 60)) / 100; 
        $horas = $h + $m; 
 
        // Matemática da quinta série
        // Detalhe: Aqui também pode se usar o abs()
        if ($mins < 0)
            $horas *= -1; 
 
        // Separa a hora dos minutos
        $sep = explode('.', $horas); 
        $h = $sep[0]; 
        if (empty($sep[1]))
            $sep[1] = 0; 
 
        $m = $sep[1]; 
 
        // Aqui um pequeno artifício pra colocar um zero no final
        if (strlen($m) < 2)
            $m = $m . 0; 
        if($h > 0){
			return sprintf('%2dh e %2dm', $h, $m);
        }else{
			return  sprintf('%2dm', $m);
		}	
} 

function funConverteData($data){
	//VARIAVEL COM A DATA NO FORMATO AMERICANO
	//$data_americano = "2009-04-29";
	//$data_Brasileiro = "29/04/2012";
	//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
	$partes_da_data = explode('/',$data);

	//AGORA REMONTAMOS A DATA NO FORMATO BRASILEIRO, OU SEJA,
	//INVERTENDO AS POSICOES E COLOCANDO AS BARRAS
	$data = $partes_da_data[2].'-'.$partes_da_data[1].'-'.$partes_da_data[0];

	//UFA! PRONTINHO, AGORA TEMOS A DATA NO BOM E VELHO FORMATO BRASILEIRO
	return $data;
}

function funConverteDataHora($data){
	//VARIAVEL COM A DATA NO FORMATO AMERICANO
	//$data_americano = "2009-04-29";
	//$data_Brasileiro = "29/04/2012";
	//AGORA VAMOS EXPLODIR ELA PELOS HIFENS E SERÁ CRIADO UM ARRAY COM AS PARTES
	$partes_da_data = "";
	$hora = "";
	$partes_da_data = explode('/',$data);
	$hora = substr($partes_da_data[2],4,-1);

     //AGORA REMONTAMOS A DATA NO FORMATO BRASILEIRO, OU SEJA,
	//INVERTENDO AS POSICOES E COLOCANDO AS BARRAS
	$data = substr($partes_da_data[2],0,4).'-'.$partes_da_data[1].'-'.$partes_da_data[0];

	//UFA! PRONTINHO, AGORA TEMOS A DATA NO BOM E VELHO FORMATO BRASILEIRO
	//return 
	return $data.' '.$hora;
}	


function IcoDirecao($Direcao){
	switch ($Direcao){
		case 0: return "images/norte.png";
		case 1: return "images/nordeste.png";
		case 2: return "images/leste.png";
		case 3: return "images/sudeste.png";
		case 4: return "images/sul.png";
		case 5: return "images/sudoeste.png";
		case 6: return "images/oeste.png";
		case 7: return "images/noroeste.png";

		/*case 0: return "<img src='../includes/images/norte.png'>";
		 case 1: return "<img src='../includes/images/nordeste.png'>";
		 case 2: return "<img src='../includes/images/leste.png'>";
		 case 3: return "<img src='../includes/images/sudeste.png'>";
		 case 4: return "<img src='../includes/images/sul.png'>";
		 case 5: return "<img src='../includes/images/sudoeste.png'>";
		 case 6: return "<img src='../includes/images/oeste.png'>";
		 case 7: return "<img src='../includes/images/noroeste.png'>";*/

	}
}

function geraCodPonto($dig=8){
	$string = '0123456789abcdefghijlmnopqrstuvxyzw@#$%&*!?ABCDEFGHIJLMNOPQRSTUVXYZW';
	$senha = '';
	while ( strlen($senha) < $dig ) {
		$senha .= substr($string, rand(0, strlen($string)), 1);
	}
	return $senha;
}

function enviar_email($msg,$assunto) {

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "smtp.shsolutions.com.br";
	$mail->SMTPAuth = true;
	$mail->Username = "noreply@shsolutions.com.br";
	$mail->Password = "fsj@1500";
	$mail->From = "noreply@shsolutions.com.br";
	$mail->FromName = $assunto;
	//$mail->AddAddress("fcolucascabral@gmail.com","Lucas");
	$mail->AddAddress("sousa.justa@gmail.com","Sousa Justa");
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$nome     = ucwords($assunto);
	$email 	  = "sousa.justa@gmail.com";
	//$mail->AddReplyTo("$email","$nome");
	$msg1 .= "<br><br>\n<b> Mensagem Automatica</b><br><br>\n";
	$mail->Subject = $assunto;
	$mail->Body = $msg1 .' '. $msg;

	if(!$mail->Send())
	{
		echo "<P>houve um erro ao  enviar o email! </P>".$mail->ErrorInfo;
	}
}


function traduz($dia){
	switch ($dia) {

		case "Sunday":
			$dia = "Domingo";
			break;
		case "Monday":
			$dia = "Segunda";
			break;
		case "Tuesday":
			$dia = "Terça";
			break;
		case "Wednesday":
			$dia = "Quarta";
			break;
		case "Thursday":
			$dia = "Quinta";
			break;
		case "Friday":
			$dia = "Sexta";
			break;
		case "Saturday":
			$dia = "Sábado";
			break;

	}
	return $dia;
}

// seed with microseconds
function make_seed() {
	list($usec, $sec) = explode(' ', microtime());
	return (float) $sec + ((float) $usec * 100000);
}

function random($min,$max){
	srand(make_seed());
	return rand($min,$max);
}

function extractTimeMillis($ini,$fim){
	$ini = strtotime($ini);
	$fim = strtotime($fim);

	return $fim - $ini;
}

function hasInatividade($ponto1, $ponto2, $tempoInatividade){
	$data1 = $ponto1;
	$data2 = $ponto2;
	return $data2 - $data1 > $tempoInatividade * 1000;
}

function typeComandosPdf($str){
	$comando = substr($str,0,3);
	switch($comando){

		case 'VEL':
			$vel = substr($str,4,-1);
			return 'Configuração Velocidade Maxíma: '.(int)$vel.' Km/h';
			break;

		case 'VIV':
			$tel = substr($str,4,-1);
			return 'Acionamento de Viva-Voz: '.(int)$tel;
			break;

		case 'PAN':
			return 'DESATIVAR PANICO';
			break;

		case 'SMS':
			$cel = substr($str,4);

			list($celular1, $celular2, $celular3, $celular4) = explode(",", $cel);
			$panico1 = 'Celular 1 para Pânico: '.$celular1.' | ';
			$panico2 = 'Celular 2 para Pânico: '.$celular2.' | ';
			$alarme1 = 'Celular 1 para Alarme: '.$celular3.' | ';
			$alarme2 = 'Celular 2 para Alarme: '.$celular4.' | ';

			return $panico1.''.$panico2.''.$alarme1.''.$alarme2;
			break;

		case 'CFG':
			$saida1 = (substr($str,4,1)==1) ? 'Veículo Bloqueado  | ' :  'Veículo Desbloqueado  | ';
			$saida2 = (substr($str,5,1)==1) ? 'Saida 2 Ativada  | ' :  'Saida 2 Desativada  | ';
			$saida3 = (substr($str,6,1)==1) ? 'Saida 3 Ativada  | ' :  'Saida 3 Desativada  | ';
			$saida4 = (substr($str,7,1)==1) ? 'Saida 4 Ativada  | ' :  'Saida 4 Desativada  | ';

			return $saida1.' '.$saida2.' '.$saida3.' '.$saida4;
			break;

		case 'HO3':
			$ho3 = (substr($str,4,1)==1) ? 'Ativação de Horimetro' :  'Desativação de Horimetro';
			return $ho3;
			break;

		case 'HOR':
			$hor = substr($str,4,-1);
			return 'Valor Horimetro: '.(int)$hor.' Minutos';
			break;

		case 'ALM':
			switch(substr($str,4,1)){
				case '0':
					$alm = 'Sem Alarme';
					break;
				case '1':
					$alm = 'Alarme por Transmissão';
					break;
				case '2':
					$alm = 'Alarme em Nível 0V';
					break;
				case '3':
					$alm = 'Alarme em Nível 12V/24V';
					break;
			}


			return $alm;
			break;

		case 'OTI':
			$oti = (substr($str,4,1)==0) ? 'Otimização Desativada ' : 'Otimização Ativada ';
			return $oti;
			break;

		case 'TMP':
			$tmp = substr($str,4,-1);
			return 'Tempo de transmissão: '.(int)$tmp.' segundos';
			break;

		case 'IPP':
			$ipp = substr($str,4,-1);

			list($ip, $porta) = explode(",", $ipp);
			return 'Troca de IP e PORTA de Comunicação: IP = '.$ip.'| Porta = '.$porta;
			break;	
	}
}

function typeComandos($str){
	$comando = substr($str,0,3);
	switch($comando){

		case 'VEL':
			$vel = substr($str,4,-1);
			return 'Configuração Velocidade Maxíma: '.(int)$vel.' Km/h';
			break;

		case 'VIV':
			$tel = substr($str,4,-1);
			return 'Acionamento de Viva-Voz: '.(int)$tel;
			break;

		case 'SMS':
			$cel = substr($str,4);

			list($celular1, $celular2, $celular3, $celular4) = explode(",", $cel);
			$panico1 = 'Celular 1 para Pânico: '.$celular1.'<br>';
			$panico2 = 'Celular 2 para Pânico: '.$celular2.'<br>';
			$alarme1 = 'Celular 1 para Alarme: '.$celular3.'<br>';
			$alarme2 = 'Celular 2 para Alarme: '.$celular4.'<br>';

			return $panico1.''.$panico2.''.$alarme1.''.$alarme2;
			break;

		case 'CFG':
			$saida1 = (substr($str,4,1)==1) ? 'Veículo Bloqueado <br>' :  'Veículo Desbloqueado <br>';
			$saida2 = (substr($str,5,1)==1) ? 'Saida 2 Ativada <br>' :  'Saida 2 Desativada <br>';
			$saida3 = (substr($str,6,1)==1) ? 'Saida 3 Ativada <br>' :  'Saida 3 Desativada <br>';
			$saida4 = (substr($str,7,1)==1) ? 'Saida 4 Ativada <br>' :  'Saida 4 Desativada <br>';

			return $saida1.' '.$saida2.' '.$saida3.' '.$saida4;
			break;

		case 'HO3':
			$ho3 = (substr($str,4,1)==1) ? 'Ativação de Horimetro' :  'Desativação de Horimetro';
			return $ho3;
			break;

		case 'HOR':
			$hor = substr($str,4,-1);
			return 'Valor Horimetro: '.(int)$hor.' Minutos';
			break;

		case 'ALM':
			switch(substr($str,4,1)){
				case '0':
					$alm = 'Sem Alarme';
					break;
				case '1':
					$alm = 'Alarme por Transmissão';
					break;
				case '2':
					$alm = 'Alarme em Nível 0V';
					break;
				case '3':
					$alm = 'Alarme em Nível 12V/24V';
					break;
			}


			return $alm;
			break;

		case 'OTI':
			$oti = (substr($str,4,1)==0) ? 'Otimização Desativada ' : 'Otimização Ativada ';
			return $oti;
			break;

		case 'TMP':
			$tmp = substr($str,4,-1);
			return 'Tempo de transmissão: '.(int)$tmp.' segundos';
			break;

		case 'IPP':
			$ipp = substr($str,4,-1);

			list($ip, $porta) = explode(",", $ipp);
			return 'Troca de IP e PORTA de Comunicação: IP = '.$ip.' - Porta = '.$porta;
			break;		
	}
}

function cmp($p1,$p2) {
	if ($p1["DATE_TIME"] == $p2["DATE_TIME"]){
		return 0;
	}
	return (strtotime($p1["DATE_TIME"]) > strtotime($p2["DATE_TIME"])) ? -1 : 1;
}

function calcDistancia($latX1,$lngY1,$latX2,$lngY2){

	$arcoAB = 90 - ($latX1);
	$arcoAC = 90 - ($latX2);
	$arcoABC = $lngY1 - ($lngY2);
	$cosA= cos(deg2rad($arcoAC)) * cos(deg2rad($arcoAB))+ sin(deg2rad($arcoAC)) * sin(deg2rad($arcoAB))* cos(deg2rad($arcoABC));
	$arccosA= acos($cosA);
	$arccA = rad2deg($arccosA);
	$Metros = ("40030" * number_format($arccA,7))/360;
	$distance= round($Metros * 1000);

	if (is_nan($distance)) {
		$distance = 0;
	}

	return $distance;
}

function calcDistancia3($latX1,$lngY1,$latX2,$lngY2){

	$arcoAB = 90 - ($latX1);
	$arcoAC = 90 - ($latX2);
	$arcoABC = $lngY1 - ($lngY2);
	$cosA= cos(deg2rad($arcoAC)) * cos(deg2rad($arcoAB))+ sin(deg2rad($arcoAC)) * sin(deg2rad($arcoAB))* cos(deg2rad($arcoABC));
	$arccosA= acos($cosA);
	$arccA = rad2deg($arccosA);
	$Metros = ("40030" * $arccA)/360;
	$distance = $Metros * 1000;
	
	if (is_nan($distance)) {
		$distance = 0;
	}
	
	return $distance;
}

function formataTemp($temp){
	$tempFormatado = sprintf("%.0fD %.0fH %02.0fM %02.0fS",floor($temp/86400),floor($temp%86400/3600),floor($temp%3600/60),$temp%60);
	return $tempFormatado;
}

function formatDistancia($distanciaM){

	IF($distanciaM >= 1000){
		$km = number_format($distanciaM/1000,2);
		$distance = $km .' Km';
	}else{
		$distance = $distanciaM .' Metros';
	}

	return $distance;
}

function formatVel1($vel){
	$vel = (round($vel) <= 7) ? 0 : round($vel);
	return $vel;
}

function formatVel($vel){
	$vel = (round($vel) <= 7) ? 0 : round($vel);
	return $vel;//.' Km/h';
}

function SimNaoTexto($Valor){
	if (intval($Valor) == 0)
	return ('NÃO');
	else if (intval($Valor) == 1)
	return ('SIM');
	return;
}

function DirecaoTexto($Direcao){
	switch ($Direcao){
		case 0: return "NORTE";
		case 1: return "NORDESTE";
		case 2: return "LESTE";
		case 3: return "SUDESTE";
		case 4: return "SUL";
		case 5: return "SUDOESTE";
		case 6: return "OESTE";
		case 7: return "NOROESTE";
	}
}

function mudaignicao($ign) {
	if ($ign>0)
	{
		return "<img src='../includes/images/keyon.gif'> ";
	}
	else
	{
		return "<img src='../includes/images/keyoff.gif'>";
	}
}

function escString($str) {
	$str = htmlentities($str,ENT_QUOTES);
	if (!get_magic_quotes_gpc()) {
		return addslashes($str);
	} else {
		return $str;
	}
}

function paginacao($total, $porPagina){
	if ( $_GET['p'] )	$GLOBALS['p'] = $_GET['p'];

	#Define a p�gina como a primeira se n�o tem a string - undefined � do flash
	if ( !$GLOBALS['p'] || $GLOBALS['p'] == 'undefined' )	$GLOBALS['p'] = 0;

	# Calcula quantas p�ginas t�m (menos - 1 porque a pagina��o come�a do 0)
	$GLOBALS['ps'] = ceil($total / $porPagina) - 1;

	#Coloca o total como global
	$GLOBALS['total'] = $total;

	#Monta o antes do limit
	if( $GLOBALS['p'] > 0 ) {
		$ant = $porPagina * ($GLOBALS['p']);
	} else {
		$ant = 0;
	}

	#Registros por P�gina
	$GLOBALS['porPagina'] = $porPagina;

	return ' LIMIT '. $ant .','. $porPagina;
}

function f_paginacao ($info=0){
	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {$p = 0;
	}

	if ( $GLOBALS['ps'] > 0 )
	{

		print '<div id="paginacao">';
			
		# Qual � a p�gina que est� sendo paginada
		$pagina = explode("/", $_SERVER['PHP_SELF']);
		$pagina = $pagina[count($pagina)-1];

		# Link da p�gina atual com toda query string
		foreach($_GET as $k=>$v) if($k <> 'begin' && $k <> 'p' && $k <> 'defineorder' ) $queryString .= $k .'='. $v .'&';
		$link = $pagina .'?'. substr($queryString, 0, (strlen($queryString)-1));

		$NumRegistroInicial = ($p * $GLOBALS['porPagina']) + 1;

		if ($p <> $GLOBALS['ps']) 	$NumRegistroFinal = ($p * $GLOBALS['porPagina']) + $GLOBALS['porPagina'];
		else						$NumRegistroFinal = $GLOBALS['total'];

		if($info <> "")
		print '<font class="pag">Registros de '. $NumRegistroInicial .' á '. $NumRegistroFinal .' de <b>'. $GLOBALS['total'] .'</b> &nbsp; </font>';

		if ($p <> 0) {
			$showpage = $p - 1;
			print '<a class="pag" href="'.$link.'&p=0">Primeira</a><font color="ababab"> | </font>';
			print '<a class="pag" href="'.$link.'&p='.$showpage.'">Anterior</a><font color="ababab"> | </font>';
		} else {
			print '<font style="font-size:10px; color:#cccccc">Primeira</font><font color="ababab"> | </font>';
			print '<font style="font-size:10px; color:#cccccc">Anterior</font><font color="ababab"> | </font>';
		}

		for ($i = $p-2; $i<$p; $i++) {
			$showpage=$i+1;
			if ($i>=0) {
				print '<a class="pag" href="'.$link.'&p='.$i.'">'.$showpage.'</a><font color="#ababab"> | </font>';
			}
		}

		for ($i = $p; ($i<=$GLOBALS['ps'] AND $i<=($p+2)); $i++)
		{
			$showpage=$i+1;
			if ($i == $p) {
				print '<font style=\'font-size:10px; color:#CC6600\'>'.$showpage.'&nbsp;</font><font color="#ababab">| </font>';
			} else {
				print '<a class="pag" href="'.$link.'&p='.$i.'">'.$showpage.'</a><font color="#ababab"> | </font>';
			}
		}

		if ($p < $GLOBALS['ps']) {
			$showpage = $p + 1;
			print '<a class="pag" href="'.$link.'&p='.$showpage.'">Próxima</a><font color="#ababab"> | </font>';
			print '<a class="pag" href="'.$link.'&p='.$GLOBALS['ps'].'">Última</a>';
		} else {
			print '<font style="font-size:10px; color:#cccccc">Próxima</font><font color="#ababab"> | </font>';
			print '<font style="font-size:10px; color:#cccccc">Última</font>';
		}

		print '		<font style="font-size:10px; color:#666666"> | </font>
					<font style="font-size:10px; color:#CC6600">  Ir para página: </font>
    				<input type="text" id="irPara" name="irPara" style="text-align:center; width:26px; height:10px;" maxlength="3">
					<img src="images/bt_ir.gif" onclick="goToPage(\''.$link.'\',\''.$GLOBALS['ps'].'\')" style="cursor:pointer;" title="Ir para p�gina">';
			
		print '</div>';
	}
}

# Exibe erro se houve um na sess�o
function showError(){
	print "<script src='includes/js/showError.js'></script>";
	if ( $_SESSION['msg'] ) {
		print "<script>showError('', '". $_SESSION['msg'] ."');</script>";
		$_SESSION['msg'] = '';
	}
}

# Fun��o que pega um texto e deixa com o n� de chars desejado ou menos(letras)
function cortaTexto($str, $letras=30){
	$str = trim($str);							#Tira os espa�os
	if ( strlen($str) > $letras ) {
		#S� corta se tem mais que o valor a cortar
			
		$ret = substr($str,0,$letras);			#corta a string

		if ( substr($str,$letras,1) != " " ) {
			#Se depois do que cortou vinha espa�o ele deixa assim, senao ele tira o pedaco do final
			$tmp = explode(' ',$ret);
			unset($ret);
			for ( $i=0; $i<count($tmp)-1; $i++ ) {
				if ( !$ret )	$ret = $tmp[$i];
				else 			$ret .= ' '. $tmp[$i];
			}
		}

		$ret = trim($ret);
		return $ret .'...';	#Retorna com o ...
	} else
	return $str;	#Se a string � <ou= do que o que precisa mostrar, mostra ela intocada
}

# Fun��o que converte o formato de data. Se dd/mm/yyyy retorna yyyy-mm-dd e vice-versa
function dateConversion($date){
	if ( strstr($date,'/') )	$token = '/';
	else						$token = '-';
	$tmp = explode($token,$date);
	if ( strlen($tmp[0]) == 1 )	$tmp[0] = '0'. $tmp[0];
	if ( strlen($tmp[1]) == 1 )	$tmp[1] = '0'. $tmp[1];
	if ( strlen($tmp[2]) == 1 )	$tmp[2] = '0'. $tmp[2];
	if ( $token == '-' )	return substr($tmp[2], 0, 2) .'/'. $tmp[1] .'/'. $tmp[0];
	else						return substr($tmp[2], 0, 4) .'-'. $tmp[1] .'-'. $tmp[0];
}

# Verifica se um campo est� vazio
function isEmpty($field)
{
	if ( !$_POST[$field] )	return true;
	else					return false;
}

# Verifica se est� no formato datetime certo
function isDatetime($field){
	if ( isEmpty($field) )	return false;

	$tmp = explode(' ', $_POST[$field]);
	if ( count($tmp) != 2 )	return false;

	$data = $tmp[0];
	$time = $tmp[1];

	if ( !checkdate( substr($_POST[$field], 3, 2), substr($_POST[$field], 0, 2), substr($_POST[$field], 6, 4) ) )	return false;
	if ( strlen($time) != 5 || substr($time, 2, 1) != ':' )	return false;
	return true;
}

# Verifica se � um e-mail v�lido
function isEmail($field){
	if ( strstr($_POST[$field], '@') && (strstr($_POST[$field], '@') > strrchr($_POST[$field], '.') ) ) {
		return true;
	} else {
		return false;
	}
}

# Verifica se a imagem � gif, jpg ou png num campo file
function isImage($field)
{
	if ( strtolower(substr($_FILES[$field]['name'], -3)) == 'gif' ) {
		return true;
	} elseif ( strtolower(substr($_FILES[$field]['name'], -3)) == 'jpg' ) {
		return true;
	} elseif ( strtolower(substr($_FILES[$field]['name'], -3)) == 'png' ) {
		return true;
	} else
	return false;
}

# Define o order
function defineOrder()
{
	if ( $_GET['defineorder'] ) {
		$tmp = explode(' ', $_SESSION['orderby']);
		if ( $_GET['defineorder'] == $tmp[0] ) {
			if ( $tmp[1] == 'ASC' )	$tmp[1] = 'DESC';
			else					$tmp[1] = 'ASC';
		} else {
			$tmp[0] = $_GET['defineorder'];
			$tmp[1] = 'ASC';
		}
		$_SESSION['orderby'] = $tmp[0].' '.$tmp[1];
	}
}

# Exibe ou n�o a seta de order e qual a posi��o
function orderArrow($field)
{
	$tmp = explode(' ', $_SESSION['orderby']);
	if ( $tmp[0] == $field ) {
		if ( $tmp[1] == 'ASC' )	$t = 'baixo';
		else					$t = 'cima';
		print '<img src="images/img_seta_'. $t .'.gif">';
	}
}

# Retorno o nome do m�s
function monthName($month){
	switch ( $month ) {
		case 1:		return 'janeiro';	break;
		case 2:		return 'fevereiro';	break;
		case 3:		return 'março';		break;
		case 4:		return 'abril';		break;
		case 5:		return 'maio';		break;
		case 6:		return 'junho';		break;
		case 7:		return 'julho';		break;
		case 8:		return 'agosto';	break;
		case 9:		return 'setembro';	break;
		case 10:	return 'outubro';	break;
		case 11:	return 'novembro';	break;
		case 12:	return 'dezembro';	break;
	}
}

# Printa o erro na tela se houver
function printErro(){
	if ( $_SESSION['msg'] ) {
		print $_SESSION['msg'];
		$_SESSION['msg'] = '';
	}
}

function caixaFiltro(){
	$qstring = '?';
	foreach ( $_GET as $k=>$v )	$qstring .= $k.'='.$v.'&';

	print '<div id="showFiltro">
					<div id="msgbox_filtro">
						<h2 class="msgbox_titulo"> Informação do Sistema <a title="Fechar" href="javascript: hideFiltros();">Fechar</a></h2>
						<p id="camposFiltro"></p>
						<p id="botoes" style="text-align:center">
						<input type="image" src="images/bt_filtrar.gif" title="Filtrar Resultados" onClick="formFiltro.submit();" style="border:0px;">
						<input type="image" src="images/bt_limpar.gif"  title="Limpar Filtro" onClick="hideFiltros(); window.location.href=\''.$_SERVER["PHP_SELF"].'?modulo='.$_GET["modulo"].'&acao='.$_GET["acao"].'&begin=1&busca=limpar\';" style="border:0px;">
						<input type="image" src="images/bt_fechar.gif"  title="Fechar" onClick="hideFiltros();" style="border:0px;">
						</p>
						<div class="rodape"></div>
					</div>
				</div>';
}

function caixaInsere()
{
	$qstring = '?';
	foreach ( $_GET as $k=>$v )	$qstring .= $k.'='.$v.'&';

	print '<div id="showInsere">
					<div id="msgbox_insere">
						<h2 class="msgbox_titulo"> Informação do Sistema <a title="Fechar" href="javascript: hideInsere();">Fechar</a></h2>
						<p id="divCampos">
							<form method="POST" id="formCampos" name="formCampos">
							</form>
						</p>
						<div class="rodape"></div>
					</div>
				</div>';
}

#Gera��o de senha rand�mica
function geraSenha($dig=6)
{
	$string = '0123456789abcdefghijlmnopqrstuvxyzw!@#$£%¢{&()/-§';
	$senha = '';
	while ( strlen($senha) < $dig ) {
		$senha .= substr($string, rand(0, strlen($string)), 1);
	}
	return $senha;
}

# Imprime a caixa para visualiza��o de imagens no admin
function printImagePreview()
{
	print '<div style="position: absolute; left: 20px; top: 20px; display: none; background-color: #C1C1C1; padding: 10px;" id="divVerImagem" align="center"><a href="javascript: fechaImagem();">Clique para fechar<br><img src="" id="imgVerImagem" style="border: 1px solid #000000;"></a></div>';
}

function getExtension($filename)
{
	$tmp = explode('.', $filename);
	return $tmp[count($tmp)-1];
}

function ConvertFromDateTime($dttm,$saida='DataHora'){
	if (($dttm != '0000-00-00 00:00:00') and ($dttm != '')) {
		$erro = false;
		switch(strlen($dttm)) {
			// tamanho do formato 2006-12-31 24:00:00
			case 19 :
				if(strpos($dttm,' ') == 10) {
					$date_time = explode(" ", $dttm);
				}
				else { if(!$erro) $erro = 1;
				}
				if(!$erro and (strpos($date_time[0],'-') == 4) and (strrpos($date_time[0],'-') == 7)) {
					$date = explode("-",$date_time[0]);
					list($year, $month, $day)=$date;
				}
				else { if(!$erro) $erro = 2;
				}
				if(!$erro and (strpos($date_time[1],':') == 2) and (strrpos($date_time[1],':') == 5)) {
					$time = explode(":",$date_time[1]);
					list($hour,$minute,$second)=$time;
				}
				else { if(!$erro) $erro = 3;
				}
				if(!$erro) {
					$unixtime = mktime($hour,$minute,$second,$month,$day,$year);
					unset($date_time);
				}
				else {
					if($erro >= 1) unset($date_time);
					echo $erro;
					return false;
				}
				break;
				// tamanho do formato 2006-12-31
			case 10 :
				$erro = false;
				if(!$erro and (strpos($dttm,'-') == 4) and (strrpos($dttm,'-') == 7)) {
					$date = explode("-",$dttm);
					list($year, $month, $day)=$date;
				}
				else {
					if((strpos($dttm,'/') == 2) and (strrpos($dttm,'/') == 5)) {
						return $dttm;
					}
					else {
						$erro = true;
					}
				}
				if(!$erro) {
					unset($date);
					$unixtime = mktime(0,0,0,$month,$day,$year);
				}
				else {
					return false;
				}
				break;
				// tamanho do formato 24:00:00
			case 8 :
				$erro = false;
				if(!$erro and (strpos($dttm,':') == 2) and (strrpos($dttm,':') == 5)) {
					$time = explode(":",$dttm);
					list($hour,$minute,$second)=$time;
				}
				else { $erro = true;
				}
				if(!$erro) {
					$unixtime = gmmktime($hour,$minute,$second,1,1,1970);
				}
				else {
					return false;
				}
				break;
				// tamanho do formato 24:00
			case 5 :
				$erro = false;
				if(!$erro and (strpos($dttm,':') == 2)) {
					$time = explode(":",$dttm);
					list($hour,$minute)=$time;
				}
				else { $erro = true;
				}
				if(!$erro) {
					$unixtime = gmmktime($hour,$minute,0,1,1,1970);
				}
				else {
					return false;
				}
				break;
			default :
				return $dttm;
		}

		// Convers�o de sa�da
		switch($saida) {
			case 'DataHora' :
				return date('d/m/Y H:i:s',$unixtime);
				break;
			Case 'Data' :
				return date('d/m/Y',$unixtime);
				break;
			Case 'Hora' :
				return date('H:i:s',$unixtime);
				break;
			Case 'Unix' :
				return $unixtime;
				break;
		}
	}
	else { return '';
	}
}

function ConvertFromDateTime2($dttm,$saida='DataHora'){
	if (($dttm != '00/00/0000 00:00:00') and ($dttm != '')) {
		$erro = false;
		switch(strlen($dttm)) {
			// tamanho do formato 2006-12-31 24:00:00
			case 19 :
				if(strpos($dttm,' ') == 10) {
					$date_time = explode(" ", $dttm);
				}
				else { if(!$erro) $erro = 1;
				}
				if(!$erro and (strpos($date_time[0],'/') == 2) and (strrpos($date_time[0],'/') == 5)) {
					$date = explode("/",$date_time[0]);
					list($day, $month, $year)=$date;
				}
				else { if(!$erro) $erro = 2;
				}
				if(!$erro and (strpos($date_time[1],':') == 2) and (strrpos($date_time[1],':') == 5)) {
					$time = explode(":",$date_time[1]);
					list($hour,$minute,$second)=$time;
				}
				else { if(!$erro) $erro = 3;
				}
				if(!$erro) {
					$unixtime = mktime($hour,$minute,$second,$month,$day,$year);
					unset($date_time);
				}
				else {
					if($erro >= 1) unset($date_time);
					echo $erro;
					return false;
				}
				break;
				// tamanho do formato 2006-12-31
			case 10 :
				$erro = false;
				if(!$erro and (strpos($dttm,'/') == 7) and (strrpos($dttm,'/') == 4)) {
					$date = explode("0",$dttm);
					list($day, $month, $year)=$date;
				}
				else {
					if((strpos($dttm,'/') == 2) and (strrpos($dttm,'/') == 5)) {
						return $dttm;
					}
					else {
						$erro = true;
					}
				}
				if(!$erro) {
					unset($date);
					$unixtime = mktime(0,0,0,$month,$day,$year);
				}
				else {
					return false;
				}
				break;
				// tamanho do formato 24:00:00
			case 8 :
				$erro = false;
				if(!$erro and (strpos($dttm,':') == 2) and (strrpos($dttm,':') == 5)) {
					$time = explode(":",$dttm);
					list($hour,$minute,$second)=$time;
				}
				else { $erro = true;
				}
				if(!$erro) {
					$unixtime = gmmktime($hour,$minute,$second,1,1,1970);
				}
				else {
					return false;
				}
				break;
				// tamanho do formato 24:00
			case 5 :
				$erro = false;
				if(!$erro and (strpos($dttm,':') == 2)) {
					$time = explode(":",$dttm);
					list($hour,$minute)=$time;
				}
				else { $erro = true;
				}
				if(!$erro) {
					$unixtime = gmmktime($hour,$minute,0,1,1,1970);
				}
				else {
					return false;
				}
				break;
			default :
				return $dttm;
		}

		// Convers�o de sa�da
		switch($saida) {
			case 'DataHora' :
				return date('Y-m-d H:i:s',$unixtime);
				break;
			Case 'Data' :
				return date('Y-m-d',$unixtime);
				break;
			Case 'Hora' :
				return date('H:i:s',$unixtime);
				break;
			Case 'Unix' :
				return $unixtime;
				break;
		}
	}
	else { return false;
	}
}

function ConvertToDateTime($data,$comHoras = true) {
	if(!$erro and (strpos($data,'/') == 2) and (strrpos($data,'/') == 5)) {
		$arrData = explode('/',$data);
		$dataSaida = $arrData[2]."-".$arrData[1]."-".$arrData[0];
		if($comHoras) $dataSaida .= " 00:00:00";
		return $dataSaida;
	}
	else {
		return false;
	}
}

function FloatToMoney($valor,$mostrar=true) {
	$varTmp = str_replace('.',',',$valor);
	if($valor == 0 or $valor == '') {
		if($mostrar) $varTmp = '0,00';
		else $varTmp='';

	}
	else {
		if($posi = strrpos($varTmp,',')){
			$rposi = strlen($varTmp) - $posi;
			if($rposi == 2) $varTmp .= "0";
		}
		else {
			$varTmp .= ",00";
		}
	}
	return $varTmp;
}

function MoneyToFloat($valor) {
	$varTmp = str_replace('.','',$valor);
	return str_replace(',','.',$varTmp);
}

function SearchImage($DiretorioLocal,$URL,$NomeImagem) {
	$ImgExts = array("jpeg","jpg","png","gif","tif","tiff");
	foreach($ImgExts AS $Ext) {
		if (file_exists($DiretorioLocal.$NomeImagem.".".$Ext)) {
			$ImagePath = $URL.$NomeImagem.".".$Ext;
			break;
		}
	}
	if($ImagePath != '') {
		return $ImagePath;
	}
	else { return false;
	}
}

function SearchImagePath($DiretorioLocal,$NomeImagem) {
	$ImgExts = array("jpeg","jpg","png","gif","tif","tiff");
	foreach($ImgExts AS $Ext) {
		if (file_exists($DiretorioLocal.$NomeImagem.".".$Ext)) {
			$ImagePath = $DiretorioLocal.$NomeImagem.".".$Ext;
			break;
		}
	}
	if($ImagePath != '') {
		return $ImagePath;
	}
	else { return false;
	}
}

/**
 * Fun��o para ajudar no debug de vari�veis de acordo com o tipo de sa�da
 * definido em $dump_type. Caso $kill seja um valor booleano TRUE ou express�o
 * booleana avaliada como TRUE, o script ir� parar a execu��o ap�s a exibi��o
 * da sa�da gerada pela fun��o.
 *
 * @param mixed $var Vari�vel a ser "debugada"
 * @param string $dump_type Tipo de m�todo a ser utilizado para debugar a vari�vel
 *        definida em $var. Os poss�veis valores s�o: print, dump e export. Caso
 *        nenhum tipo seja definido 'print' � assumido.
 * @param boolean $kill Para o script ap�s a exibi��o da sa�da caso seu valor
 *        seja avaliado como TRUE
 * @return string
 */
function vm_dump($var,$dump_type = null,$kill = false){
	switch($dump_type)
	{
		default:
		case 'print':
			$dump_method = 'print_r';
			break;

		case 'dump':
			$dump_method = 'var_dump';
			break;

		case 'export':
			$dump_method = 'var_export';
			break;
	}
	$style =  '
            <style type="text/css">
                code#vm_dump
                {
                    width:95%;
                    padding:.5em;
                    font:12px Courier,"Courier New",Monospace,serif;
                    border:1px solid #666;
                    background:#eee;
                    color:#666;
                    white-space:pre;
                    display:block;
                    cursor:pointer;
                }
                code#vm_dump:hover
                {
                    background:#efefef;
                    color:#000;	
                }
            </style>
            ';

	ob_start();
	$dump_method($var);
	$content = ob_get_contents();
	ob_end_clean();

	print $style;
	print '<code id="vm_dump">';
	print $content;
	print '</code>';

	if($kill) die;
}

#Gera combobox atrav�s de um array
function comboBox($nome, $class = "", $dados, $selected, $atributos = "")
{
	$count = count($dados);
	echo "<select name=\"" . $nome . "\" class=\"" . $class . "\" $atributos>";
	$i = 0;
	do {
		echo "<option value=\"" . $dados[$i] . "\" ".(($dados[$i] == $selected)? "selected":"").">" . $dados[$i] . "</option>";
		++$i;
	} while ($i < $count);
	echo "</select>";
}

# Fun��o para colocar sempre a primeira letra da string em
# letra mai�scula, exceto as preposi��es (e, de, da, do ...)
function altaebaixa($umtexto) {

	$troca = strtolower($umtexto);
	$troca = "". $certo ."". ucwords($troca);
	$troca = @trocaini($troca, " E ", " e ");
	$troca = @trocaini($troca, " De ", " de ");
	$troca = @trocaini($troca, " Da ", " da ");
	$troca = @trocaini($troca, " Do ", " do ");
	$troca = @trocaini($troca, " Das ", " das ");
	$troca = @trocaini($troca, " Dos ", " dos ");

	$altabaixa = $troca;
	return $altabaixa;

}

function trocaini($wStr,$w1,$w2) {
	$wde = 1;
	$para=0;
	while($para<1) {
		$wpos = strpos($wStr, $w1, $wde);
		if ($wpos > 0) {
			$wStr = str_replace($w1, $w2, $wStr);
			$wde = $wpos+1;
		} else {
			$para=2;
		}
	}
	$trocou = $wStr;
	return $trocou;
}

function obrigatorio()
{
	print '<img src="images/img_campo.gif" border="0" title="Campo Obrigat�rio" />';
}

function dateTimeConversion($date)
{
	$tmp = explode(" ",$date);
	return dateConversion($tmp[0])." ".$tmp[1];
}

function RemoveAcentos($Msg) {
	$a = array(
             '/[�����]/'=>'A',
             '/[�����]/'=>'a',
             '/[����]/'=>'E',
             '/[����]/'=>'e',
             '/[����]/'=>'I',
             '/[����]/'=>'i',
             '/[�����]/'=>'O',
             '/[�����]/'=>'o',
             '/[����]/'=>'U',
             '/[����]/'=>'u',
             '/ /'=>'_',
             '/�/'=>'c',
             '/�/'=> 'C');

	return preg_replace(array_keys($a), array_values($a), $Msg);
}

#####
# Fun��es Auxiliares de Data
###

# Retorna o Dia de Uma data - Formato dd/mm/aaaa
function getDia($data) {
	$array = explode("/",$data);
	return $array[0];
}

# Retorna o M�s de Uma data - Formato dd/mm/aaaa
function getMes($data) {
	$array = explode("/",$data);
	return $array[1];
}

# Retorna o Ano de Uma data - Formato dd/mm/aaaa
function getAno($data) {
	$array = explode("/",$data);
	return $array[2];
}

# Conta a quantidade de dias da semana de um determinado per�odo
# E retorna um array com as quantidades - Formato dd/mm/aaaa
function countDiaSemana($dtIni,$dtFim,$id_empregado=0) {
	$qtd[0] = 0; // Domingo
	$qtd[1] = 0; // Segunda
	$qtd[2] = 0; // Ter�a
	$qtd[3] = 0; // Quarta
	$qtd[4] = 0; // Quinta
	$qtd[5] = 0; // Sexta
	$qtd[6] = 0; // S�bado
	while (dataMaiorMenor($dtFim,'00:00:00',$dtIni,'00:00:00') or ($dtFim == $dtIni)) {
		$aVet = Explode( "/",$dtIni);
		$dia = $aVet[0];
		$mes = $aVet[1];
		$ano = $aVet[2];
		if ($id_empregado) {
			if (!findFeriado("$dia/$mes/$ano",$id_empregado)) {
				$nDia = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
				$qtd[$nDia]++;
			}
		} else {
			$nDia = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
			$qtd[$nDia]++;
		}
		$dtIni = date("d/m/Y", mktime(0, 0, 0, $mes, $dia+1, $ano));
	}
	return $qtd;
}

/**
 * M�todo utilizado para encontrar a diferen�a entre duas datas - dd/mm/aaaa
 *
 * @param data1
 *            primeira data
 * @param hora1
 *            hor�rio da primeira data
 * @param data2
 *            segunda data
 * @param hora2
 *            hor�rio da segunda data
 * @param tipo_resultado
 *            tipo do resultado: 0 - em segundos; 1 - em minutos; 2 - em horas; 3 - em dias;
 *
 * @return diferen�a em horas
 */
function difData($data1,$hora1,$data2,$hora2,$tipo_resultado) {

	$aDt = explode("/",$data1);
	$mes1 = $aDt[1];
	$dia1 = $aDt[0];
	$ano1 = $aDt[2];
	$aHr = explode(":",$hora1);
	$horas1 = $aHr[0];
	$minutos1 = $aHr[1];
	$segundos1 = $aHr[2];
	$total_segundos1 = mktime($horas1,$minutos1,$segundos1,$mes1,$dia1,$ano1);

	$aDt = explode("/",$data2);
	$mes2 = $aDt[1];
	$dia2 = $aDt[0];
	$ano2 = $aDt[2];
	$aHr = explode(":",$hora2);
	$horas2 = $aHr[0];
	$minutos2 = $aHr[1];
	$segundos2 = $aHr[2];

	$total_segundos2 = mktime($horas2,$minutos2,$segundos2,$mes2,$dia2,$ano2);

	if ($total_segundos1 >= $total_segundos2) {
		$diferenca = $total_segundos1 - $total_segundos2;
	} else {
		$diferenca = $total_segundos2 - $total_segundos1;
	}

	switch ($tipo_resultado) {

		case 0:
			$diferenca = $diferenca/(1);
			break;

		case 1:
			$diferenca = $diferenca/(60);
			break;

		case 2:
			$diferenca = $diferenca/(60*60);
			break;

		case 3:
			$diferenca = $diferenca/(60*60*24);
			break;

		default:
			$diferenca = $diferenca/(1);
			break;
	}

	return $diferenca;
}

/**
 * M�todo utilizado para verificar se uma data � maior que outra
 *
 * @param data1
 *            primeira data
 * @param hora1
 *            hor�rio da primeira data
 * @param data2
 *            segunda data
 * @param hora2
 *            hor�rio da segunda data
 *
 * @return 0 - caso data1+hora1 seja igual a data2+hora2
 *
 * @return 1 - caso data1+hora1 seja maior
 *
 * @return 2 - caso data2+hora2 seja maior
 */
function comparaDatas($data1,$hora1,$data2,$hora2) {

	$aDt = explode("/",$data1);
	$dia1 = $aDt[0];
	$mes1 = $aDt[1];
	$ano1 = $aDt[2];

	$aHr = explode(":",$hora1);
	$horas1 = $aHr[0];
	$minutos1 = $aHr[1];
	$segundos1 = $aHr[2];

	$total_segundos1 = mktime($horas1,$minutos1,$segundos1,$mes1,$dia1,$ano1);

	$aDt = explode("/",$data2);
	$dia2 = $aDt[0];
	$mes2 = $aDt[1];
	$ano2 = $aDt[2];

	$aHr = explode(":",$hora2);
	$horas2 = $aHr[0];
	$minutos2 = $aHr[1];
	$segundos2 = $aHr[2];

	$total_segundos2 = mktime($horas2,$minutos2,$segundos2,$mes2,$dia2,$ano2);

	if ($total_segundos1 == $total_segundos2) {
		return 0;
	}
	if ($total_segundos1 > $total_segundos2) {
		return 1;
	}
	if ($total_segundos2 > $total_segundos1) {
		return 2;
	}
}

/**
 * M�todo utilizado para somar dias, meses ou anos a uma data
 *
 * @param data
 *            data original
 *
 * @return data somada
 */
function somaData01($data,$dias=0,$meses=0,$anos=0) {

	$aDt = explode("/",$data);

	$dia = $aDt[0] + $dias;
	$mes = $aDt[1] + $meses;
	$ano = $aDt[2] + $anos;
	$hora = 0;
	$minuto = 0;
	$segundo = 0;

	return date("d/m/Y", mktime($hora,$minuto,$segundo,$mes,$dia,$ano));
}

/*Retorna o dia da semana
 * param data formato americano
 * */
function diaSemana($data){
	$oldlocale = setlocale(LC_ALL, NULL);
	setlocale(LC_ALL, 'pt_BR');
	$dia_semana = gmstrftime("%A", strtotime($data));
	setlocale(LC_ALL, $oldlocale);

	return ucfirst($dia_semana);
}
?>
