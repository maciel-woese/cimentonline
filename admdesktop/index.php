<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");

	$versao = '1.0.1';
	$build  = '(v1 Beta)';
	$sistema = "Admin CimentOnline";
	
	if(!isset($_SESSION['SESSION_USUARIO'])){
		header("Location: login.php");
	}
	else{
		$model = json_encode(unserialize($_SESSION['MODEL_PERMISSOES']));
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo "$sistema $versao $build"; ?></title>
    <link rel="stylesheet" type="text/css" href="ext/resources/css/ext-all.css"/>
	<link rel="stylesheet" type="text/css" href="resources/css/desktop.css"/>
    <link rel="stylesheet" type="text/css" href="resources/css/icons.css"/>

    <link rel="stylesheet" type="text/css" href="css/styles.css" />

</head>
<body>
	<a href="http://www.gesti-net.com.br" target="_blank" alt="Gesti Net - Soluções em TI & Telecomunicação"
       id="poweredby"><div></div></a>
	<div id="loading-mask" style=""></div>
	<div id="loading">
		<div id='loading-indicator' class="loading-indicator">
			<img src="resources/images/loading-gesti.gif" style="margin-right:8px;float:left;vertical-align:top;"/>
			<div id="txt-indicator" style=" padding-top:30px;">
				<?php echo "$sistema $versao $build"; ?><br>
				<span id="loading-msg">Carregando Styles e Imagens, Aguarde...</span>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		document.getElementById('loading-msg').innerHTML = 'Carregando Framework, Aguarde...';
		var NameApp = 'ShSolutions';
		var TITULO_SYSTEM = '<?php echo $sistema?>';
		var key = <?php echo $model?>;
	</script>
	<script type="text/javascript" src="ext/ext-all.js"></script>
	<script type="text/javascript" src="HtmlEditorImage.js"></script>
	<script type="text/javascript">document.getElementById('loading-msg').innerHTML = 'Carregando Tradutor, Aguarde...';</script>
	<script type="text/javascript" src="ext/locale/ext-lang-pt_BR.js"></script>
	<script type="text/javascript">document.getElementById('loading-msg').innerHTML = 'Carregando Plugins, Aguarde...';</script>


	
    
	<script type="text/javascript" src="resources/plugins/Notification.js"></script>
	<script type="text/javascript" src="resources/plugins/TextMask.js"></script>
	<script type="text/javascript" src="resources/plugins/functions.js"></script>

	<script type="text/javascript">document.getElementById('loading-msg').innerHTML = 'Carregando M&oacute;dulos, Aguarde...';</script>

    <script type="text/javascript" src='app.js'></script>
</body>
</html>
