<!-- TOPO -->
<?php include_once 'header.php'; ?>
<?
    if(isset($_SESSION['periodo_valor']) and isset($_SESSION["login"]) and !empty($_SESSION["login"])){
        $query = $listapagina->db->query("
            INSERT INTO carrinho 
            (usuario_id, checkout, referencia) VALUES
            ({$_SESSION['codigo']}, 'payment', '".md5(time())."')
        ");

        if($query){
            $query = $listapagina->db->query("
                select * from carrinho order by id DESC LIMIT 1
            ");
            
            $row  = $listapagina->db->fetch_assoc($query);
            
            $_SESSION['last_carrinho'] = $id = $row['id'];
            $_SESSION['last_referencia'] = $row['referencia'];
            
            foreach ($_SESSION['periodo_valor'] as $index => $value) {
                if($value=='0'){
                    continue;
                }
                $query = $listapagina->db->query("
                    select * from tb_opcoes_anuncio where id = ".$value." LIMIT 1
                ");

                $row   = $listapagina->db->fetch_assoc($query);
                $valor = $row['valor'];



                $listapagina->db->query("
                    INSERT INTO produtos_carrinho (carrinho_id, opcao_anuncio_id, quantidade, valor) VALUES
                    ({$id}, {$value}, 1, {$valor})
                ");
            }
            
            unset($_SESSION['periodo_valor']);
        }
    }
?> 
<!-- FIM TOPO -->

<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery.noConflict();
jQuery(function($){
   $("#num-cartao").mask("9999-9999-9999-9999");
   $("#cod-cartao").mask("999");
});
</script>


<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

<div class="carrinho_etapa-3"></div>

	<div id="corpo_pagamento">
		<div id="carrinho-pagamento-cartao">
         	<h3>PagSeguro</h3>
            
            <div class="form-pagamento-cartao">
            <form name="pagamento-cartao" method="" action="payment.php">
            	<input class="btn-finalizar" type="submit" value="Finalizar Compra" />
            </form>
            </div>
        </div>
      
	</div>
    <div class="btns-compra">
    <a href="identificacao-compra.php"><button class="btn-voltar">Voltar</button></a>
    </div>


</div>
<!-- FIM CORPO -->







<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->