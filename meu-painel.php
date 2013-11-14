<!-- TOPO -->
<?php 
    @session_start();
    require_once 'header.php'; 
    require_once 'includes/class/estados.inc.php';
    $estados_cidades = new estados; 
?> 
<!-- FIM TOPO -->

<!-- // MENU DINAMICO DO PAINEL -->
<?php
if(!isset($_GET['idmenu'])){
    $_GET['idmenu'] = '';
}

if($_GET['idmenu'] == 'cotacoes'){
        $MC = '';
    }
    else{
        $MC = 'none';
    }
if($_GET['idmenu'] == 'anuncios'){
        $MA = '';
    }
    else{
        $MA = 'none';
    }
if($_GET['idmenu'] == 'dados'){
        $DE = '';
    }
    else{
        $DE = 'none';
    }
?>
<!-- // MENU DINAMICO DO PAINEL -->


<!-- MASCARA INPUT  -->
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function($){
   $("#tel").mask("(99) 9999-9999");
   $("#cel").mask("(99) 9999-9999");
});
</script>
<!-- FIM MASCARA INPUT  -->


<!-- STYLE LIGHTBOX -->
    <style>
        .black_overlay{display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:#4674b8; z-index:1001;
                        -moz-opacity:0.3; opacity:.30; filter:alpha(opacity=30);}
        .white_content{display:none; position:absolute; top:20%; left:30%; width:500px; height:auto; padding:16px; border:5px solid #4674b8;
                        border-radius:0 50px 0 50px; box-shadow:0 0 10px #000; background-color:white; z-index:1002; overflow:none;}
        .white_content label{font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#4674b8; margin-right:10px;}
        .white_content input{height:21px; padding:2px;}
		.white_content_anuncio{display:none; position:absolute; top:20%; left:30%; width:auto; height:auto; padding:20px; border:5px solid #4674b8;
                        border-radius:0 50px 0 50px; box-shadow:0 0 10px #000; background-color:white; z-index:1002; overflow:none;}
        .white_content_anuncio label{font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#4674b8; margin-right:10px;}
        .white_content_anuncio input{height:21px; padding:2px;}
    </style>
<!-- FIM STYLE LIGHTBOX -->

<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-painel">

    <div class="menu-painel">
        <ul>
            <a href="?idmenu=cotacoes"><li><i class="iten-cotacao"></i>&nbsp; Minhas Cotações</li></a>
            <a href="?idmenu=anuncios"><li><i class="iten-anuncio"></i>&nbsp; Meus Anuncios</li></a>
            <a href="?idmenu=dados"><li><i class="iten-dados"></i>&nbsp; Dados da Empresa</li></a>
        </ul>
    </div>

    <div class="corpo-painel">

        <!-- // COTAÇÕES -->
        <div id="corpo_cotacao" style="display:<?php echo $MC ?>;">
        <div class="ident-cotacao">
            <h3>Minha Lista de Cotações</h3>
            
            <table border="1" style="width:98%!important">
                <tr>
                    <th width="250">Solicitante</th>
                    <th>Tipo de Cimento</th>
                    <th>Local de Entrega</th>
                    <th>Qtd Sacos</th>
                    <th>Data</th>
                    <th>Preço</th>
                    <th></th>
                </tr>
                <?php 
                    if(isset($_SESSION['login'])){
                        
                        $num_por_pagina = 5; 
                        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                        $primeiro_registro = ($pagina*$num_por_pagina) - $num_por_pagina;

                        $queryCount = $listapagina->db->query("
                            SELECT count(*) as total FROM `tb_cotacao` where cod_fornecedor = {$_SESSION['usu_codigo_id']}
                        ");

                        $row = $listapagina->db->fetch_assoc($queryCount);
                        
                        $query = $listapagina->db->query("
                            SELECT c.*, t.descricao, DATE_FORMAT(c.data_cadastro, '%d/%m/%Y') as data_cadastro 
                            FROM  `tb_cotacao` as c left join tb_tipo_cimento as t on (c.tp_cimento = t.codigo)
                            where cod_fornecedor = {$_SESSION['usu_codigo_id']} order by c.codigo desc
                        ");

                        $class = '';
                        while ( $obj = $listapagina->db->fetch_object($query) ){
                            $valor = number_format($obj->valor,2,",",".");
                            $local_string = implode('+', explode(' ', $obj->local_entrega));
                            echo "<tr class='{$class}'>
                                <td>".$obj->nm_solicitante."</td>
                                <td>".$obj->descricao."</td>
                                <td>".$obj->local_entrega."</td>
                                <td>".$obj->qtd_sacos."</td>
                                <td>".$obj->data_cadastro."</td>
                                <td>".$valor."</td>
                                <td style='width:50px;'>
                                    <a style='float:left;' href='javascript:void(0)' id='".$obj->codigo."' class='btn-cotacao-edit'>
                                        <img src='css/img/icons/view-icon.png' width='20' height='20'>
                                    </a>
                                    <a style='float:left;' href='cotacao_print.php?cotacao_id=".$obj->codigo."&center=".$local_string."' class='btn-cotacao-print'>
                                        <img src='css/img/icons/print-icon.png' width='20' height='20'>
                                    </a>
                                </td>
                            </tr>";

                            if($class==''){$class='azul';}
                            else{$class='';}
                        }

                        
                        $total_paginas = $row['total'] / $num_por_pagina;
                        $prev = $pagina - 1;
                        $next = $pagina + 1;

                        $total_paginas = ceil($total_paginas);
                    }
                ?>
            </table>
            <script type="text/javascript">
                $('.btn-cotacao-edit').click(function(){
                    var id = $(this).attr('id');
                    $('#cotacao_id').val(id);
                    $('#light-cotacao').css('display', 'block');
                    $('#fade').css('display', 'block');
                });
            </script>
            <?php 
                if(isset($total_paginas)){
                    echo '<div class="rodape-table">';
                    $painel = "";
                    for ($x=1; $x <= $total_paginas; $x++){
                        if($x==$pagina){
                            $painel .= "<a class='ativo' href='?idmenu={$_GET['idmenu']}&pagina=$x'>$x</a>";
                        }
                        else{
                            $painel .= "<a href='?idmenu={$_GET['idmenu']}&pagina=$x'>$x</a>";                            
                        }
                    }
                    
                    echo "$painel"; 
                    echo '</div>';                    
                }
            ?>
        </div>
        </div>
    <!-- FIM COTAÇÕES // -->



    <!-- // ANUNCIOS -->
        <div id="corpo_cotacao" style="display:<?php echo $MA ?>;">
        
        <style>
			*[name=anuncios]{padding:13px;}
        	*[name=anuncios] li{display:inline-block; margin:0 6px;}
			*[name=anuncios] li img{margin-bottom:5px;}
			*[name=anuncios] li span{float:left; font-size:10px;}
			*[name=anuncios] li button{float:right; padding:0 10px; background:#CCCCCC; border:1px solid #AAAAAA; border-radius:3px;}
			*[name=anuncios] li button:hover{background:#AAAAAA; cursor:pointer;}
			*[name=anuncios] li button:focus{background:#4674b8; color:#FFFFFF; border:1px solid #235BC5;}
			*[name=anuncios] li .status{border-radius:500px; display:block; position:absolute; z-index:9999; margin:-100px 0 0 5px;}
        </style>

            <div class="ident-cotacao">
                <h3>Meus Anuncios</h3>
            	
                <ul class="anuncios">
                    <?php 
                        if(isset($_SESSION['codigo'])){
                            $query = $listapagina->db->query("
                                select a.*, o.periodo from tb_anuncios as a
                                inner join produtos_carrinho as p ON (p.carrinho_id=a.carrinho_id)
                                inner join tb_opcoes_anuncio as o ON (p.opcao_anuncio_id=o.id)
                                where su_codigo = {$_SESSION['codigo']}
                            ");

                            while($row = $listapagina->db->fetch_object($query)){
                                $vencimento = date('d/m/Y', strtotime("+".$row->periodo." days", strtotime($row->dt_ativacao)));

                                if(strtotime($row->dt_ativacao) > time()){
                                    if($row->ativo=='1'){
                                        $img = '<img src="http://placehold.it/15x15/197D19&amp;text=&nbsp;" class="status" style="display:;" title="Ativo" />';
                                    }
                                    else if($row->ativo=='2'){
                                        $img = '<img src="http://placehold.it/15x15/0B7A96&amp;text=&nbsp;" class="status" style="display:;" title="Pendente" />';
                                    }
                                }
                                else{
                                    $img = '<img src="http://placehold.it/15x15/f80000&amp;text=&nbsp;" class="status" style="display:none;" title="Inativo" />';
                                }

                                echo '<li>
                                    <img width="200" height="100" src="http://placehold.it/200x100&amp;text='.$row->dsc_apresentacao.'" /><br />
                                    '.$img.'                                    
                                    <span>Vencimento: <b>'.$vencimento.'</b></span>
                                    <button codigo="'.$row->anun_codigo.'">Alterar</button>
                                </li>';
                            }
                        }
                    ?>
                </ul>

                <div class="rodape-table">               
                </div>
            </div>

<!-- // LIGHTBOX -->
    <div id="light-anuncio" class="white_content_anuncio">
            
            <center>
            <img src="http://placehold.it/550x110&amp;text=Banner (550x110)" />
            <br />
            <form name=""  method="POST" action="edit_anuncio.php" style="margin-top:10px;" enctype="multipart/form-data">
                <label>Selecione um arquivo:&nbsp;</label>
                <input name="logo" type="file" required="required" />
                <input name="codigo" id="anuncio_codigo" type="hidden" required="required" />
                <input class="btn" style="height:25px; float:right;" type="submit" value="Atualizar" />
            </form>
            </center>
        
    </div>

    <a href = "javascript:void(0)" onclick = "document.getElementById('light-anuncio').style.display='none';document.getElementById('fade-anuncio').style.display='none'">
    <div id="fade-anuncio" class="black_overlay"></div></a>
<!-- FIM LIGHTBOX // -->
		
        

        </div>
    <!-- FIM ANUNCIOS // -->



    <!-- // DADOS -->
        <div id="corpo_cotacao" style="display:<?php echo $DE ?>;">
            <?php
                if($_GET['idmenu']=='dados'){
                    $query = $listapagina->db->query("
                        SELECT * FROM `tb_fornecedor` where for_codigo = {$_SESSION['usu_codigo_id']}
                    ");
                    
                    $row = $listapagina->db->fetch_assoc($query); 
                              
                }
                else{
                    $row = array(
                        'for_dsc'=> '',
                        'for_endereco'=> '',
                        'est_codigo'=> '',
                        'cid_codigo'=> '',
                        'for_tel'=> '',
                        'for_cel'=> '',
                        'for_email'=> '',
                        'for_site'=> ''
                    );
                }
            ?>
            <div class="ident-cotacao">
                <h3>Dados da Empresa</h3>


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

    $('ul.anuncios li button').click(function(){
        $('#light-anuncioz').css('display', 'block');
        $('#fade-anuncio').css('display', 'block');
        $('#anuncio_codigo').val($(this).attr('codigo'));
    })
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


                    <form action="edit_fornecedor.php" method="post" enctype="multipart/form-data">
                    <table style="float:left;">
                        <tr>
                            <td><label>Nome da Empresa:</label></td>
                            <td><input name="empresa" type="text" size="40" value="<?=$row['for_dsc']?>"></td>
                        </tr>
                        <tr>
                            <td><label>Endereço:</label></td>
                            <td><input name="endereco" type="text" size="40" value="<?=$row['for_endereco']?>"></td>
                        </tr>
                        <tr>
                            <td><label>Estado:</label></td>
                            <td>
                                <select id="UF" name="estado" style="width:277px; height:30px; margin-top:5px; padding:5px;">
                                    <?php 
                                        $estados_cidades->getEstados($row['est_codigo']); 
                                    ?>
                                </select> 
                                <!--<input name="estado" type="text" size="40" value="<?=$row['est_codigo']?>">-->
                            </td>
                        </tr>
                        <tr>
                            <td><label>Cidade:</label></td>
                            <td>
                            	<span id="result_1" style="display: inline;">
                                <select id="city" name="cidade" style="width:277px; height:30px; margin-top:5px; padding:5px;">
                                <!--select id="cidade" name="cidade" style="width:277px; height:30px; margin-top:5px; padding:5px;"-->
                                    <?php 
                                        if($row['est_codigo'] != ""){
                                            $cidades = $estados_cidades->getArrayCidades($row['est_codigo']);
                                            foreach($cidades as $cidade){
                                                if($cidade['codigo']==$row['cid_codigo']){
                                                    echo '<option value="'.$cidade['codigo'].'" selected="selected">'.$cidade['cidade'].'</option>';
                                                }
                                                else{
                                                    echo '<option value="'.$cidade['codigo'].'">'.$cidade['cidade'].'</option>';
                                                }
                                            }
                                        }

                                    ?>
                                </select>
                                </span> 
                            </td>
                        </tr>
                        <tr>
                            <td><label>Telefone:</label></td>
                            <td><input id="tel" name="telefone" type="text" size="40" value="<?=$row['for_tel']?>"></td>
                        </tr>
                        <tr>
                            <td><label>Celular:</label></td>
                            <td><input id="cel" name="celular" type="text" size="40" value="<?=$row['for_cel']?>"></td>
                        </tr>
                        <tr>
                            <td><label>Email:</label></td>
                            <td><input name="email" type="email" size="40" value="<?=$row['for_email']?>"></td>
                        </tr>
                        <tr>
                            <td><label>Site:</label></td>
                            <td><input name="site" type="text" size="40" value="<?=$row['for_site']?>"></td>
                        </tr>
                    </table>
                    <table style="float:left; margin-left:20px;">
                        <tr style="height:60px;">
                        	<td>Logotipo:</td>
                            <td><input name="logo" type="file" style="width:240px;"></td>
                        </tr>
                        <tr>
                            <td><label>Galeria de Fotos:</label></td>
                            <td>
                            <input name="ft01" type="file" style="width:240px;"><br>
                            <input name="ft02" type="file" style="width:240px;"><br>
                            <input name="ft03" type="file" style="width:240px;"><br>
                            <input name="ft04" type="file" style="width:240px;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <br />
                                <label>Pré-Visualização de Imagens:</label>
                                <br /><br />
                                <?php 
                                    if(isset($row['ft01']) and !empty($row['ft01'])){echo '<img src="'.$row['ft01'].'" width="90" height="90" style="border-radius:10px;" />';}
                                    if(isset($row['ft02']) and !empty($row['ft02'])){echo '<img src="'.$row['ft02'].'" width="90" height="90" style="border-radius:10px;" />';}
                                    if(isset($row['ft03']) and !empty($row['ft03'])){echo '<img src="'.$row['ft03'].'" width="90" height="90" style="border-radius:10px;" />';}
                                    if(isset($row['ft04']) and !empty($row['ft04'])){echo '<img src="'.$row['ft04'].'" width="90" height="90" style="border-radius:10px;" />';}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <br />
                            <input type="submit" class="btn-atualizar" value="&nbsp;Atualizar&nbsp;">
                            </td>
                        </tr>
                    </table>
                    </form>

                <div class="rodape-table" style="float:left;">
                
                </div>
            </div>

        </div>
    <!-- FIM DADOS // -->

    </div>		
    
</div>
<!-- FIM CORPO -->



<!-- // LIGHTBOX COTAÇÃO-->
    <div id="light-cotacao" class="white_content">
        
        
        <div class="r-cotacao">
            <h3>Responder Cotação</h3>
            <div class="form-cotacao">
            <form method="POST" action="edit-cotacao-fornecedor.php">
                <table>
                    
                    <tr>
                        <td>
                            <input id="cotacao_id" name="cotacao_id" type="hidden" />
                            <label >Prazo de Entrega:</label><br />
                            <input name="prazo" type="text" size="20" placeholder="Qual o Prazo?" style="margin-left:6px;width:90%!important" />
                        </td>
                        <td>
            <label>Preço:</label><br />
            <input name="valor" type="text" size="15" placeholder="Digite o Preço" style="width:96%!important" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
            <label>Observação:</label><br />
            <textarea name="obs" cols="55" rows="5" placeholder="Digite aqui caso haja alguma observação para o solicitante."></textarea>
                        </td>
                    </tr>
             	</table>
            
            <div style="width:260px; height:50px; float:left; margin-top:5px;">   
            <label>Validade da Cotação:</label><br />
            <input name="validade" type="text" size="15" placeholder="Digite até quando está valido essa cotação" style="width:96%!important;" />
            </div>
			
            <input class="btn-enviar" type="submit" value="Enviar" style="float:right; margin-top:20px !important;" />

            </form>
            </div>             
        </div>
        
    </div>

    <a href = "javascript:void(0)" onclick = "document.getElementById('light-cotacao').style.display='none';document.getElementById('fade').style.display='none'">
    <div id="fade" class="black_overlay"></div></a>
<!-- FIM LIGHTBOX COTAÇÃO // -->



<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->