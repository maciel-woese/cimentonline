<!-- TOPO -->
<?php 
ini_set("display_errors", 'off');
include_once 'header.php'; 

require_once 'includes/configure.inc.php';
require_once 'includes/class/fornecedor.inc.php';
require_once 'includes/class/cliente.inc.php';
require_once 'includes/class/estados.inc.php';
require_once 'includes/class/anunciante.inc.php';
require_once 'includes/class/usuario.inc.php';

$fornecedor = new fornecedor;
$anunciante = new anunciante;
$cliente = new cliente;
$estados_cidades = new estados; 
$usuarios = new usuarios; 

$action	= null;

if(isset($_POST['action']))   $action	 =	$_POST['action'];
if(isset($_GET['action']))    $action	 =	$_GET['action'];

switch($action){
	
	case 'CAD_CLIENTE':
	    if($usuarios->countEmail($_POST['email']) == 0)
	    {
			$cliente->insert();
		}
		else
		{
			echo '<div><h1 style="font:16px Trebuchet MS, Arial, Helvetica, sans-serif; margin-left:0px; padding:3px 6px; background:#4674B8; color:#FFF; border-radius:3px; margin-left:-15px; text-align:center">Esse e-mail já esta sendo usado por outro usuario. </div>';
		}
		break;
	
	case 'CAD_FORNECEDOR':
		if($usuarios->countEmail($_POST['email_principal']) == 0)
		{
			$fornecedor->insert();
		}
		else
		{
			echo $usuarios->countEmail($_POST['email_principal']);
			echo '<div><h1 style="font:16px Trebuchet MS, Arial, Helvetica, sans-serif; margin-left:0px; padding:3px 6px; background:#4674B8; color:#FFF; border-radius:3px; margin-left:-15px; text-align:center">Esse e-mail já esta sendo usado por outro usuario. </div>';
		}
		break;

	case 'CAD_ANUNCIANTE':
		if($usuarios->countEmail($_POST['email']) == 0)
		{
			$anunciante->insert();
		}
		else
		{
			echo '<div><h1 style="font:16px Trebuchet MS, Arial, Helvetica, sans-serif; margin-left:0px; padding:3px 6px; background:#4674B8; color:#FFF; border-radius:3px; margin-left:-15px; text-align:center">Esse e-mail já esta sendo usado por outro usuario. </div>';
		}	
		break;
}


?> 
<!-- FIM TOPO -->


<script>
$(function(){
	$("#btn-cad-usuario").click(function(){
		$("#btn-cad-usuario, #btn-cad-anunciante, #btn-cad-fornecedor").hide();
		$("#cadastro1, #btn-cad-anunciante-l, #btn-cad-fornecedor-l").show();
		});
	
	$("#btn-cad-fornecedor").click(function(){
		$("#btn-cad-fornecedor, #btn-cad-anunciante, #btn-cad-usuario").hide();
		$("#cadastro2, #btn-cad-anunciante-r, #btn-cad-usuario-r").show();
		});

	$("#btn-cad-anunciante").click(function(){
		$("#btn-cad-anunciante, #btn-cad-fornecedor, #btn-cad-usuario").hide();
		$("#cadastro3, #btn-cad-fornecedor-l, #btn-cad-usuario-r").show();
		});
	
	$("#btn-cad-usuario-r").click(function(){
		$("#cadastro2,#btn-cad-usuario-r, #btn-cad-anunciante-r, #cadastro3").hide();
		$("#cadastro1, #btn-cad-fornecedor-l, #btn-cad-anunciante-l").show();
		});

	$("#btn-cad-fornecedor-l").click(function(){
		$("#cadastro1,#btn-cad-fornecedor-l, #btn-cad-anunciante-l, #cadastro3").hide();
		$("#cadastro2, #btn-cad-usuario-r, #btn-cad-anunciante-r").show();
		});

	$("#btn-cad-anunciante-l").click(function(){
		$("#cadastro1,#btn-cad-fornecedor-l, #btn-cad-anunciante-l").hide();
		$("#cadastro3, #btn-cad-usuario, #btn-cad-fornecedor").show();
		});

	$("#btn-cad-anunciante-r").click(function(){
		$("#cadastro2, #btn-cad-anunciante-r").hide();
		$("#cadastro3, #btn-cad-fornecedor-l").show();
		});

});
</script>

<!-- MASCARA INPUT  -->

<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function($){
   $("#tel").mask("(99) 9999-9999");
   $("#cel").mask("(99) 9999-9999");
   $("#cep").mask("99.999-999");
   $("#tel-f").mask("(99) 9999-9999");
   $("#cel-f").mask("(99) 9999-9999");
   $("#tel-a").mask("(99) 9999-9999");
   $("#cel-a").mask("(99) 9999-9999");
});
</script>

<!-- FIM MASCARA INPUT  -->

<!-- CORPO -->
<div id="corpo">

<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Faça seu CADASTRO como FORNECEDOR e VENDA muito Mais... Ou como USUÁRIO PREMIUM e USUFRUA de TODAS as VANTAGENS de nosso PORTAL.</h1> </div>

<div id="cadastro_form">

	<img id="btn-cad-fornecedor" src="img/btn-cad-fornecedor.png" style="float:left; cursor:pointer; margin-top:110px;" />
	<img id="btn-cad-fornecedor-l" src="img/btn-cad-fornecedor.png" style="float:left; display:none; cursor:pointer; margin-top:110px;" />
	<img id="btn-cad-usuario" src="img/btn-cad-usuario.png" style="float:right; cursor:pointer; margin-top:110px;" />
	<img id="btn-cad-usuario-r" src="img/btn-cad-usuario.png" style="float:right; display:none; cursor:pointer; margin-top:110px;" />
	<img id="btn-cad-anunciante" src="img/btn-cad-anunciante.png" style="float:left; cursor:pointer; margin-left:220px; margin-top:50px;" />
	<img id="btn-cad-anunciante-l" src="img/btn-cad-anunciante.png" style="float:left; margin-left:-330px; display:none; cursor:pointer; margin-top:230px;" />
	<img id="btn-cad-anunciante-r" src="img/btn-cad-anunciante.png" style="float:right; margin-right:-330px; display:none; cursor:pointer; margin-top:230px;" />


<!-- CADASTRO DE USUARIO -->


<!-- SCRIPT DE UF/CIDADES -->
<script type="text/javascript">
$(document).ready(function() {
    $('#UF').change(function(){
      $.get("includes/services/estados.php?action=BUSCACITY", {
        drop_var: $('#UF').val()
      }, function(response){
        $('#result_1').show();
        $('#result_1').html(response);
      });
        return false;
    });
});

function validar() {	
if(document.getElementById("UF").selectedIndex == ""){
window.alert("É necessário que você escolha o Estado e Cidade.");
document.getElementById("UF").focus();
return false;
}
}
</script>
<!-- FIM SCRIPT DE UF/CIDADES -->

	<div id="cadastro1" class="form_right" style="display:none;">
    	<img src="img/cab-cad-usuario.png" width="230" /><br /><br />
		<form name="" action="cadastro.php?action=CAD_CLIENTE" method="POST">

			<label>Nome Completo<font color="#FF0000">*</font>:</label><br />
			<input name="nome" type="text" size="40" placeholder="Nome Sobrenome" required="required" /><br />
            
            <label>Nome da Empresa <small>(Opcional)</small>:</label><br />
			<input name="nome_empresa" type="text" size="40" placeholder="Nome Fantasia LTDA" /><br />

			<label>E-mail<font color="#FF0000">*</font>:</label><br />
			<input name="email" type="email" placeholder="seunome@exemplo.com.br" size="40" required="required" /><br />

			<label>Telefone<font color="#FF0000">*</font>:</label><label style="margin-left:58px;">Celular:</label><br />
			<input id="tel" name="telefone" type="text" size="12" placeholder="(00) 0000.0000" required="required" />
			<input id="cel" name="celular" type="text" size="12" placeholder="(00) 0000.0000" style="margin-left:10px;" /><br />

			<label>Estado<font color="#FF0000">*</font>:</label><label style="margin-left:95px;">Cidade<font color="#FF0000">*</font>:</label><br />
			
            <select id="UF" name="uf" style="width:135px; height:30px; margin-top:5px; padding:5px;">
            <?php 
            //Busca todos os Estados
            $estados_cidades->getEstados(""); 
            ?>
        </select> 
        
         <span id="result_1" style="display: inline;">
           <select id="city" name="CITY" style="width:135px; height:30px; margin:5px 0 0 0; padding:5px;"> 
            <option value=" " selected="selected">Cidade</option>
           </select>
         </span>
            
            <br />

			<label>Cargo ou Função na Empresa:</label><br />
			<input name="cargo" type="text" size="40" /><br />

			<label>Senha<font color="#FF0000">*</font>:</label><label style="margin-left:95px;">Confirmar<font color="#FF0000">*</font>:</label><br />
			<input name="senha" type="password" size="16" placeholder="Crie sua senha" required="required" />
			<input name="conf_senha" type="password" size="16" placeholder="Confirme sua senha" style="margin-left:5px;" required="required" /><br />

			<br />

			<input type="submit" class="btn_form_proximo" value="Cadastrar" onclick="return validar()">
         </form>
	</div>
<!-- FIM CADASTRO DE USUARIO -->


<!-- CADASTRO DE FORNECEDOR -->


<!-- SCRIPT DE UF/CIDADES -->

<script type="text/javascript">
$(document).ready(function() {
    $('#UF2').change(function(){
      $.get("includes/services/estados.php?action=BUSCACITY", {
        drop_var: $('#UF2').val()
      }, function(response){
        $('#result_2').show();
        $('#result_2').html(response);
      });
        return false;
    });
});

function validar2() {	
if(document.getElementById("UF2").selectedIndex == ""){
window.alert("É necessário que você escolha o Estado e Cidade.");
document.getElementById("UF2").focus();
return false;
}
}

</script>
<!-- FIM SCRIPT DE UF/CIDADES -->

	<div id="cadastro2" class="form_left" style="display:none;">
	
		<img src="img/cab-cad-fornecedor.png" width="230" /><br /><br />
	
		<form name="" action="cadastro.php?action=CAD_FORNECEDOR" method="POST">
		<label>Nome fantasia e/ou Razão Social<font color="#FF0000">*</font>:</label><br />
		<input name="razao_social" type="text" size="40" placeholder="Nome Fantasia LTDA" required="required"/><br />

		<label>UF/Cidade<font color="#FF0000">*</font>:</label><br />
        
        <select id="UF2" name="uf" style="width:150px; height:30px; margin-top:5px; padding:5px;">
            <?php 
            //Busca todos os estados
            $estados_cidades->getEstados(""); 
            ?>
        </select> 
        
         <span id="result_2" style="display: inline;">
           <select id="city" name="CITY" style="width:150px; height:30px; margin:5px 0 0 0; padding:5px;"> 
            <option value=" " selected="selected">Selecione uma Cidade</option>
           </select>
         </span>
         
        <br />

		<label>Endereço Completo<font color="#FF0000">*</font>:</label><br />
		<input id="rua_numero" name="rua_numero" size="40" placeholder="Endereço da sua Empresa, N°" required="required" ><br />

		<label>Bairro:</label><label style="margin-left: 115px;">CEP:</label><br />
		<input id="bairro" name="bairro" size="20" placeholder="Bairro de sua Empresa" >
		<input id="cep" name="cep" size="11" placeholder="00.000-000" style="margin-left: 10px;" ><br />
		
        <label>Telefone<font color="#FF0000">*</font>:</label><label style="margin-left:58px;">Celular:</label><br />
		<input id="tel-f" name="telefone" type="text" size="12" placeholder="(00) 0000.0000" required="required" />
		<input id="cel-f" name="celular" type="text" size="12" placeholder="(00) 0000.0000" style="margin-left:10px;" /><br />

		<label>Email<font color="#FF0000">*</font>:</label><br />
		<input name="email_principal" type="email" size="40" placeholder="contato@exemplo.com.br"  required="required"/><br />

		<label>Endereço Página Web <small>(se possuir)</small>:</label><br />
		<input name="site" type="text" size="40" placeholder="www.suaempresa.com.br" /><br />
        
        <label>Senha<font color="#FF0000">*</font>:</label><label style="margin-left:95px;">Confirmar<font color="#FF0000">*</font>:</label><br />
		<input name="senha" type="password" size="16" placeholder="Crie sua senha" required="required" />
		<input name="conf_senha" type="password" size="16" placeholder="Confirme sua senha" style="margin-left:5px;" required="required" /><br />
        <br />

		<input id="btn_form_enviar" class="btn_form_cadastro" type="submit" value="Continuar" onclick="return validar2()" />
		</form>
	
    </div>
<!-- FIM CADASTRO DE FORNECEDOR -->
    
    

<!-- CADASTRO DE ANUNCIANTE -->


<!-- SCRIPT DE UF/CIDADES -->

<script type="text/javascript">
$(document).ready(function() {
    $('#UF3').change(function(){
      $.get("includes/services/estados.php?action=BUSCACITY", {
        drop_var: $('#UF3').val()
      }, function(response){
        $('#result_3').show();
        $('#result_3').html(response);
      });
        return false;
    });
});

function validar3() {	
if(document.getElementById("UF3").selectedIndex == ""){
window.alert("É necessário que você escolha o Estado e Cidade.");
document.getElementById("UF3").focus();
return false;
}
} 

</script>
<!-- FIM SCRIPT DE UF/CIDADES -->

	<div id="cadastro3" class="form_left" style="display:none; margin-left:240px; margin-top:50px;">
    	<img src="img/cab-cad-anunciante.png" width="230" /><br /><br />
		<form name="" action="cadastro.php?action=CAD_ANUNCIANTE" method="POST">

			<label>Nome Completo<font color="#FF0000">*</font>:</label><br />
			<input name="nome" type="text" size="40" placeholder="Nome Sobrenome" required="required" /><br />
            
            <label>Nome da Empresa <small>(Opcional)</small>:</label><br />
			<input name="nome_empresa" type="text" size="40" placeholder="Nome Fantasia LTDA" /><br />

			<label>E-mail<font color="#FF0000">*</font>:</label><br />
			<input name="email" type="email" placeholder="seunome@exemplo.com.br" size="40" required="required" /><br />

			<label>Telefone<font color="#FF0000">*</font>:</label><label style="margin-left:58px;">Celular:</label><br />
			<input id="tel-a" name="telefone" type="text" size="12" placeholder="(00) 0000.0000" required="required" />
			<input id="cel-a" name="celular" type="text" size="12" placeholder="(00) 0000.0000" style="margin-left:10px;" /><br />

			<label>Estado<font color="#FF0000">*</font>:</label><label style="margin-left:95px;">Cidade<font color="#FF0000">*</font>:</label><br />
			
            <select id="UF3" name="uf" style="width:135px; height:30px; margin-top:5px; padding:5px;">
           
            <?php 
			//Busca todos os Estados
            $estados_cidades->getEstados(""); 
            ?>
        </select> 
        
         <span id="result_3" style="display: inline;">
           <select id="city" name="CITY" style="width:135px; height:30px; margin:5px 0 0 0; padding:5px;"> 
            <option value=" " selected="selected">Cidade</option>
           </select>
         </span>
            
            <br />

			<label>Cargo ou Função na Empresa:</label><br />
			<input name="cargo" type="text" size="40" /><br />

			<label>Senha<font color="#FF0000">*</font>:</label><label style="margin-left:95px;">Confirmar<font color="#FF0000">*</font>:</label><br />
			<input name="senha" type="password" size="16" placeholder="Crie sua senha" required="required" />
			<input name="conf_senha" type="password" size="16" placeholder="Confirme sua senha" style="margin-left:5px;" required="required" /><br />

			<br />

			<input type="submit" class="btn_form_proximo" value="Cadastrar" onclick="return validar3()">
         </form>
	</div>
<!-- FIM CADASTRO DE ANUNCIANTE -->


</div>

</div>
<!-- FIM CORPO -->

<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->

<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->