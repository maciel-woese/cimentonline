<!-- TOPO -->
<?php 
	include_once 'header.php'; 
	$dados = array();
	$query = $listapagina->db->query("select * from config");
	while($row = $listapagina->db->fetch_object($query)){
		$dados[$row->tipo] = $row->valor;
	}
?> 


<!-- FIM TOPO -->



<!-- CORPO -->
<div id="corpo">

<div id="barra_titulo"><h1>Fale Conosco</h1></div>

<div id="contato_form">
<form name="" action="enviar.php" method="POST">
<label>Nome:</label><br />
<input name="nome" type="text" /><br />
<label>Email:</label><br />
<input name="email" type="text" /><br />
<label>Assunto:</label><br />
<input name="assunto" type="text" /><br />
<label>Mensagem:</label><br />
<textarea name="mensagem"></textarea><br />
<input class="btn_form_contato" type="submit" value="Enviar" />
</form>

</div>

<div id="contato_chat"><a href="/clientes/cimentonline.com.br/atendimento/client.php?locale=pt-br" target="_blank" onclick="if(navigator.userAgent.toLowerCase().indexOf('opera') != -1 &amp;&amp; window.event.preventDefault) window.event.preventDefault();this.newWindow = window.open('/clientes/cimentonline.com.br/atendimento/client.php?locale=pt-br&amp;url='+escape(document.location.href)+'&amp;referrer='+escape(document.referrer), 'webim', 'toolbar=0,scrollbars=0,location=0,status=1,menubar=0,width=640,height=480,resizable=1');this.newWindow.focus();this.newWindow.opener=window;return false;"><img src="img/online_fale_conosco.png" /></a></div>



<div id="contato_info">
<div id="contato_info_titulo">+ Informações</div>
<hr />

<div id="contato_info_ctt">
<div id="contato_info_fone">
<span><img src="css/img/icons/fone-icon.png" /><?php echo $dados['telefone'];?></span>
</div>

<div id="contato_info_mail">
<span><img src="css/img/icons/email-icon.png" /><?php echo $dados['email'];?></span>
</div>

</div>

<div id="contato_social">
<div id="contato_info_titulo">+ Social</div>
<hr />

<div id="contato_social_links">
	<ul>
    	<li><img src="css/img/icons/social-facebook-icon.png" /><span><a href="<?php echo $dados['facebook'];?>">/facebook</a></span></li>
        <li><img src="css/img/icons/social-twitter-icon.png" /><span><a href="<?php echo $dados['twitter'];?>">@twitter</a></span></li>
        <li><img src="css/img/icons/social-google-icon.png" /><span><a href="<?php echo $dados['google+'];?>">Google+</a></span></li>
        <li><img src="css/img/icons/social-skype-icon.png" /><span><a href="<?php echo $dados['skype'];?>">Skype</a></span></li>
    </ul>
</div>

</div>


</div>


</div>
<!-- FIM CORPO -->




<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->


<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->