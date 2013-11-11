<?
	require_once 'includes/configure.inc.php';
	require_once 'includes/class/paginas.inc.php';
	require_once("includes/pagseguro/source/PagSeguroLibrary/PagSeguroLibrary.php");
	$list = new paginas; 

	@session_start();


    if(isset($_SESSION['last_carrinho'])){
		$paymentRequest = new PagSeguroPaymentRequest();
	    $paymentRequest->setCurrency("BRL");

	    $query = $list->db->query("
	    	select p.*, t.*, o.periodo  from produtos_carrinho as p 
	    	inner join tb_opcoes_anuncio as o ON o.id = p.opcao_anuncio_id
	    	inner join tb_tipo_anuncio as t ON o.tipo_anucio_id = t.anu_codigo
	    	where carrinho_id = {$_SESSION['last_carrinho']}
	    ");

	    while ( $obj = $list->db->fetch_object($query) ){
	    	$paymentRequest->addItem($obj->anu_codigo, $obj->anu_nome." (".$obj->periodo.") Meses", $obj->quantidade, $obj->valor);
	    }
    	
    	$referencia = $_SESSION['last_referencia'];
    	$paymentRequest->setReference($referencia);

    	$sedexCode = PagSeguroShippingType::getCodeByType('SEDEX');
        $paymentRequest->setShippingType($sedexCode);

    	$paymentRequest->setShippingAddress(
            '61944460',
            'Rua belem',
            '355',
            'Casa',
            'Novo maranguaoe',
            'Maranguape',
            'CE',
            'BRA'
        );

        $paymentRequest->setRedirectUrl("http://127.0.0.1/cimentonline/confirmacao-compra.php");
        $paymentRequest->setNotificationURL("http://127.0.0.1/cimentonline/confirm-payment-pagseguro.php?referencia=".$referencia);  

        try {
            $credentials = new PagSeguroAccountCredentials("sousa.justa@gmail.com", "FD3C7617D29F4FA7A2C126676F99B772");
            $url = $paymentRequest->register($credentials);
            
            $list->db->query("
		    	update carrinho set checkout = 'confirmation'
                where id = {$_SESSION['last_carrinho']}
		    ");

            header("Location: ".$url);
        } catch (PagSeguroServiceException $e) {
            
      		foreach ($e->getErrors() as $key => $error) {  
		        echo $error->getCode(); // imprime o código do erro  
		        echo $error->getMessage(); // imprime a mensagem do erro  
		    }
            die($e->getMessage());
        }
    }
    else{
    	header("Location: index.php");
    }
    

?>