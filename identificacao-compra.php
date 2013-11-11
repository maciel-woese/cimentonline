<!-- TOPO -->
<?php include_once 'header.php'; ?> 
<!-- FIM TOPO -->
<?
    if(isset($_SESSION["login"]) and !empty($_SESSION["login"])){
        header('Location: pagamento-compra.php');
    }
?>

<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function($){
   $("#tel").mask("(99) 9999-9999");
   $("#cel").mask("(99) 9999-9999");
});
</script>


<!-- SCRIPT DE UF/CIDADES -->
<script type="text/javascript">	
$(document).ready(function () {
$.getJSON('inc/estados_cidades.json', function (data) {
 
var items = [];
var options = '<option value="">Estado</option>';	
 
$.each(data, function (key, val) {
options += '<option value="' + val.nome + '">' + val.nome + '</option>';
});	
$("#estados").html(options);	
$("#estados").change(function () {	
var options_cidades = '';
var str = "";	
$("#estados option:selected").each(function () {
str += $(this).text();
});
$.each(data, function (key, val) {
if(val.nome == str) {	
$.each(val.cidades, function (key_city, val_city) {
options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
});	
}
});
 
$("#cidades").html(options_cidades);
}).change();	
});
});
</script>
<!-- FIM SCRIPT DE UF/CIDADES -->


<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

<div class="carrinho_etapa-2"></div>

	<div id="corpo_identificacao">

		<div class="ident-cadastro">
        	<h3>Não sou Cadastrado</h3>
            <div class="form-ident-cadastro">
            <form method="" action="">
            <label>Nome Fantasia ou Razão Social:</label><br />
            <input name="razaosocial" type="text" size="40" placeholder="Sua Empresa LTDA" required="required" /><br />
            
            <label>Estado:</label><label style="margin-left:105px;">Cidade:</label><br />
            <select id="estados" style="width:150px;">
				<option value=""></option>
			</select> 
			<select id="cidades" style="width:150px;">
			</select><br />
            
            <label>Endereço:</label><br />
            <textarea name="endereco" type="text" cols="39" rows="3" placeholder="Endereço da sua empresa, N°, Bairro" required="required"></textarea><br />
            
            <label>Email <small>(usuário)</small>:</label><br />
            <input name="email" type="text" size="40" placeholder="seunome@exemplo.com.br" required="required" /><br />
            
            <label>Telefone:</label><label style="margin-left:85px;">Celular:</label><br />
            <input id="tel" name="telefone" type="text" size="14" placeholder="(99) 9999-9999" required="required"/>
            <input style="margin-left:20px;" id="cel" name="celular" type="text" size="14" placeholder="(99) 9999-9999"/><br />
            
            <label>Site <small>(opcional)</small>:</label><br />
            <input name="text" type="text" size="40" placeholder="www.suaempresa.com.br" /><br />
            
            <label>Senha <small>(para acesso)</small>:</label><br />
            <input name="senha" type="password" size="21" placeholder="Digite aqui sua senha" required="required" />
            <input name="conf_senha" type="password" size="21" placeholder="Confirmar senha" /><br />
            
            <input class="btn-ident-cadastrar" type="submit" value="Cadastrar" />
            </form>
            </div>         
        </div>
        
        <div class="ident-login">
        	<h3>Já sou Cadastrado</h3>
            <div class="form-ident-login">
            <img class="icon-ident-login" src="css/img/icons/Login-icon.png" />
            <form method="post" action="logar.php?url=pagamento-compra.php">
            <label>Email/Login:</label><br />
            <input name="login" type="email" size="30" placeholder="seunome@exemplo.com.br" required="required" /><br />
            <img class="icon-ident-senha" src="css/img/icons/Senha-icon.png" />
            <label>Senha/Chave:</label><br />
            <input name="senha" type="password" size="20" placeholder="Digite aqui sua senha" required="required" /><br />
            <a href="#">Esqueceu a senha?</a>
            <input class="btn-ident-login" type="submit" value="Continuar" />
            </div>             
        </div>
      
	</div>
    
</div>
<!-- FIM CORPO -->







<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->