<?php
error_reporting(0);

if( (isset($_GET['sigla']) and !empty($_GET['sigla'])) || (isset($_GET['uf']) and !empty($_GET['uf']))  ){

    if($_GET['sigla'] == 'AC' || $_GET['uf'] == 1 ){
        $AC = 'active';
    }
    if($_GET['sigla'] == 'AL' || $_GET['uf'] == 2 ){
        $AL = 'active';
    }
    if($_GET['sigla'] == 'AP' || $_GET['uf'] == 3 ){
        $AP = 'active';
    }
    if($_GET['sigla'] == 'AM' || $_GET['uf'] == 4 ){
        $AM = 'active';
    }
    if($_GET['sigla'] == 'BA' || $_GET['uf'] == 5 ){
        $BA = 'active';
    }
    if($_GET['sigla'] == 'CE' || $_GET['uf'] == 6 ){
        $CE = 'active';
    }
    if($_GET['sigla'] == 'DF' || $_GET['uf'] == 7 ){
        $DF = 'active';
    }
    if($_GET['sigla'] == 'ES' || $_GET['uf'] == 8 ){
        $ES = 'active';
    }
    if($_GET['sigla'] == 'GO' || $_GET['uf'] == 9 ){
        $GO = 'active';
    }
    if($_GET['sigla'] == 'MA' || $_GET['uf'] == 10 ){
        $MA = 'active';
    }
    if($_GET['sigla'] == 'MT' || $_GET['uf'] == 11 ){
        $MT = 'active';
    }
    if($_GET['sigla'] == 'MS' || $_GET['uf'] == 12 ){
        $MS = 'active';
    }
    if($_GET['sigla'] == 'MG' || $_GET['uf'] == 13 ){
        $MG = 'active';
    }
    if($_GET['sigla'] == 'PA' || $_GET['uf'] == 14 ){
        $PA = 'active';
    }
    if($_GET['sigla'] == 'PB' || $_GET['uf'] == 15 ){
        $PB = 'active';
    }
    if($_GET['sigla'] == 'PR' || $_GET['uf'] == 16 ){
        $PR = 'active';
    }
    if($_GET['sigla'] == 'PE' || $_GET['uf'] == 17 ){
        $PE = 'active';
    }
    if($_GET['sigla'] == 'PI' || $_GET['uf'] == 18 ){
        $PI = 'active';
    }
    if($_GET['sigla'] == 'RJ' || $_GET['uf'] == 19 ){
        $RJ = 'active';
    }
    if($_GET['sigla'] == 'RN' || $_GET['uf'] == 20 ){
        $RN = 'active';
    }
    if($_GET['sigla'] == 'RS' || $_GET['uf'] == 21 ){
        $RS = 'active';
    }
    if($_GET['sigla'] == 'RO' || $_GET['uf'] == 22 ){
        $RO = 'active';
    }
    if($_GET['sigla'] == 'RR' || $_GET['uf'] == 23 ){
        $RR = 'active';
    }
    if($_GET['sigla'] == 'SC' || $_GET['uf'] == 24 ){
        $SC = 'active';
    }
    if($_GET['sigla'] == 'SP' || $_GET['uf'] == 25 ){
        $SP = 'active';
    }
    if($_GET['sigla'] == 'SE' || $_GET['uf'] == 26 ){
        $SE = 'active';
    }

    if($_GET['sigla'] == 'TO' || $_GET['uf'] == 27 ){
        $TO = 'active';
    }  
}

?>
<!-- // FUNÇÃO PARA ENFATIZAR ESTADO NO MAPA -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>

<script>
$(function($){

    // No id #enviar assim que clicar executa a função
    $('#enviar').click(function(){

    /* veja que eu criei variáveis para guardar os item
     * e só precisei usar a função val() para
     * retornar o valor dos campo para a várivel
     */

        var nome = $('#nome').val();
        var idade = $('#idade').val();

    // só parar testar coloco as variáveis em um alert, só para verificarmos <img src='http://tutsmais.com.br/blog/wp-includes/images/smilies/icon_smile.gif' alt=':)' class='wp-smiley' /> 
        alert(nome + ' ' + idade);
    });
});
</script>

<!-- FIM FUNÇÃO PARA ENFATIZAR ESTADO NO MAPA // -->

<div id="map-svg">
<div id="map-content" class="map-content">
<!--?xml version="1.0" encoding="UTF-8" standalone="no"?-->
<svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 438.193 442.764" xml:space="preserve" height="100%" width="100%" version="1.1" y="0px" x="0px" xmlns:cc="http://creativecommons.org/ns#" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 438.193 442.764" xmlns:dc="http://purl.org/dc/elements/1.1/"><metadata><rdf:rdf><cc:work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type><dc:title></dc:title></cc:work></rdf:rdf></metadata>
<defs>
    <style type="text/css">
    			svg{height:452px}
                a{fill:#bcccdb; text-decoration:none}a:hover, .active{fill:#4674b8; cursor:pointer; text-decoration:none}
                text{font-size:.80em;fill:#fff;font-family:Arial-BoldMT,sans-serif; cursor:pointer}
                circle{fill:#888}a:hover circle, .active circle{fill:#222; cursor:pointer}
    			
    			.mapa_pesquisa{
    				width:480px; 
    				height:470px;  
    				margin:50px auto; 
    				font:65%/1.4 arial,helvetica,sans-serif;
    				color:#000;  
    				text-align:center;
    				}			
    </style>
</defs>

<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=SC" class="modal-link <? echo $SC ?>" rel="nofollow"><desc>Santa Catarina</desc>
<path d="M268.03,391.47c-0.84-0.98-4.05-0.92-1.87-2.62,0.99-1.82,2.78-4.02,1.66-6.14-2.48-0.97-5.82,0.57-8.26-1.17-1.87-1.74-1.96-4.73-4.2-6.21-2.14-2.11-4.89-3.46-7.79-4.14-2.48-1.52-4.95-3.15-7.97-3.27-2.94-0.02-5.68-1.06-8.57-1.2-1.81,0.29-3.4-0.38-2.67-2.44-0.45-2.61-0.36-7.28,3.55-5.92,2.21,0.57,4.43,1.06,6.7,1.36,3.58,0.58,7.03,1.68,10.44,2.86,2.74,1.01,4.58-1.13,5.43-3.36,2.44-1.01,4.9-1.91,7.22-3.2,2.83-0.73,5.37,0.95,7.89,1.92,2.33,0.87,3.96-1.53,6.11-1.95,1.35-0.73,5.44-0.52,3.09,1.4-1.88,1.59,0.06,3.75-0.07,5.72,0.44,2.78,0.88,5.56,0.93,8.37-0.8,0.76-1.93,3.37,0.14,1.88,2.39-0.83,0.26,3.05-0.11,4.11-1.2,2.29-1.76,5.13-3.65,6.94-2.08,1.59-4.64,2.66-6.12,4.93-0.62,0.72-1.2,1.47-1.88,2.13z"></path>
<text transform="matrix(1 0 0 1 257.5745 372.3228)">SC</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=RN" class="modal-link <? echo $RN ?>" rel="nofollow"><desc>Rio Grande do Norte</desc>
<path d="M418.58,143.23c-0.58-1.73-2.09-3.28-4.06-2.77-1.31,0.07-3.55,0.23-3.57-1.6,0.6-1.94,2.78-3.03,2.97-5.14-0.35-1.78-2.67-1.75-4.04-1.27-2.37,0.7-4.21,2.42-6.22,3.77-1.59,0.83-3.53,0.47-5.04-0.36-0.1-1.93,2.47-2.06,3.51-3.25,2.5-2.25,3.03-5.79,4.98-8.43,1.1-1.62,2.58-3.4,4.65-3.65,2.03,0.01,3.58,1.6,5.53,1.95,3.47,1.1,7.03,2.12,10.71,2.07,2.25,0.12,4.62,1.22,5.5,3.43,1.64,3.38,2.08,7.17,2.87,10.8,0.3,1.76-2.16,0.23-3.19,0.39-2.22-0.41-4.51-0.52-6.7-1.05-1.62-0.55-3.07-1.68-4.83-1.7-1.64,0.78-1.21,2.84-1.66,4.29-0.3,0.92-0.85,1.83-1.41,2.52z"></path>
<!-- <circle cy="122.26" cx="423.54" r="10"></circle> -->
<text transform="matrix(1 0 0 1 416.8206 132.1045)">RN</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=PB" class="modal-link <? echo $PB ?>" rel="nofollow"><desc>Paraíba</desc>
<path d="M414.88,158.11c-1.43-0.75-1.44-2.58-1.96-3.92-0.89-1.81,1.53-2.7,1.74-4.23,0.34-1.68-1.6-2.49-2.96-2.57-3.04-0.16-4.96,2.68-7.58,3.73-2.08,0.98-4.58,0.98-6.73,0.21-1.26-1.4,1.54-2.84,0.88-4.54-0.6-1.39-1.14-2.83-0.93-4.38,0.04-1.68,0.39-3.35,1-4.91,1.36,0.2,2.89,0.88,4.4,0.68,1.72,0.02,3.36-0.79,4.4-2.16,1.08-1.35,2.78-2.32,4.52-2.27-0.06,1.72-1.69,3-2.28,4.58-1.25,2.04,1.08,3.62,2.95,3.48,1.65,0.2,4.13-0.42,4.7,1.71,0.46,1.36,2.48,1.84,3.24,0.49,0.63-1.3,0.81-2.77,1.34-4.11,0-1.24,0.58-2.56,1.94-1.47,2.65,1.63,5.87,1.65,8.85,2.18,1.39,0.39,3.05-0.13,4.27,0.77,1.05,1.47,0.68,3.42,1.15,5.09,0.2,1.47,0.87,4.38-0.12,4.98-1.56-0.87-3.29-2.44-5.18-1.55-1.54,0.86-2.23,2.85-4.09,3.23-2.6,0.54-5.41-0.22-7.85,1.07-2.2,0.74-3.32,2.99-5.37,3.93-0.49,0.05-0.48-0.27-0.23-0.05l-0.1,0.03z"></path>
<text transform="matrix(1 0 0 1 420.1504 150.6045)">PB</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=ES" class="modal-link <? echo $ES ?>" rel="nofollow"><desc>Espírito Santo</desc>
<path d="M361.55,304.31c-1.75-0.99-4.34-0.57-5.47-2.53-1.13-1.29-2.83-2.77-1.82-4.63,0.43-1.69,1.67-3.42,3.53-3.63,3.02-1.2,4.16-4.5,5.7-7.08,1.02-1.87,1.91-4.15,1.09-6.26-1.96-1.51,0.77-3.35,0.51-4.99-0.48-1.84-0.79-4,0.58-5.54,1.65-2.16,5.17-2.9,7.26-0.95,1.56,1.09,3.58,2,4.25,3.91,0.21,2.07-1.09,3.96-0.79,6.04,0.01,2.78,0.38,6.04-1.77,8.2-1.48,1.59-2.94,3.26-3.62,5.36-1.81,3.65-4.79,6.51-7.19,9.76-0.32,0.98-1.97,2.41-2.26,2.34z"></path>
<text transform="matrix(1 0 0 1 362.4866 293.6045)">ES</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=AM" class="modal-link <? echo $AM ?>" rel="nofollow"><desc>Amazonas</desc>
<path d="M82.117,174.56c-10.063-5.52-21.408-8.21-31.365-13.99-14.352-6.28-30.273-7.18-45.004-12.25-1.4974-5.52,8.4712-8.19,5.0522-14.58,1.649-10.89,12.228-16.8,22.081-18.92,5.671-3.41,14.493,2.25,14.299-7.83,0.88-9.884,1.251-19.842,3.329-29.588-1.143-6.099-14.459-17.442-2.862-19.572,7.662-0.109,4.618-7.469-1.135-6.867-4.941-10.147,9.085-3.519,13.909-7.023,4.683,0.145,7.559-3.023,11.615-3.136,3.04,6.209,6.515,12.622,14.362,13.525,4.239,0.453,5.773-4.732,7.158,0.223,6.168-6.365,14.594-8.624,20.684-15.213,9.36-7.464,12.29,6.9,12.73,13.666,0.09,7.051,0.28,14.896,4.81,20.751,7.35,7.578,6.68-4.197,10.69-6.67,5.81,5.364,12.62,0.89,12.41-6.475,5.89-5.559,17.44-3.401,15.82,6.155,5.1,10.083,17.66,11.755,25.48,18.822-1.76,8.888-7.48,17.492-10.97,26.182-2.85,9.09-11.56,18.3-9.3,27.71,0.63,7.06,1.73,20.55-9.37,18.9-10.31-0.26-20.67,0.93-30.94,0.7-5.61-4.1-12.76-13.12-19.92-5.72-2.48,8.11-10.41,9.47-15.698,13.91-4.633,1.52-17.838,1.13-17.865,7.29z"></path>
<text transform="matrix(1 0 0 1 90.5858 118.5762)">AM</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=RS" class="modal-link <? echo $RS ?>" rel="nofollow"><desc>Rio Grande do Sul</desc>
<path d="M239.13,431.13c0.42-2,0.09-8.69-2.87-5.05-0.92,2.28-3.26,5.16-5.03,1.81-2.43-3.52-4.84-7.34-8.88-9.2-3.71-1.99-7.92-3.65-10.24-7.39-1.96-3.83-6.11,2.42-7.1-2.42-2-3.15-4.69-6.25-8.12-7.82-1.96-1.13-5.52,3.01-5.87,1.28,5.63-7,11.77-13.58,17.04-20.86,3.91-4.42,8.77-7.98,13.89-10.87,3.75-2,8.24-3.28,12.39-1.71,3.23,0.4,6.46,0.9,9.62,1.51,1.79,2.97,5.4,2.27,7.92,4.34,4.42,1.2,3.67,6.56,7.43,8.25,2.14,1.38,6.11,0.37,7.39,1.36,0.54,2.99-6.7,6.81-1.79,7.99,2.22-0.21,2.88,0.57,1.07,2.14-5.28,7.51-6.95,17.64-14.83,23.2-4.84,3.65-10.97,7.13-12.05,13.68,0.03-0.17,0.12-1.07,0.03-0.24zM237.12,434.35c0.46-0.646-0.824-1.149-1.241-1.313-1.239-0.488-1.994-0.571-2.793,0.624-0.656,0.981-1.395,1.894-2.05,2.866-0.7,1.039-0.764,2.417-0.65,3.627,0.035,0.373,0.358,2.818,0.996,2.489,0.662-0.342,1.235-1.083,1.691-1.656,1.646-2.066,2.588-4.578,4.111-6.726-0.043,0.059-0.085,0.118-0.127,0.178,0.1-0.138,0.198-0.277,0.296-0.416-0.05,0.06-0.32,0.45-0.24,0.33z"></path>
<text transform="matrix(1 0 0 1 223.9553 399.2178)">RS</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=AP" class="modal-link <? echo $AP ?>" rel="nofollow"><desc>Amapá</desc>
<path d="M265.04,36.513c-0.991,1.488,2.213,2.791,1.762,0.614-0.14-0.678-0.602-1.452-1.212-1.808-1-0.586-0.54,1.178-0.55,1.194z"></path>
<path d="M247.07,71.198c-3.71-1.168-5.28-5.124-6.56-8.438-2.62-2.852-4.57-6.375-5.28-10.201-2.21-2.934-2.59-7.127-5.61-9.435-3.53-1.912-7.07-4.19-11.13-4.658-3.51-1.499-0.14-5.987,2.38-3.268,3.53,1.307,7.04-1.679,10.57-0.373,3.06,0.62,6.92,0.683,8.93-2.155,3.2-3.898,4.17-9.091,7.32-13.028,1.33-2.258,3.13-5.751,6.1-4.692,0.63-0.815-0.29-3.736,0.9-1.549,1.23,3.178,3.83,5.853,3.27,9.51,0.67,3.011,1.48,5.974,2.68,8.806,0.75,2.786,0.07,6.126,3.73,6.963,2.36,1.234,5.15,2.185,6.72,4.443,1.03,2.373-2.22,2.376-2.07,4.723-1.33,2.965-4.95,3.986-5.87,7.226-1.36,3.085-5.1,3.67-7.09,6.272-2.3,2.247-4.22,4.926-5.37,7.939-0.89,1.071-2.25,1.743-3.62,1.915z"></path>
<text transform="matrix(1 0 0 1 240.7642 49.019)">AP</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=MT" class="modal-link <? echo $MT ?>" rel="nofollow"><desc>Mato Grosso</desc>
<path d="M232.94,262.84c-3.04,0.37-8.72,0.18-4.65-3.87,3.17-3.97-2.26-5.96-4.08-1.73-3.29,2.33-7.69-1.06-11.37,1.65-5.07-2.25-9.87-7.57-15.78-3.39-4.24,0.9-8.16,10.9-12.2,3.52-1.86-4.76-0.97,0.34-1.85-0.45-5.54-2.32-6.71-8.18-4.61-13.25-4.88-2.44-11.69-0.18-17.33-1.32-4.96-1.27-1.65-8.86-6.16-11.46,4.94-3.93-0.67-10.83-1.2-15.78-4.01-2.12,3.44-3.92,3.49-7.44,6.61-4.99,1.46-12.13,1.54-18.09,4.36-7.74-8.2-7.08-12.79-6.61-6.19,1.14-2.47-7.03-4.47-10.44,0.52-4.26-0.64-10.72,0.77-13.61,10.48-0.98,21.15,0.67,31.53-1.31,5.07-3.14,1.72-9.96,4.69-14.32,4.18,2.1,2.97,12.35,7.44,16.35,5.17,4.68,11.83,7.79,18.92,7.55,13.59,0.69,27.21,0.56,40.79,1.69,6.68,0.4,13.35,0.8,20.03,1.21-3.14,7.24-6.61,15.17-4.42,23.2-0.96,4.03,0.82,8.54,1.63,11.58-3.15,5.71-5.24,12.32-5.81,18.92-1.07,5.24-9.32,4.39-8.6,11.01-3.24,3.96-9.51,5.14-10.18,11.35-4.9,3.26-6.44,9.58-4.49,14.97l-1.02,0.04c0.83,0.12-1.51-0.22,0.18,0.03z"></path>
<text transform="matrix(1 0 0 1 195.5037 212.6318)">MT</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=RO" class="modal-link <? echo $RO ?>" rel="nofollow"><desc>Rondônia</desc>
<path d="M150.6,214.5c-3.63-1.99-7.87-1.22-11.71-1.12-2.41-2.62-4.52-5.61-8.59-5.14-4.07-0.82-6.25-4.72-10.69-4.39-3.9-0.89-8.52,0.1-11.16-3.7-3.39-1.7-6.48-4.01-8.02-7.71-1.018-3.66-1.013-7.95-1.346-11.91,0.798-3.22,1.146-10.91-4.202-7.68-3.665,0.66-7.648,1.95-11.159,2.05,1.571-2.65,5.272-6.38,8.6-4.24,3.511,1.38,6.153-3.14,9.797-2.03,2.34-2.77,4.74-5.25,8.65-5.48,4.45-0.89,2.65-6.3,5.91-8.36,2.95-2.94,7.89-3.27,11.05-0.46,2.82,2.26,4.3,6.91,8.42,7.09,2.55-1.74,5.04,0.35,3.89,3.21,0.09,4.83-0.3,9.68,0.28,14.49-0.53,3.78,1.49,8.16,5.9,7.1,3.87-0.03,8.07-0.93,11.63,1.09-0.26,3.88-2,7.92,1.15,11.22,1.61,4.58-2.12,8.24-4.48,11.68-1.18,1.53-2.34,3.14-3.92,4.29z"></path>
<text transform="matrix(1 0 0 1 114.6929 187.4175)">RO</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=PE" class="modal-link <? echo $PE ?>" rel="nofollow"><desc>Pernambuco</desc>
<path d="M415.11,170.71c-2.76,0.25-3.86-2.53-5.78-3.8-1.98-0.78-4.1-3.45-5.76-0.7-1.69,2.38-4.6,1.92-5.39-0.9-1.12-0.15-3.51-1.45-5.22-2.58-2.12-0.76-4.07-3.08-6.5-2.2-2.24,0.73-4.31,2-5.35,4.2-2.2,0.75-4.31,1.82-4.88,4.44-1.62,2.77-3.04,0-3.03-1.86-1.71-1.48-1.68-4.11-3.59-5.48-1.17-0.75-2.34-1.17-0.47-2.09,2.59-1.89,6.62-3.32,6.91-7.03,0.61-1.82-2.01-4.16-0.58-5.41,3.23,0,6.52,0.24,9.64,1.1,2.63,0.56,4,3.11,6.27,4.24,2.05,1.25,4.22-2.53,5.2,0.13,2.37,1.44,5.39,0.82,7.89,0.06,2.07-1.08,3.99-2.46,5.97-3.67,1.46,0.12,2.62,0.77,1.02,1.76-0.95,2.85-0.62,5.88,1.72,7.99,2.63,2.32,5-1.05,7.04-2.45,2.68-3.06,7.25-0.32,10.24-2.75,1.59-2.46,6.6-2.93,7.14,0.37-0.78,4.19-1.64,8.44-3.4,12.35-2.56,0.75-5.68-1.17-8.49,0.2-3.87,0.7-6.82,4.09-10.88,4.08h0.28z"></path>
<text transform="matrix(1 0 0 1 394.1528 163.8604)">PE</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=TO" class="modal-link <? echo $TO ?>" rel="nofollow"><desc>Tocantins</desc>
<path d="M283.32,209.78c0.88-3.86-5.16-8.96-6.52-3.38-1.63,4.08-8.55,1.41-9.55-1.67,1.15-1.93,0.88-6.8-2.02-3.82-0.66,1.38-2.4,4.34-2.42,0.9,0.18-8.27-1.32-16.98,2.26-24.78,1.75-4.28,4.31-8.22,5.72-12.64,2.16-3.33,6.39-5.02,7.39-9.2,2.29-3.55,0.68-6.98,0.22-10.53,0.44-3.76,1.6-7.68,5.79-8.66,3.76-2.54,5.98-6.97,6.47-11.45,2.16-2.81-6.36-4.48-1.36-4.84,4.45,0.33,9.31,3.42,8.95,8.41-0.23,3.83,0.45,8.42-2.1,11.6-2.45,2.29,0.6,3.84,1.09,6,3.16,2,4.36,7.38,9.01,5.26,4.56-0.02,0.98,5.63-1.78,6.04-3.23,2.7-1.71,7.9,0.79,10.7,1.62,3.03,1.81,7.26,5.5,8.84,2.63,0.32,4.4,2.7,1.2,3.92-2.3,2.53-6.11,6.52-4.17,10.04,4.16,1.21,3.04,5.07,1.21,7.89-1.52,2.54,3.64,6.43-1.22,7.27-4.04,0.41-7.25,3.59-11.44,3.17-2.74,0.07-4.96,1.02-7.57-0.98-2.03-0.7-4.07,1.96-5.45,1.91z"></path>
<text transform="matrix(1 0 0 1 281.3325 182.9316)">TO</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=GO" class="modal-link <? echo $GO ?>" rel="nofollow"><desc>Goiás</desc>
<path d="M257.7,279.32c-3.4-3.14-8.44-3.45-11.97-6.45-3.36-1.38-8.46-0.71-8.29-5.58-2.32-4.06-4.27-9.08-2.21-13.66,2.77-3.32,5.56-6.49,7.02-10.72,3.59-2.44,8.35-4.48,8.77-9.64,2.08-3.24,8.18-3.69,7.86-8.86,0.54-4.88,1.68-9.6,3.98-13.96,1.05-1.62,2.64-9.12,3.41-4.21,2.37,2.96,9.21,6.29,11.32,1.47,2.17-4.69,3.71,0.25,4.4,2.67,2.76,3.05,5.59-3.03,8.76-0.03,1.82,1.7,4.13,0.5,5.05,0.02,4.32,1.99,7.92-2.43,11.88-3.41,5.54-1.41,2.37,5.24,1.64,7.93-1.57,4.89,4.73,8.55,2.83,13.37-1.76,2.91-5.71-4.63-6.34,0.49-0.59,2.81-6.29,2.29-4.15,6.35,0.97,2.18-1.23,7.87-3.32,4.76,0.79-5.14-6.06-5.84-9.64-5.06-3.63,2.19-2.36,10.13,2.83,8.25,2.61-1.04,6.05,0.22,3.87,3.37,0.75,3.25,4.8,7.4-0.26,9.34-1.31,3.46,3.92,8.02-0.95,10.83-4.13,3.71-9.11-0.67-13.67,0.93-4.85,2.12-10.29,1.53-15.16,3.39-3.2,2.18-4.02,6.55-7.76,8.36l0.1,0.05z"></path>
<text transform="matrix(1 0 0 1 261.4963 247.9316)">GO</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=PI" class="modal-link <? echo $PI ?>" rel="nofollow"><desc>Piauí</desc>
<path d="M324.57,183.3c-3.85-0.95-6.48-6.2-8.92-7.69,2.66-4.49,0.06-9-0.07-13.43,1.33-4.28,3.87-8.07,5.24-12.35,1.76-3.41,5.85-4.34,9.33-4.87,4.06-1.04,5.37-6.6,9.86-6.84,3.78,0.61,10.73,1.78,11.01-3.79-1.08-3.55-4.46-7.27-0.91-10.72,2.39-3.82,0.15-8.05,0.44-12.11,0.73-3.75,2.27-8.13,5.92-9.93,4.09-0.56,5.24-6.179,9.54-5.853,4.12,0.778-1.35,5.583,0.93,8.493,2.03,3.09,3.4,6.98,1.74,10.5-0.18,3.67,0.89,7.16,2.58,10.35,1.14,4.07-0.68,8.76,1.91,12.44,4.25,1.68,1.73,6.19,0.15,8.8-0.56,3.6,3.04,8.33-1.93,10.18-4.08,1.67-6.45,5.42-9.72,8.13-3.47,1.61-7.08,2.88-10.59,4.48-3.65-0.33-7.23-3.84-11.09-1.6-3.64,2.97,0.22,9.95-4.99,11.96-3.53,1.13-6.83,3.09-10.43,3.85z"></path>
<text transform="matrix(1 0 0 1 345.4849 152.3604)">PI</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=DF" class="modal-link <? echo $DF ?>" rel="nofollow"><desc>Distrito Federal</desc>
<path d="M296.13,241.53c-2.344-0.751-4.85-0.152-7.249-0.152-0.615-0.012-0.624-0.147-0.631-0.774-0.008-0.693,0.042-1.391,0.124-2.079,0.067-0.56,0.162-1.12,0.307-1.665,0.188-0.709,0.975-0.484,1.613-0.525,1.745-0.113,5.907-0.669,6.38,1.797,0.134,0.696,0.194,1.432,0.13,2.139-0.028,0.308-0.08,0.636-0.234,0.91-0.046,0.08-0.71,0.59-0.684,0.252,0-0.05,0.35,0.06,0.24,0.09z"></path>
<text transform="matrix(1 0 0 1 285.8225 235.6045)">DF</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=AC" class="modal-link <? echo $AC ?>" rel="nofollow"><desc>Acre</desc>
<path d="M44.102,189.88c-3.397,0.08-3.758-4.07-3.368-6.6,0.278-3.4,1.422-6.85,0.723-10.26-2.42-1.59-4.974,2.88-7.161,4.11-2.437,2.54-6.282,3.09-9.615,2.59-2.692-1.41-2.15-6.85-6.574-5.73-2.352-0.23-7.169,0.52-4.669-3.01,1.574-3.1-1.769-4.88-3.8392-6.37-2.5246-3.2-4.0779-7.08-6.6564-10.27-1.6615-1.77,1.9082-4.07,2.2127-4.54,4.1228,2.56,9.1409,2.88,13.744,4.09,9.446,1.91,19.279,2.7,28.082,6.94,7.555,3.55,15.071,7.21,22.97,9.95,4.175,1.58,8.464,3.04,12.212,5.53-4.02,3.16-7.431,7.76-12.766,8.66-3.309,1.22-5.423,6.41-9.587,4.36-3.317-0.73-6.769-0.84-10.155-0.77-2.019,0.48-6.497,1.65-5.553,1.32z"></path>
<text transform="matrix(1 0 0 1 45.2136 179.5728)">AC</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=RR" class="modal-link <? echo $RR ?>" rel="nofollow"><desc>Roraima</desc>
<path d="M136.97,75.112c-2.31-1.873-8.12-4.094-6.08-7.464-0.08-3.905-3.31-7.247-2.5-11.385,0.37-3.961,0.55-8.166-1.72-11.65-1.22-3.225-0.41-7.639-5-8.375-2.75-2.523-6.29-2.828-9.57-4.083-2.11-3.488-3.27-7.538-3.55-11.651-0.99-1.753-5.92-3.838-4.54-5.324,3.6-0.677,5.75,3.069,8.96,2.76,3.44-0.676,6.42,0.356,8.69,2.822,2.89,1.427,4.42-1.646,4.18-3.91,2.99-2.248,7.34-0.393,10.5-2.609,3.16-2.541,6.98-3.788,10.48-5.7138,3.8-1.2025,1.4-8.1349,6.41-6.4724,4.32,0.7707,0.95,4.3872,1.59,6.7951,2.03,2.0921,6.16,2.6691,5.1,6.7241-0.81,5.475-5.33,10.48-3.73,16.263,1.91,2.863,2.16,6.462,4.04,9.299,1.8,3.32,8.32,3.069,7.48,7.734-0.36,2.647,2.09,8.183-2.56,7.07-4.11,0.574-9.08,0.557-11.83,4.217-2.78,2.15-0.34,9.753-5.65,7.294-3.17-3.117-9.46-2.216-9.53,2.919-0.36,1.397-0.11,3.837-1.17,4.74z"></path>
<text transform="matrix(1 0 0 1 132.6228 38.9331)">RR</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=CE" class="modal-link <? echo $CE ?>" rel="nofollow"><desc>Ceará</desc>
<path d="M392.43,151.38c-2.54-0.98-3.99-3.69-6.73-4.35-3.31-1.29-6.94-1.34-10.45-1.21,1.35-2.17,3.66-6.01,0.57-7.77-2.95-2.06-2.64-6.05-2.36-9.19,0.07-3.51-1.59-6.7-2.67-9.93-0.78-2.78,0.27-5.56,0.32-8.33-0.02-3.14-2.55-5.45-3.09-8.41-0.19-3.395,2.56-6.791,6.06-6.86,5.07-0.302,9.73,2.202,14.15,4.358,5.06,2.532,9.67,5.942,13.38,10.232,2.43,2.59,4.51,5.59,7.41,7.69,1.34,0.33,3.64,1.65,0.88,1.93-3.95,1.5-5.28,5.86-6.93,9.33-0.61,3.31-4.72,2.74-5.69,5.64-0.83,2.9-1.6,5.91-1.64,8.94,0.84,2.71,1.42,6.4-2.04,7.57-0.95,0.29-1.15,0.36-1.17,0.36z"></path>
<!-- <circle cy="120.22" cx="386.54" r="10"></circle> -->
<text transform="matrix(1 0 0 1 379.8325 124.4316)">CE</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=MG" class="modal-link <? echo $MG ?>" rel="nofollow"><desc>Minas Gerais</desc>
<path d="M306.78,319.9c-5.96-3.49-1.83-12.06-3.61-16.05-6.47-1.23-4.36-8.04-5.59-12.42-1.06-6.76-8.53-5.44-13.25-3.9-4.06,2.04-8.11,2.17-10.38-2.27-5.26-0.01-11.29-2.83-16.11,0.62-0.63-6.01,5.92-11.31,10.22-13.77,7.35-1.86,14.79-4.21,22.26-2.41,6.94,0.11,9.37-7.62,6.15-12.83,6.55-3.12-2.09-10.13,2.21-14.15,7.48-0.45,2.08-10.27,7.76-12.39,2.98-3.69,6.19,6.29,10.55,1.75,5.41-2.74,10.13-9.75,16.91-7.72,2.28,2.68,3.35,6.47,8.03,5.12,6.28-0.3,10.45,5.45,16.51,6.88,3.12,2.89,4.7,6.65,9.76,5.99,4.63-0.31,11.87,4.48,5.81,8.45-3.33,3.56-7.5,7.42-3.73,12.74,3.08,4.22-10.49,2.82-6.91,9.57,0.21,3-2.3,5.67-0.27,8.53,0.44,6.22-5.51,10.19-9.45,12.61-2.76,5.77-5.63,12.62-10.9,16.3-5.8,2.3-12.3,0.86-18.15,3.15-4.28,1.21-8.46,2.75-12.81,3.73-0.58,1.85-3.28,2.87-5.01,2.47z"></path>
<text transform="matrix(1 0 0 1 318.998 276.5078)">MG</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=MA" class="modal-link <? echo $MA ?>" rel="nofollow"><desc>Maranhão</desc>
<path d="M313.72,176.19c-5.94-1.03-5.01-8.64-8.68-12.17-2.51-4.57,2.31-7.29,4.72-9.71,1.4-4.46-4.22-5.77-7.07-5.2-2.35-2.67-8.29-6.92-4.19-10.1,2.09-4.61,1.79-10.09,0.46-14.87-2.08-4.55-6.8-6.99-11.74-5.89,2-2.48,5.68-3.07,8.19-5.09,4-2.3,6.1-6.47,8.17-10.38,3.9-6.176,7.54-12.582,9.9-19.508,1.34-2.671,0.1-11.522,5.02-7.288,2.48,0.982,3.45,3.437,4.69,4.817,2.17-0.775,4.7-3.979,5.35-0.24,3.49,1.286,3.45,5.244,0.15,6.575,0.83,1.411,4.35,1.837,1.67,4.041-1.67,2.219-2.91,10.253,1.64,5.853,2.29-1.23,3.7-9.072,2.91-3.602,3.73-0.521,7.1-2.33,10.94-3.282,4.97-2.077,7.68,4.608,12.43,4.412,2.34-1.23,5.24,0.35,2.32,2.404-3.37,2.963-8.42,3.928-9.83,8.848-4.44,4.65,0.51,10.88-1.69,16.1-5.74,4.17,2.97,11-1.48,14.96-4.89,0.54-11.02-1.78-13.83,3.9-4.05,4.29-11.94,2.97-14.45,8.87-0.82,5.34-6.18,9.24-5.02,14.84,1.03,3.91,1.71,8.07-0.58,11.71z"></path>
<text transform="matrix(1 0 0 1 312.1677 122.1318)">MA</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=SE" class="modal-link <? echo $SE ?>" rel="nofollow"><desc>Sergipe</desc>
<path d="M406.35,195.46c-1.33-0.35-3.01-0.56-3.66-1.96-0.62-1.38-1.17-2.8-2.03-4.05-0.52-1.08,0.55-2.43,1.72-2.19,1.36-0.03,2.55-1.15,2.7-2.5,0.39-2.07-0.14-4.17-0.5-6.2-0.27-1.25-0.62-2.48-1-3.71,2.72,1.49,6.08,1.86,8.34,4.15,1.17,1.33,2.2,2.84,3.75,3.76,0.89,0.75,1.65,1.64,2.47,2.45-2.05,1-4.05,2.16-5.86,3.55-1.4,1.36-2.1,3.23-3.21,4.79-0.64-0.83-1.78-0.14-2.1,0.65-0.18,0.46-0.27,1.19-0.62,1.26z"></path>
<text transform="matrix(1 0 0 1 405.7634 193.1431)">SE</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=RJ" class="modal-link <? echo $RJ ?>" rel="nofollow"><desc>Rio de Janeiro</desc>
<path d="M322.16,326.84c-1.57-1.28-0.75-3.94,1.23-4.18-1.19,1.15-1.09,2.7-1.23,4.18zm26.99-2.98c-4.23-1.15-8.63,0.1-12.91-0.55-1.61-0.11-3.2,0.29-4.77-0.22-1.79-0.29-3.62,0.35-5.38-0.23-0.7-0.52-3.33-0.39-1.25-0.8,1.79,0.01,4.12-2.09,2.55-3.76-1.52-0.63-4.17-0.47-4.63-2.35,4.57-1.85,9.57-2.57,14.5-2.49,1.76,0.19,3.14-0.52,4.66-1.24,2.04-0.58,4.33-1.12,5.61-2.98,1.01-1.25,1.32-2.86,2.14-4.22,0.84-1.48,0.91-4.24,3.05-4.36,1.63,0.45,1,3.06,2.97,3.43,1.58,0.81,3.39,0.94,5.03,1.57,1.61,1.36-0.83,3.54-0.31,5.35,0.28,2.21-0.96,4.42-3.35,4.53-2.58,0.49-5.25,1.53-6.98,3.59-0.57,1.35-0.44,4.64-1.08,4.64-0.81-0.02-1.29-0.59,0.15,0.09zM326.7,324.85c-0.807,0.058-1.97,1.337-0.565,1.276,1.123-0.049,2.183-0.872,0.524-1.287,0.204,0.051-0.139,0.052-0.188,0.04,0.06,0.01,0.28-0.02,0.23-0.03z"></path>
<text transform="matrix(1 0 0 1 337.4886 321.1045)">RJ</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=MS" class="modal-link <? echo $MS ?>" rel="nofollow"><desc>Mato Grosso do Sul</desc>
<path d="M222.18,332.09c-2.32-5.11-7.7,0.3-11-1.25-2.76-2.99-1.48-7.52-2.1-11.2,0.39-5.33-4.81-6.46-8.18-8.9-2.95-2.12-5.13,2.38-8.52,0.65-2.87-1.17-9.3,1.2-8.44-3.82-0.4-3.87,1.99-7.64,0.76-11.44-2.25-2.18-4.76-8.26,0.36-8.53-0.89-2.39-3.33-5.13-1.52-8.25,1.35-5.11,4.59-10.46,2.36-15.8,1.41-1.26,5.54,1.08,6.52-2.42,2.79-3.06,6.72-5.61,10.92-5.68,3.98,1.12,6.68,6,11.24,4.93,3.51-2.81,8.81,1.3,11.69-2.59,2.95-1.98-2.32,3.49-0.79,4.92,2.53,3.42,9.67-0.8,10.02,5.15,0.45,3.85,3.57,5.51,7.13,5.73,4.11,0.9,7.22,3.98,11.27,5.03,4.45,1.23,1.35,5.83,2.42,9.13-1.61,3.16-6.73,3.49-7.32,7.91-1.16,4.04-3.02,7.7-5.2,11.31-1.39,3.83-5.3,5.68-8.1,8.21-3.78,2.31-7.68,4.53-9.15,9.02-2.47,1.99-2.22,6.22-4.29,7.78l-0.34-0.05,0.26,0.16z"></path>
<text transform="matrix(1 0 0 1 205.8137 291.0762)">MS</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=PA" class="modal-link <? echo $PA ?>" rel="nofollow"><desc>Pará</desc>
<path d="M268.79,55.18c0.491-0.312,1.533-1.339,0.906-1.959-0.581-0.575-1.577,0.203-1.925,0.661-0.188,0.249-1.113,1.831-0.306,1.848,0.277,0.006,0.56-0.134,0.801-0.255,0.169-0.085,1.074-0.639,0.379-0.203,0.074-0.047,0.149-0.095,0.224-0.142-0.081,0.052-0.162,0.103-0.242,0.154,0.05-0.034,0.1-0.069,0.16-0.104z"></path>
<path d="M269.04,57.014c-0.74,0.619-1.62,1.081-2.25,1.829,0.15,0.425,0.69,0.407,1.05,0.563,0.56,0.134,1.1,0.345,1.59,0.651,0.55,0.295,1.23,0.477,1.81,0.167,0.97-0.425,1.78-1.154,2.5-1.918,0.28-0.335,0.57-0.738,0.54-1.191-0.12-0.53-0.74-0.616-1.18-0.717-1.22-0.214-2.55-0.199-3.67,0.372-0.64,0.363-1.15,0.911-1.73,1.355-0.14,0.116-0.33,0.271-0.09,0.072,0.48-0.394,0.95-0.788,1.43-1.183z"></path>
<path d="M273.12,60.264c-1.388,1.108,1.87,1.345,2.45,1.326,0.788-0.026,1.479-0.646,0.838-1.397-0.898-1.053-2.415-0.591-3.355,0.123,0.042-0.033,0.085-0.067,0.127-0.101-0.244,0.2-0.494,0.392-0.739,0.59,0.2-0.163,0.54-0.435,0.67-0.541z"></path>
<path d="M256.2,65.93c-1.12,0.019-2.04,0.819-2.72,1.643-1.29,1.594-2.18,3.45-3.16,5.24-0.44,0.861-0.85,1.738-1.26,2.618-0.18,0.177-0.4,0.573,0.05,0.465,1.58,0.095,3.04-0.82,4.06-1.953,1.6-1.716,2.59-3.901,3.29-6.119,0.14-0.525,0.27-1.102,0.12-1.635-0.27-0.375-0.76-0.232-1.14-0.258h-0.64c0.34-0.001,1.14-0.001,1.23-0.001h-1.19,1.36z"></path>
<path d="M257.7,70.514c0.939-0.235,1.56-1.376,1.995-2.156,0.137-0.245,0.99-1.812,0.234-1.736-0.945,0.095-1.518,1.413-1.884,2.15-0.093,0.187-0.882,1.876-0.304,1.732-0.242,0.061,0.356-0.089,0.442-0.11-0.15,0.036-0.39,0.097-0.49,0.12z"></path>
<path d="M262.62,61.847c0.751-0.418,1.555-1.138,0.158-1.225-0.993-0.063-2.271-0.027-3.225,0.314-0.973,0.348-0.064,1.321,0.571,1.447,0.868,0.172,1.86-0.182,2.612-0.6-0.077,0.043-0.155,0.086-0.232,0.129,0.525-0.292,1.05-0.584,1.576-0.875-0.46,0.251-1.13,0.619-1.47,0.81z"></path>
<path d="M266.62,55.93c0.03-0.792-0.467-3.38-1.257-1.48-0.215,0.517-0.796,2.262-0.427,2.809,0.485,0.718,1.926-0.685,1.645-1.431,0.025,0.068,0.051,0.136,0.077,0.204-0.043-0.116-0.068-0.265-0.01-0.382,0.01-0.026,0.07,0.535-0.03,0.28z"></path>
<path d="M264.87,59.93c1.284-0.32-0.343-1.962-1.168-1.869-1.289,0.145,0.369,2.068,1.27,1.844-0.068,0.017-0.136,0.034-0.204,0.051,0.19-0.048,0.38-0.094,0.57-0.142-0.1,0.024-0.56,0.139-0.47,0.116z"></path>
<path d="M212.98,167.17c-9.4,0.56-20.61-0.23-26.96-8.1-2.12-7.8-6.14-14.65-9.13-21.91,0.19-8.35,6.18-15.18,8.76-22.94,4.3-9.32,8.75-18.569,12.35-28.18-3.29-5.947-11.5-7.583-16.95-11.472-9.15-3.651-10.76-13.596-11.87-22.162-0.97-7.897,9.24-9.442,14.89-11.804,5.39-5.771,15.5,1.913,19.2-3.904-3.38-5.897,14.74-7.865,12.19-0.742,1.99,8.332,15.03,4.73,16.67,13.555,2.09,6.628,5.95,12.321,9.02,18.468,0.41,4.736,12.03,5.155,3.03,7.477-7.23,2.303-17.22,2.188-21.37,9.676-4.41,3.342-5.68-7.978-10.98-3.434-2.46,0.158-8.88-1.893-3.98,1.712-6.37-0.12,2.01,4.367,3.49,3.091,2.01,4.351-4.74,12.879-1.23,14.049,2.79-5.02,2.28-15.586,11-12.352,5.94-3.91,11.63-7.503,18.49-9.678,7-2.408,2.54,7.079,6.15,10.301,0.53,3.899,6.36,11.559,3.41,3.453-2.26-6.286-6.45-15.457,3.63-16.426,8.33-1.139,9.72-9.882,14.2-14.11,6.07,4.828,16.45-2.374,20.61,3.115-0.98,7.743-6.81,14.258-14.92,14.188-6.39,1.398-12.94-0.332-18.57,0.234-4.7,2.097,1.79,11.108,0.43,4.088,2.16-7.09,5.46,9.987,6.18,1.683,0.33-4.423,7-3.429,10.37-2.697-0.19,5.109,7.55-5.567,5.8,1.143-2.97,2.775-0.95,10.692,0.64,3.46,1.62-6.498,8.81-7.731,13.13-9.87-3.77-7.4,6.95-9.6,12.18-7.597,5.99,1.959,13.72,4.784,9.32,12.485-3.21,9.756-8.64,18.65-14.31,27.1-3.42,3.79-16.59,6.75-13.06,12.52,9.45,1.67,0.59,12.2-4.17,14.64-7.29,5.94,0.32,17.37-7.2,23.14-5.56,2.56-4.57,14.49-13.09,10.64-15.87-0.95-31.74-1.9-47.6-2.86l0.25,0.02z"></path>
<text transform="matrix(1 0 0 1 227.5388 121.8604)">PA</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=AL" class="modal-link <? echo $AL ?>" rel="nofollow"><desc>Alagoas</desc>
<path d="M419.79,184.39c-1.56-0.63-1.89-2.7-3.52-3.26-1.56-1.41-2.77-3.23-4.62-4.29-2.68-1.85-5.74-3.02-8.73-4.22-0.64-0.89-2.39-2.25-1.13-3.3,1.66-0.32,2.66-2.18,4.09-2.57,1.5,0.58,2.69,1.73,3.91,2.75,1.03,1.12,2.05,2.56,3.71,2.66,3.46,0.5,6.65-1.3,9.72-2.64,2.49-1.16,5.28-2.36,8.08-1.58,0.89,0.31,2.89,0.05,1.64,1.34-1.22,2.14-2.6,4.27-4.56,5.82-1.48,0.37-3.2,0.93-3.83,2.47-1.55,2.22-2.67,4.78-4.63,6.7-0.62,0.15-0.06-0.33,0-0.02l-0.13,0.14z"></path>
<text transform="matrix(1 0 0 1 416.5994 178.6431)">AL</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=SP" class="modal-link <? echo $SP ?>" rel="nofollow"><desc>São Paulo</desc>
<path d="M286.14,346.34c-0.97-2.61-4.65-3.33-5.17-5.98-3.77-0.62-7.52-2.38-7.4-6.68-2.02-3.39-1.46-7.45-2.81-10.96-1.94-3.99-6.62-2.67-10.1-3.39-3.75-1.23-7.1-3.63-11.22-3.69-3.79-1.09-7.97,1.37-11.52-0.58,4.6-2.09,6.85-6.97,9.77-10.8,2.22-3.8,2.06-8.98,5.48-12.02,3.07-0.49,4.43-3.03,5.86-5.08,4.12-2.51,8.94-0.61,13.36-0.38,3.51,0.29,2.62,6.03,6.87,4.2,3.51-2.32,7.69-1.28,11.38-2.97,4.61-1.87,5.55,4.1,5.88,7.33-0.27,3.88,0.42,8.79,5.16,9.53,2.13,2.62-1.84,7.59,0.6,10.93,0.65,4.11,4.94,7.38,8.88,4.96,2.91-2.25,7.13-5.09,10.71-2.99,0.98,1.49,5.38,1.89,1.85,2.69-2.47,0.91-5,3.71-3.25,6.38-4.65,0.43-6.68,6.95-11.99,5.07-6.54,1.6-11.67,6.27-17.44,9.5-1.83,1.31-5.17,2.65-4.92,4.84l0.02,0.09zM315.7,331.6c-0.25-0.14-0.58-0.18-0.84-0.02-0.33,0.19-0.5,0.57-0.58,0.94-0.07,0.35-0.08,0.74,0.07,1.07,0.08,0.17,0.27,0.28,0.45,0.26,0.31-0.04,0.57-0.23,0.78-0.44,0.27-0.28,0.5-0.64,0.54-1.04,0.03-0.26-0.08-0.53-0.29-0.69-0.04-0.03-0.16-0.1-0.16-0.1,0.05,0.03,0.12,0.06,0.03,0.01-0.14-0.07-0.29-0.14-0.43-0.21,0.15,0.07,0.29,0.15,0.43,0.22-0.22-0.12-0.45-0.23-0.68-0.35,0.23,0.12,0.46,0.23,0.68,0.35z"></path>
<!-- <circle cy="311.04" cx="275.34" r="10"></circle> -->
<text transform="matrix(1 0 0 1 269.3408 314.0493)">SP</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=BA" class="modal-link <? echo $BA ?>" rel="nofollow"><desc>Bahia</desc>
<path d="M377.95,270.74c-3.76-2.99-7.9-7.86-6.9-12.93,2.54-4.19,11.37-10.88,4.13-14.68-3.4-3.39-8.54-1.88-12-3.12-1.96-7.2-10.11-6.07-14.82-10.09-3.27-5.05-11.97,1.77-11.95-5.64-4.66-5.09-11.42,0.48-15.84,3.18-2.06,0.58-8.33,7.67-7.59,2.26,4.36-5.46-4.87-10.66-1.65-16.27,2.24-4.52,0.29-9.47-1.11-13.83,0.61-2.71,3.03-2.94,2.13-6.07,2.42-3.87-7.01-2.74-2.85-7.2,1.94-3.75,8.05-11.81,10.36-4.01,4.41,5.98,11.34-0.82,16.56-1.93,6.01-1.92-0.06-13.5,7.35-11.7,6.33,4,12.94,0.03,18.63-2.85,2.3-2.94,6.18-5.76,7.79-0.47,1.04,3.3,2.83,9.33,7,5.05,2.03-3.82,6.55-5.87,9.94-8.22,4.51,1.72,10.49,3.21,12.22,8.3,2.77,4.04,5.3,9.96,3.75,14.96-6.95-0.14-3.73,9.14,0.65,10.74,6.03,0.61-1.85,6.58-2.79,9.82-0.77,2.96-7.07,9.7-6.46,2.95-1.38-2.2-3.45,0.21-4.85,0.32,3.82,3.94-3.05,7.05-1.78,11.62-0.66,3.95-0.32,10.74-0.52,15.77,0.48,6.06-0.27,12.13-2.47,17.81-1.84,4.58,0.68,11.07-4.27,14.11-1.42,1.58-3.38,2.06-2.66,2.12z"></path>
<text transform="matrix(1 0 0 1 349.4963 204.4316)">BA</text>
</a>
<a xlink:href="pesquisa.php?action=BUSCASIGLA&sigla=PR" class="modal-link <? echo $PR ?>" rel="nofollow"><desc>Paraná</desc>
<path d="M251.42,361.11c-4.84-1.53-9.84-2.41-14.82-3.27-2.47-0.53-4.93-1.17-7.45-1.43-2.52-1.62-1.32-6.47-4.85-6.89-2.21,1.11-6.54-0.68-3.65-3.24,2.13-3.55,1.62-7.83,1.83-11.75,1.33-1.73,3.43-2.96,3.02-5.52,1.34-3.15,3.41-6.07,5.33-8.85,2.78-2.32,6.38-4.14,10.05-3.12,4.92,0.54,10.14-0.37,14.76,1.87,1.92,1.14,4.01,2.06,6.3,1.96,2.71,0.06,6.31,0.02,7.63,2.91,1.26,2.87,0.42,6.26,2.08,9.02,1.47,2.33,0.4,6.02,3.03,7.48,2.54,0.58,6.07,0.37,6.52,3.7,1.05,0.79,4.57,2.45,2.88,3.29-1.8-0.54-3.24,1.93-5.12,2.13-0.61,1.89,4.3,1.9,1.4,3.81-3.05,1.45-6.62,1.67-9.65,3.13-3.26-0.43-6.35-2.66-9.75-1.72-2.66,0.99-5.18,2.3-7.8,3.35-1.01,0.85-0.5,2.42-1.74,3.14z"></path>
<text transform="matrix(1 0 0 1 239.644 342.0654)">PR</text>
</a>
</svg>
</div>
</div>
<script type="text/javascript">var isIe8 = false;</script>

<script type="text/javascript">//<![CDATA[

if(isIe8){
    

}else {
    jQuery(document).ready(function() {
        jQuery('#the-map').html(jQuery('#map-svg').html());
        var linkMod = '' + '';
        jQuery('#the-map a').each(function() {
            var obj = jQuery(this);
            var newHref = '';
            if (typeof obj.attr('href') !== 'undefined') {
                newHref = obj.attr('href') + linkMod;
                obj.attr('href', '');
            } else {
                newHref = obj.attr('xlink:href') + linkMod;
            }
            obj.attr('xlink:href', newHref);
        }).hover(function(e) {
            var tipTxt = jQuery(this).children('desc').text();
            jQuery('#region-title div').attr('style', 'padding: 3px 10px').html(tipTxt);
            var tooltipObj = jQuery('<div id="map-tooltip" />');
            tooltipObj.css({
                'top': e.pageY + 22,
                'left': e.pageX + -2
            }).html(tipTxt);
            jQuery('body').append(tooltipObj);
        }, function() {
            jQuery('#region-title div').attr('style', 'padding: 0').html('');
            jQuery('#map-tooltip').remove();
        }).mousemove(function(e) {
            jQuery('#map-tooltip').css({
                'top': e.pageY + 22,
                'left': e.pageX + -2
            });
        });
        jQuery('#the-map a *').each(function() {
            jQuery(this).click(function() {
                var link = jQuery(this).parent('a').attr('xlink:href');
                window.location.href = link;
            });
        });
    });
}

//]]></script>


<div class="mapa_pesquisa">
    
    <img style="z-index:100; float:right; display:block; position:absolute; margin:0 0 0 14px;" src="css/img/sombra-mapa.png" title="" alt="sombra" />
    <div id="the-map" style="z-index:9999; position:relative;"></div>
        
</div>


