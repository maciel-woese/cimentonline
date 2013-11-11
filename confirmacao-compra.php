<!-- TOPO -->
<?php include_once 'header.php'; ?> 
<!-- FIM TOPO -->
<!--
<meta http-equiv="refresh" content="7; url=publicacao.php">
 FIM SCRIPT DE UF/CIDADES -->
<?
	$list = new paginas; 

	@session_start();


    if(isset($_SESSION['last_carrinho'])){
    	if(isset($_GET['transaction_id'])){
	    	$list->db->query("
		    	update carrinho set transaction_id = {$_GET['transaction_id']}
	            where id = {$_SESSION['last_carrinho']}
		    ");    		
    	}

		$paymentRequest = new PagSeguroPaymentRequest();
	    $paymentRequest->setCurrency("BRL");

	    $query = $list->db->query("
	    	select count(*) from carrinho where id = {$_SESSION['last_carrinho']} and status = 3
	    ");
		$row = $this->db->fetch_assoc($result);
		
	    if($row['count']>0){
	    	echo '<meta http-equiv="refresh" content="3; url=publicacao.php">';
	    }
?>

<hr style="height:3px; border:none; background:#4674B8; margin:10px 0 20px 0;" />

<!-- CORPO -->
<div id="corpo-compra">

<div class="carrinho_etapa-4"></div>


	<div style="font:30px 'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight:bold; margin:50px auto; width:500px; 
    text-align:center; color:#4674b8;">
    
    <img src="img/ok-icon-azul.png" width="150" height="150" /><br /><br />
    Aguardando Confirmação de Pagamento!<br />
    <!--<small style="font-size:16px; color:#AAA; font-weight:400;">
    Aguarde, você será redirecionado para a página de publicação.
    </small>-->
    
    </div>

    
</div>
<!-- FIM CORPO -->







<!-- RODAPÉ -->
<?php include_once 'footer.php'; ?> 
<!-- FIM RODAPÉ -->