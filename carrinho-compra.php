<!-- TOPO -->
<?php include_once 'header.php'; ?> 
<!-- FIM TOPO -->




<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

<div class="carrinho_etapa-1"></div>

	<div id="corpo_carrinho">

		<div class="topo-tabela">
        	<div class="discricao-produtos">Produto(s) no Meu Carrinho</div>
            <div class="qtd-produtos">Qtd.</div> 
            <div class="valor-unit-produtos">Valor Unit.</div> 
            <div class="valor-total-produtos">Valor Total</div>
        </div> 
        
        <div class="corpo-tabela">
            <?
                
                if(isset($_GET['periodo_valor']) and !empty($_GET['periodo_valor'])){
                    $_SESSION['periodo_valor'] = $_GET['periodo_valor'];

                    $periodo = implode(',', $_GET['periodo_valor']);

                    $query = $listapagina->db->query("
                        select o.*, t.* from tb_opcoes_anuncio as o 
                        inner join tb_tipo_anuncio as t ON (o.tipo_anucio_id = t.anu_codigo)
                        where o.id IN ({$periodo})
                    ");
                    
                    $total = 0;

                    while ( $obj = $listapagina->db->fetch_object($query) ){
                        echo '<ul>
                                <li class="corpo-disc-prod" style="width:460px; float:left; text-align:left; margin-left:10px;">
                                    '.$obj->anu_nome.' ('.$obj->anu_tamanho.') - '.$obj->periodo.' Meses
                                </li>
                                <li class="corpo-qnt-valor-prod" style="width:40px; float:left; text-align:right;">1</li>
                                <li class="corpo-qnt-valor-prod" style="width:110px; float:left; text-align:right;">R$ '.number_format($obj->valor,2,",",".").'</li>
                                <li class="corpo-qnt-valor-prod" style="width:120px; float:left; text-align:right;">R$ '.number_format($obj->valor,2,",",".").'</li>
                            </ul>';
                            $total += $obj->valor;
                    }
                }
                else{
                    $total = 0.00;
                }
            ?>
		</div>
        
        <div class="rodape-tabela"><small>TOTAL:</small> R$ <?=number_format($total,2,",",".")?></div>
      
	</div>
    <div class="btns-compra">
    <a href="#"><button class="btn-voltar">Voltar</button></a>
    <a href="identificacao-compra.php"><button class="btn-continuar">Continuar</button></a>
    </div>


</div>
<!-- FIM CORPO -->


<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->