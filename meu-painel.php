<!-- TOPO -->
<?php include_once 'header.php'; ?> 
<!-- FIM TOPO -->

<!-- // MENU DINAMICO DO PAINEL -->
<?php
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


<!-- STYLE LIGHTBOX -->
    <style>
        .black_overlay{display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:#4674b8; z-index:1001;
                        -moz-opacity:0.3; opacity:.30; filter:alpha(opacity=30);}
        .white_content{display:none; position:absolute; top:20%; left:38%; width:500px; height:auto; padding:16px; border:5px solid #4674b8;
                        border-radius:0 50px 0 50px; box-shadow:0 0 10px #000; background-color:white; z-index:1002; overflow:none;}
        .white_content label{font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#4674b8; margin-right:10px;}
        .white_content input{height:21px; padding:2px;}
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
            
            <table border="1">
                <tr>
                    <th width="250">Solicitante</th>
                    <th width="150">Tipo de Cimento</th>
                    <th width="220">Local de Entrega</th>
                    <th width="130">Data</th>
                    <th width="130">Preço</th>
                    <th></th>
                </tr>

                <tr>
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr class="azul">
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr>
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr class="azul">
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr>
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr class="azul">
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr>
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr class="azul">
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr>
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>

                <tr class="azul">
                    <td>Nome do Solicitante</td>
                    <td>Tipo do Cimento</td>
                    <td>Local para ser entregue</td>
                    <td>00/00/0000</td>
                    <td>R$00.000,00</td>
                    <td><a href="javascript:void(0)" onclick="document.getElementById('light-cotacao').style.display='block';document.getElementById('fade').style.display='block'">
                    <img src="css/img/icons/view-icon.png" width="20" height="20">
                    </a></td>
                </tr>
            </table>
            <div class="rodape-table">
                <a href="">1</a>
                <a href="" class="ativo">2</a> <!-- pagina selecionada, é só mudar a class -->
                <a href="">3</a>
                <a href="">4</a>
                <a href="">5</a>
            </div>
        </div>
        </div>
    <!-- FIM COTAÇÕES // -->



    <!-- // ANUNCIOS -->
        <div id="corpo_cotacao" style="display:<?php echo $MA ?>;">

            <div class="ident-cotacao">
                <h3>Meus Anuncios</h3>
            
                <div class="rodape-table">
                
                </div>
            </div>

        </div>
    <!-- FIM ANUNCIOS // -->



    <!-- // DADOS -->
        <div id="corpo_cotacao" style="display:<?php echo $DE ?>;">
            
            <div class="ident-cotacao">
                <h3>Dados da Empresa</h3>

                    <form action="" method="">
                    <table style="float:left;">
                        <tr>
                            <td><label>Nome da Empresa:</label></td>
                            <td><input name="empresa" type="text" size="40"></td>
                        </tr>
                        <tr>
                            <td><label>Endereço:</label></td>
                            <td><input name="endereco" type="text" size="40"></td>
                        </tr>
                        <tr>
                            <td><label>Cidade:</label></td>
                            <td><input name="cidade" type="text" size="40"></td>
                        </tr>
                        <tr>
                            <td><label>Estado:</label></td>
                            <td><input name="estado" type="text" size="40"></td>
                        </tr>
                        <tr>
                            <td><label>Telefone:</label></td>
                            <td><input name="telefone" type="text" size="40"></td>
                        </tr>
                        <tr>
                            <td><label>Email:</label></td>
                            <td><input name="email" type="email" size="40"></td>
                        </tr>
                        <tr>
                            <td><label>Site:</label></td>
                            <td><input name="site" type="text" size="40"></td>
                        </tr>
                        <tr>
                            <td><label style="position:absolute;">Institucional:</label></td>
                            <td><textarea cols="32" rows="3" name="institucional"></textarea></td>
                        </tr>
                    </table>
                    <table style="float:left; margin-left:20px;">
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
                                <img src="clientes/normatel/thumb-img1.png" width="90" height="90" style="border-radius:10px;" />
                                <img src="clientes/normatel/thumb-img2.png" width="90" height="90" style="border-radius:10px;" />
                                <img src="clientes/normatel/thumb-img3.png" width="90" height="90" style="border-radius:10px;" />
                                <img src="clientes/normatel/thumb-img4.png" width="90" height="90" style="border-radius:10px;" />
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
            <form method="POST" action="">
                <table>
                    <tr>
                        <td>
            <label>Solicitante:</label><br />
            <input name="solicitante" type="text" size="48" disabled="desabled" value="Teste" />
                        </td>
                        <td>
            <label>Marca:</label><br />
            <input name="marca" type="text" size="15" disabled="desabled" value="Teste" />
                        </td>
                    </tr>
                    <tr>
                        <td>
            <label>Tipo:</label><label style="margin-left:130px;">Quantidade:</label><br />
            <input name="tipo" type="text" size="20" disabled="desabled" value="Teste" />
            <input name="quantidade" type="text" size="20" disabled="desabled" value="Teste" style="margin-left:6px;" />
                        </td>
                        <td>
            <label>Data de Entrega:</label><br />
            <input name="data-entrega" type="text" size="15" disabled="desabled" value="Teste" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
            <label>Local de Entrega:</label><br />
            <input name="local" type="text" size="72" disabled="desabled" value="Teste" />
                        </td>
                    </tr>
                    <tr>
                        <td>
            <label>Tipo de entrega:</label><label style="margin-left:60px;">Prazo de Entrega:</label><br />
            <input name="tipo-entrega" type="text" size="20" disabled="desabled" value="Teste" />
            <input name="prazo" type="text" size="20" placeholder="Qual o Prazo?" style="margin-left:6px;" />
                        </td>
                        <td>
            <label>Preço:</label><br />
            <input name="preco" type="text" size="15" placeholder="Digite o Preço" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
            <label>Observação:</label><br />
            <textarea name="obs" cols="55" rows="5" placeholder="Digite aqui caso haja alguma observação para o solicitante."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
            <input class="btn-enviar" type="submit" value="Enviar" style="float:right;" />
                        </td>
                    </tr>
                </table>
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