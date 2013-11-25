<!-- TOPO -->
<?php 
    include_once 'header.php'; 
?> 
<!-- FIM TOPO -->


<?php 
            $action = '';
            if(isset($_POST['action']))   $action    =  $_POST['action'];
            if(isset($_GET['action']))    $action    =  $_GET['action'];

            switch($action){

                case 'FORCADASTRADOCOMSUCESSO':
                    echo '<div id="barra_titulo"><h1 style="font-size:16px; text-align:center">Usuário Cadastrado com Sucesso. Escolha pelo menos um tipo de banner. </div>';
                break;
            }
        ?> 
<!-- CORPO -->
<div id="corpo">

<div id="barra_titulo"><h1><font style="font-size:30px;">Prepare seu Anúncio </font><small><font style="font-size:19px;">- Selecione o tipo de inserção ideal para sua empresa.</font></small></h1></div>
	<div id="corpo-loja">

		<div id="tipo-anuncio-loja">
        	<h3>Escolha e combine as opções</h3>
            <div class="lista-anun-loja">
            <br />
            <form name="loja" method="" action="carrinho-compra.php">
            	<table width="255px">
                    <?php
                        $query = $listapagina->db->query("
                            select * from tb_tipo_anuncio;
                        ");
                        while ( $obj = $listapagina->db->fetch_object($query) ){
                           echo '<tr id="btn-anuncio-'.$obj->anu_codigo.'">
                                <td><input type="checkbox" value="'.$obj->anu_codigo.'" name="anu_codigo[]" /></td>
                                <td align="center"  style="padding-top:5px;">
                                <div style="width:144px; height:37px; background:#CCC; color:#FFF; border-radius:4px; font-size:12px; 
                                text-align:center; padding-top:8px;">
                                '.$obj->anu_nome.' <br /><small>('.$obj->anu_tamanho.')</small>
                                </div>
                                <select name="periodo_valor[]">
                                    <option value="0">Selecione uma opção</option>';
                                    $query2 = $listapagina->db->query("
                                        select * from tb_opcoes_anuncio where tipo_anucio_id = ".$obj->anu_codigo."
                                    ");
                                    while ( $obj2 = $listapagina->db->fetch_object($query2) ){
                                        echo '<option value="'.$obj2->id.'">R$ '.number_format($obj2->valor,2,",",".").' ('.$obj2->periodo.' Meses)</option>';
                                    }
                            echo '</select>                                
                                </td>
                            </tr>';
                        }
                    ?>
                </table>
                <input class="btn-anunciar" type="submit" value="Anunciar Agora" />
                </form>                            
            </div>
        </div>

		<!-- SCRIPT PREVIEW ANUNCIO -->
        	<script type="text/javascript">
            $(function(){
				$("#prev-1").hide();
				$("#prev-2").hide();
				$("#prev-3").hide();
				$("#prev-4").hide();
				$("#prev-5").hide();
			});
			
			$("#btn-anuncio-1").mouseover(function(){
				$("#prev-1").show();
			});
			$("#btn-anuncio-1").mouseout(function(){
				$("#prev-1").hide();
			});
			
			$("#btn-anuncio-2").mouseover(function(){
				$("#prev-2").show();
			});
			$("#btn-anuncio-2").mouseout(function(){
				$("#prev-2").hide();
			});
			
			$("#btn-anuncio-3").mouseover(function(){
				$("#prev-3").show();
			});
			$("#btn-anuncio-3").mouseout(function(){
				$("#prev-3").hide();
			});
			
			$("#btn-anuncio-4").mouseover(function(){
				$("#prev-4").show();
			});
			$("#btn-anuncio-4").mouseout(function(){
				$("#prev-4").hide();
			});
			
			$("#btn-anuncio-5").mouseover(function(){
				$("#prev-5").show();
			});
			$("#btn-anuncio-5").mouseout(function(){
				$("#prev-5").hide();
			});
            </script>
        <!-- FIM SCRIPT PREVIEW ANUNCIO -->
        
        
        <div id="preview-anuncio-loja">
        <img id="prev-1" src="img/preview/preview-1.png" />
        <img id="prev-2" src="img/preview/preview-2.png" />
        <img id="prev-3" src="img/preview/preview-3.png" />
        <img id="prev-4" src="img/preview/preview-4.png" />
        <img id="prev-5" src="img/preview/preview-5.png" />
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