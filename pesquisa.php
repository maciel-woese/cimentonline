<!-- TOPO -->
<?php 
ini_set("display_errors", 'off');
include_once 'header.php'; 
require_once 'includes/configure.inc.php';

include_once 'includes/class/fornecedor.inc.php';
$listaFornecedores = new fornecedor; 

include_once 'includes/class/estados.inc.php';
$estados_cidades = new estados; 

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
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script> -->

<script type="text/javascript">
$(document).ready(function() {
    $('#wait_1').hide();
    $('#UF').change(function(){
      $('#wait_1').show();
      $('#result_1').hide();
      $.get("includes/services/estados.php?action=BUSCACITY", {
        drop_var: $('#UF').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
        return false;
    });
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
</script>
<!-- FIM SCRIPT DE UF/CIDADES -->

    <!-- SCRIPT SELECIONAR TODOS -->
    <script language=javascript>
<!--
function CheckAll() { 
   for (var i=0;i<document.form1.elements.length;i++) {
        var x = document.form1.elements[i];
        if (x.name == 'UIDL') { 
             x.checked = document.form1.selall.checked;
        } 
    } 
} 
//-->
</script>
<!-- FIM SCRIPT SELECIONAR TODOS -->

<!-- CORPO -->
<div id="corpo">

<div id="barra_titulo"><h1>Nova Pesquisa</h1></div>

<div id="corpo_pesquisa">

    <div id="filtro_pesquisa">
    
        <div class="bg_filtrar"><h3>FILTRAR</h3></div>
        
        <form method="GET" action="pesquisa.php">

        <div id="select_filtrar">
            <select id="UF" name="uf" style="width:200px; height:30px; margin:5px 10px; padding:5px;">
            <option value=" " disabled="disabled" selected="selected">Selecione um Estado</option>
                <?php
                //Busca Estados
                if(isset($_GET['sigla']) and !empty($_GET['sigla'])){
                    $sigla = $_GET['sigla'];
                    $estados_cidades->getEstados($_GET['sigla']); 
                 }else{
                    $estados_cidades->getEstados($_GET['uf']);
                 }   
                ?>

            </select> 

            <span id="wait_1" style="display: none;">
            <img alt="Please Wait" src="img/ajax-loader.gif"/>
            </span>
            <span id="result_1" style="display: inline;">

            <?php    
            if(isset($_GET['sigla']) and !empty($_GET['sigla'])){
                    $estados_cidades->getCidades($_GET['sigla']); 
            }else if(isset($_GET['uf']) and !empty($_GET['uf'])){ 
                    $estados_cidades->getCidades($_GET['uf']); 
            }else{    
            ?> 

           <select id="city" name="CITY" style="width:200px; height:30px; margin:5px 0 0 30px; padding:5px;"> 
            <option value=" " selected="selected">Selecione uma Cidade</option>
            </select>
           <?php
           }
           ?> 
            
            </span>
                                        
        </div>
        
            <input type="submit" class="icon_filtrar" type="submit" value="" />

        </form>
        
    </div>

    
    <br />
    
    <!-- RESULTADO DO FILTRO -->
   	<div id="pesquisa_resultado">
     
    <form name="form1">    
    
    <?php
    $num_por_pagina = 5; 

    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    
    // definir o número do primeiro registro da página. 
    // Faça a continha na calculadora que você entenderá minha fórmula   
    $primeiro_registro = ($pagina*$num_por_pagina) - $num_por_pagina;
         
    $objectFor = $listaFornecedores->listFornecedor24($primeiro_registro,$num_por_pagina);

    

    if($objectFor != ""){

        echo '<div><h1 style="font:16px Trebuchet MS, Arial, Helvetica, sans-serif; margin-left:0px; padding:3px 6px; background:#4674B8; color:#FFF; border-radius:3px; margin-left:-15px; text-align:center">Resultado da Pesquisa por Estado = ';
        if(isset($_GET['uf']) and !empty($_GET['uf'])){
            $objEstado = $estados_cidades->getArrayEstados($_GET['uf']); 
            
            for($e=0; $e < count($objEstado); $e++)
            {   
                $uf = $objEstado[$e]['codigo'];
                echo '<b>'.$objEstado[$e]['estado'].'</b>';
            }
        }else{

            if(isset($_GET['sigla']) and !empty($_GET['sigla'])){
            $objEstado = $estados_cidades->getArrayEstados($_GET['sigla']); 
            
                for($e=0; $e < count($objEstado); $e++)
                {   
                    echo '<b>'.$objEstado[$e]['estado'].'</b>';
                }
            }else{
                echo '<b>Todos os Estados</b>';
            }
            
        }  
        echo ' e Cidade = ';
        if(isset($_GET['city']) and !empty($_GET['city'])){
            $objCidade = $estados_cidades->getArrayCidades($_GET['city']); 
            for($c=0; $c < count($objCidade); $c++)
            {
                $city = $objCidade[$c]['codigo'];
                echo '<b>'.$objCidade[$c]['cidade'].'</b>';
            }
        }else{
            echo '<b>Todas as Cidades</b>';
        } 

        echo '</div><br>';
        ?>
        <div style="width:115px; height:21px; padding:3px 6px; background:#4674B8; color:#FFF; border-radius:3px; margin-left:-15px;">
        <input type="checkbox" name="selall" onclick="CheckAll()" />
        <font style="font:16px 'Trebuchet MS', Arial, Helvetica, sans-serif; margin-left:0px;">Marcar Todos</font>
        </div>
        <?php

        $total_paginas = $objectFor['total']/$num_por_pagina;
        for($i=0; $i < count($objectFor['dados']); $i++)
        {
    ?>        
    	<ul>
            <li>
    			<div id="bloco_cliente">
        			<div class="check_cotar"><input type="checkbox" name="UIDL" value="<?=$objectFor['dados'][$i]['id_for']?>" attr-name="<?=$objectFor['dados'][$i]['nome']?>" /></div>
                    
                    
        
       				 <img src="clientes/cliente1/logo.png" title="Cliente 001" />
                     
                     <div class="text_dados">
                     	<h2 style="width:500px;"><?php echo $objectFor['dados'][$i]['nome'];?></h2>
                        <h4 style="width:500px;"><?php echo $objectFor['dados'][$i]['endereco'];?> </h4>
                        <hr />
                        <p style="width:500px; text-align:justify;"><?php echo $objectFor['dados'][$i]['comentario'];?></p>             
                     </div>
                     
                      <a href="pagina-cliente.php"><div class="mais-infor-cliente">Mais Detalhes!</div></a>
        
        		</div>
        	</li>
            
        </ul>

    <?php  
        } 
        
        $PHP_SELF = $_SERVER['PHP_SELF'];
        
        $sigla = isset($_GET['sigla']) ? $_GET['sigla'] : '';
        $uf = isset($_GET['uf']) ? $_GET['uf'] : '';
        $city = isset($_GET['city']) ? $_GET['city'] : '';


        $prev = $pagina - 1;
        $next = $pagina + 1;
        // se página maior que 1 (um), então temos link para a página anterior
        if ($pagina > 1) 
        {
            $prev_link = "<a href=\"$PHP_SELF?sigla=$sigla&uf=$uf&city=$city&pagina=$prev\"> <li> << </li> </a>";
            $pg_inicio = "<a href=\"$PHP_SELF?sigla=$sigla&uf=$uf&city=$city&pagina=1\"> <li> < </li> </a> ";
        } 
        else 
        { // senão não há link para a página anterior
            $prev_link = "<li class='ativo'> << </li>";
            $pg_inicio = "<li class='ativo'> < </li>";
        }
        // se número total de páginas for maior que a página corrente, 
        // então temos link para a próxima página  
        if ($total_paginas > $pagina) {
            $totalPg = ceil($total_paginas);
            $next_link = "<a href=\"$PHP_SELF?sigla=$sigla&uf=$uf&city=$city&pagina=$next\"> <li> >> </li> </a>";
            $pg_ultima = " <a href=\"$PHP_SELF?sigla=$sigla&uf=$uf&city=$city&pagina=$totalPg\"> <li> > </li> </a>";
        } 
        else 
        { 
        // senão não há link para a próxima página
            $next_link = "<li class='ativo'> >> </li>";
            $pg_ultima = " <li class='ativo'> > </li>";
        }

        // vamos arredondar para o alto o número de páginas  que serão necessárias para exibir todos os 
        // registros. Por exemplo, se  temos 20 registros e mostramos 6 por página, nossa variável  
        // $total_paginas será igual a 20/6, que resultará em 3.33. Para exibir os  2 registros 
        // restantes dos 18 mostrados nas primeiras 3 páginas (0.33),  será necessária a quarta página. 
        // Logo, sempre devemos arredondar uma  fração de número real para um inteiro de cima e isto é 
        // feito com a  função ceil()/  
        $total_paginas = ceil($total_paginas);
          echo '<div class="paginacao-pesquisa"><ul>';
          $painel = "";
          for ($x=1; $x <= $total_paginas; $x++) 
          {
            if ($x == $pagina) 
            {
              //se estivermos na página corrente, não exibir o link para visualização desta página 
              //$painel .= " [$x] ";

              $painel .= "<li class='ativo'>$x</li>";  

            } 
            else 
            {
              $painel .= " <a href=\"$PHP_SELF?sigla=$sigla&uf=$uf&city=$city&pagina=$x\"><li>$x</li></a>";
            }
          }
        //$painel .= '</ul></div>';
        // exibir painel na tela
        echo "$pg_inicio $prev_link $painel $next_link $pg_ultima"; 
        echo '</ul></div>';     
    }else{
    ?>

        <br><div><h1 style="font:16px Trebuchet MS, Arial, Helvetica, sans-serif; margin-left:0px; padding:3px 6px; background:#4674B8; color:#FFF; border-radius:3px; margin-left:-15px; text-align:center">Nenhum Fornecedor Encontrado. Seja o primeiro da sua região a fazer o cadastro; </div>
        <!-- MAPA -->
        <?php 
        include_once 'mapa.php'; 
        ?> 
        <!-- FIM MAPA -->
    <?php
    }
    ?>
    </div>
    <!-- FIM RESULTADO DO FILTRO -->
    
    </form>
    
    <!--<div class="paginacao-pesquisa">
    	<ul>
        	<li class="ativo">1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
        </ul>
    
    </div>-->
        
    <div id="form_cotacao">
         <?php
         if($i > 0){
            if(isset($_SESSION['tipo']) and $_SESSION['tipo'] == 5){
         ?>
        	    <a id="btn_cotacao" href = "javascript:void(0)">
                <button class="btn_cotar"> Fazer Cotação </button></a>

                <script type="text/javascript">
                    $('#btn_cotacao').click(function(){
                        $('#light').css('display', 'block');
                        $('#fade').css('display', 'block');
                        $('#light .tags_cotar ul li').remove();
                        var check = $('[name="UIDL"]:checked');
                        var vals = [];
                        for(var i=0; i<check.length;i++){
                            $('#light .tags_cotar ul').append('<li>'+$(check[i]).attr('attr-name')+'</li>');
                            vals.push($(check[i]).val());
                        }

                        $('#anuncio_ids').val(vals.join(','));

                        $('html, body').animate({
                            scrollTop: $("#light").offset().top
                        }, 2000);
                    });
                </script>
        <?php

            }
        }
        ?>
        <!-- FORMULARIO DE COTAÇÃO - LIGHTBOX -->
        <div id="light" class="white_content">
        
        <div class="tags_cotar">
        	<ul>
                <span>Empresas Selecionadas:</span><br />
                <li>Normatel - Home Center</li>
                <li>Cimentos Nassau</li>
            </ul>
        </div>
        
        <table style=" width:500px; height:250px; margin:20px auto;">
        	<form method="post" action="cotacao.php">
                <input id="anuncio_ids" name="anuncio_ids" type="hidden" />
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
                <td >
                    <select style="width:100px; height:23px;" name="tipo">
            			<option value="" selected="selected">Qualquer Tipo</option>
            			<?php
                            $estados_cidades->db->query("
                                select * from tb_tipo_cimento order by dscricao
                            ");
                            while ( $obj = $estados_cidades->db->fetch_object($query) ){
                                echo '<option value="'.$obj->codigo.'">'.$obj->dscricao.'</option>';
                            }
                        ?>
                     </select>

                     <label>&nbsp; Marca:</label>
                     <select style="width:100px; height:23px;" name="marca">
            			<option value="" selected="selected"> Indiferente </option>
            			<?php
                            $estados_cidades->db->query("
                                select * from tb_marca_cimento order by descricao
                            ");
                            while ( $obj = $estados_cidades->db->fetch_object($query) ){
                                echo '<option value="'.$obj->codigo.'">'.$obj->descricao.'</option>';
                            }
                        ?>
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
                	 <select style="width:200px; height:23px;" name="tipo_entrega">
                        <?php
                            $estados_cidades->db->query("
                                select * from tb_tipo_entrega order by descricao
                            ");
                            while ( $obj = $estados_cidades->db->fetch_object($query) ){
                                echo '<option value="'.$obj->codigo.'">'.$obj->descricao.'</option>';
                            }
                        ?>
                    </select>
                </td>                
            </tr>
            
            <tr>
            	<td align="right"><label>Especifique o Local de Entrega:</label></td>
                <td><textarea name="endereco" cols="31" rows="2" style="resize:vertical;" placeholder="Rua, Bairro, Cidade, Estado etc..."></textarea></td>
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