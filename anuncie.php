<!-- TOPO -->
<?php include_once 'header.php'; ?> 
<!-- FIM TOPO -->



<!-- CORPO -->
<div id="corpo">

<div id="barra_titulo"><h1>Novo Anuncio</h1></div>

<div id="anuncie_form">
<form name="" action="" method="">
<label>Nome do Estabelecimento:</label><br />
<input name="nome" type="text" /><br />
<label>Cidade:</label><br />
<select name="cidade" >
	<option selected="selected">Selecionar Categoria</option>
    <option >Ceará</option>
	<option >Bahia</option>
    <option >São Paulo</option>
</select><br />
<label>Discrição de Entrada:</label><br />
<textarea name="discricao_entrada" style="width:400px; height:70px;"></textarea><br />
<label>Endereço:</label><br />
<textarea name="endereco" style="width:400px; height:100px;"></textarea><br />
<label>Contato:</label><br />
<textarea name="contato" style="width:400px; height:60px;"></textarea><br />
<label>Email:</label><br />
<input name="email" type="text" /><br />
<label>Adcionar imagem:</label><br />
<input name="add_imagem" type="file" style="width:300px; height:22px; padding:3px;" /><br /><br />
<input class="btn_form_anuncie" type="submit" value="Enviar" />
</form>

</div>

</div>
<!-- FIM CORPO -->




<!-- SIDEBAR -->
<?php include_once 'sidebar.php'; ?> 
<!-- FIM SIDEBAR -->


<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->