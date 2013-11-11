<!-- TOPO -->
<?php 
include_once 'header.php'; 
require_once 'includes/configure.inc.php';
?> 

<!-- FIM TOPO -->

<!-- STYLE LIGHTBOX -->
<style>
        .black_overlay{display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:#4674b8; z-index:1001;
            			-moz-opacity:0.3; opacity:.30; filter:alpha(opacity=30);}
        .white_content{display:none; position:absolute; top:70%; left:25%; width:600px; height:auto; padding:16px; border:5px solid #4674b8;
						border-radius:0 50px 0 50px; box-shadow:0 0 10px #000; background-color:white; z-index:1002; overflow:none;}
		.white_content label{font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#4674b8; margin-right:10px;}
		.white_content input{height:21px; padding:2px;}
    </style>
<!-- FIM STYLE LIGHTBOX -->


<!-- SCRIPT DE UF/CIDADES -->
<script type="text/javascript">	
$(document).ready(function () {
$.getJSON('inc/estados_cidades.json', function (data) {
 
var items = [];
var options = '<option value="">Todos os Estados</option>';	
 
$.each(data, function (key, val) {
options += '<option value="' + val.sigla + '">' + val.nome + '</option>';
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

<?php 
ini_set("display_errors", 'on');
include_once 'includes/class/estados.inc.php'; ?> 
<select name="opiniao">
<option value="0" selected="selected">Selecione um Estado</option>
        <?php

          $listaEstados = new estados;  
          $object = $listaEstados->listEstados2();

          for($i=0; $i < count($object); $i++)
          {

         ?>
            <option value="<?php echo $object[$i]['code'];?>"><?php echo $object[$i]['name'];?></option><br/>
        <?php
          }
        ?>
</select>



<!-- CORPO -->
<div id="corpo">

<div id="barra_titulo"><h1>Nova Pesquisa</h1></div>

<div id="corpo_pesquisa">
	
    <div id="filtro_pesquisa">
    
    	<div class="bg_filtrar"><h3>FILTRAR</h3></div>
        
        <form method="POST" action="pesquisa.php">

        <div id="select_filtrar">
        	<select id="estados" name="UF" style="width:200px; height:30px; margin:5px 10px; padding:5px;">
            	<option value=""></option> 

            </select> 
            
            <select id="cidades" name="CITY" style="width:200px; height:30px; margin:5px 0 0 30px; padding:5px;">
            	                
            </select>
                                        
        </div>
    	
    		<input type="submit" class="icon_filtrar" type="submit" value="" />

        </form>
        
    </div>
    
    <br />
    
    <!-- RESULTADO DO FILTRO -->
   	<div id="pesquisa_resultado">
    
    	<ul>
        
        	<li>
    			<div id="bloco_cliente">
        			<div class="check_cotar"><input type="checkbox" /></div>
        
       				 <img src="clientes/normatel/logo.png" title="Normatel - Home Center" />
                     
                     <div class="text_dados">
                     	<h2 style="width:500px;">Normatel - Home Center</h2>
                        <h4 style="width:500px;">Av. Bezerra de Menezes,78 - Farias Brito, Fortaleza - CE</h4>
                        <hr />
                        <p style="width:500px; text-align:justify;">A <b>Normatel Home Center</b> tem o que você precisa para casa e construção, 
                        desde utensílios e utilidades domésticas a revestimentos cerâmicos das melhores marcas, 
                        apresentados em um Show Room ambientado.</p>             
                     </div>
                     
                     <a href="pagina-cliente.php"><div class="mais-infor-cliente">Mais Detalhes!</div></a>
        
        		</div>
        	</li>
            
            <li>
    			<div id="bloco_cliente">
        			<div class="check_cotar"><input type="checkbox" /></div>
        
       				 <img src="clientes/nassau/logo.png" title="Cimentos Nassau" />
                     
                     <div class="text_dados">
                     	<h2 style="width:500px;">Cimentos Nassau</h2>
                        <h4 style="width:500px;">Av. Presidente Costa e Silva,5479, Mondubim - Fortaleza/CE</h4>
                        <hr />
                        <p style="width:500px; text-align:justify;">O <b>Cimento Nassau</b> marca Brasileira de Cimentos possui um produto de 
                        alta qualidade. O Material que em contato com a agua produz a cristalzação de produtos hidratados, ganhando assim 
                        resistencia mecanica.</p>             
                     </div>
                     
                      <a href="pagina-cliente.php"><div class="mais-infor-cliente">Mais Detalhes!</div></a>
        
        		</div>
        	</li>
            
            <li>
    			<div id="bloco_cliente">
        			<div class="check_cotar"><input type="checkbox" /></div>
        
       				 <img src="clientes/cliente1/logo.png" title="Cliente 001" />
                     
                     <div class="text_dados">
                     	<h2 style="width:500px;">Nome da Empresa LTDA</h2>
                        <h4 style="width:500px;">Endereço Completo da Empresa, Cidade - Estado | CEP 00.000-000 </h4>
                        <hr />
                        <p style="width:500px; text-align:justify;">Pequena discrição do institucional da empresa.</p>             
                     </div>
                     
                      <a href="pagina-cliente.php"><div class="mais-infor-cliente">Mais Detalhes!</div></a>
        
        		</div>
        	</li>
            
        </ul>
    
    </div>
    <!-- FIM RESULTADO DO FILTRO -->
    
    <div id="form_cotacao">
    
    	 <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">
        <button class="btn_cotar"><div class="icon_cotar"></div> Fazer Cotação </button></a>
        
        <!-- FORMULARIO DE COTAÇÃO - LIGHTBOX -->
        <div id="light" class="white_content">
        
        <div class="tags_cotar">
        	<ul>
            <span>Empresas Selecionadas:</span><br />
            <li>Normatel - Home Center</li><li>Cimentos Nassau</li>
            </ul>
        </div>
        
        <table style=" width:500px; height:250px; margin:20px auto;">
        	<form method="" action="">        
            <tr>
            	<td align="right"><label>Solicitante:<small>(Identificação)</small></label></td>
                <td><input name="solicitante" type="text" size="40" placeholder="Razão Social ou Nome de Fantasia" /></td>
            </tr>
            
            <tr>
            	<td align="right"><label>Contato:</label></td>
                <td><input name="contato" type="text" size="40" placeholder="Nome Sobrenome" /></td>
            </tr>
            
            <tr>
            	<td align="right"><label>Telefone:</label></td>
                <td ><input name="telefone" type="text" size="40" placeholder="(00) 0000.0000" /></td>
            </tr>
            
            <tr>
            	<td align="right"><label>Email:</label></td>
                <td ><input name="email" type="email" size="40" placeholder="seunome@exemplo.com.br" /></td>
            </tr>
            
            <tr>
            	<td align="right"><label>Quant.<small>(Sacos)</small>:</label></td>
                <td ><input name="quant" type="text" size="30" placeholder="Qual a quantidade que deseja?" /></td>
            </tr>
            
            <tr>
            	<td align="right"><label>Tipo de Cimento:</label></td>
                <td ><select style="width:100px; height:23px;" name="tipo">
            			<option value="Qualquer Tipo" selected="selected"> Qualquer Tipo </option>
            			<option value="CPI"> CPI </option>
            			<option value="CPII Z, E ou F"> CPII Z, E ou F </option>
           			<option value="CPIII"> CPIII </option>
            			<option value="CPIV"> CPIV </option>
                                <option value="CPV"> CPV </option>
                                <option value="Cimento Branco"> Cimento Branco </option>
                                <option value="Outro"> Outro </option>
                     </select>
                     <label>&nbsp; Marca:</label>
                     <select style="width:100px; height:23px;" name="marca">
            			<option value="Indiferente" selected="selected"> Indiferente </option>
            			<option value="Açai"> Açai </option>
            			<option value="Apodi"> Apodi </option>
            			<option value="Barroso"> Barroso </option>
            			<option value="Campeão"> Campeão </option>
            			<option value="Cimpor"> Cimpor </option>
            			<option value="Aratu"> Aratu </option>
            			<option value="Cauê"> Cauê </option>
            			<option value="Alvorada"> Alvorada </option>
            			<option value="Ciminas"> Ciminas </option>
            			<option value="Ciplan"> Ciplan </option>
            			<option value="Nassau"> Nassau </option>
            			<option value="Paraíso"> Paraíso </option>
            			<option value="Poty"> Poty </option>
            			<option value="Brasil"> Brasil </option>
            			<option value="Montes Claros"> Montes Claros </option>
            			<option value="Ita"> Ita </option>
            			<option value="Itambé"> Itambé </option>
            			<option value="Liz"> Liz </option>
            			<option value="Tupi"> Tupi </option>
            			<option value="Ribeirão"> Ribeirão </option>
            			<option value="Mizu"> Mizu </option>
            			<option value="Tocantins"> Tocantins </option>
            			<option value="Itaú"> Itaú </option>
            			<option value="Votoran"> Votoran </option>
            			<option value="CSN"> CSN </option>
                        <option value="outro"> Outro(a) </option>
                     </select><br />
                     <small style="font:10px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#555; margin:3px 0;">(Na escolha de "Outro", Indique em observações)</small>
                </td>
            </tr>
            
            <tr>
            	<td align="right"><label>Prazo de Entrega:</label></td>
                <td ><input name="prazo" type="text" size="32" placeholder="Deseja receber em quantos dias?" /></td>
            </tr>
            
            <tr>
            	<td align="right"><label>Tipo de Entrega:</label></td>
                <span style="font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif;">
                <td >
                	 <input type="checkbox" /> &nbsp;<font style="font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#333;">Buscar o Cimento no Fornecedor</font><br />
                	 <input type="checkbox" /> &nbsp;<font style="font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#333;">Entrega na Obra/Cliente (Sem descarrego)</font><br />
                     <input type="checkbox" /> &nbsp;<font style="font:12px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#333;">Entrega na Obra/Cliente (Com descarrego)</font>
                </td>                
            </tr>
            
            <tr>
            	<td align="right"><label>Especifique o Local de Entrega:</label></td>
                <td><textarea name="endereço" cols="31" rows="2" style="resize:vertical;" placeholder="Rua, Bairro, Cidade, Estado etc..."></textarea></td>
            </tr>
            
            <tr>
            	<td align="right"><label>Obs.:</label></td>
                <td><textarea name="observacoes" cols="31" rows="3" style="resize:none;" placeholder="Digite aqui suas observações..."></textarea></td>
            </tr>
            
            <tr>
            	<td colspan="2" align="right"><input class="btn_enviar_cotacao" name="enviar" type="submit" value="Enviar Solicitação" /></td>
            </tr>
            </form>
         </table>
               
        
        </div>
        <!-- FIM FORMULARIO DE COTAÇÃO - LIGHTBOX -->
        
        <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
        <div id="fade" class="black_overlay"></div></a>
        
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