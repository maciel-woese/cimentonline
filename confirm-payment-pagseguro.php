<?
	require_once 'includes/configure.inc.php';
	require_once 'includes/class/paginas.inc.php';
	require_once("includes/pagseguro/source/PagSeguroLibrary/PagSeguroLibrary.php");
	$list = new paginas; 

	@session_start();

	class NotificationListener{
		var $list; 
	    public static function main($list){
	    	$this->list = $list;
	        $code = (isset($_POST['notificationCode']) && trim($_POST['notificationCode']) !== "" ?
	            trim($_POST['notificationCode']) : null);
	        $type = (isset($_POST['notificationType']) && trim($_POST['notificationType']) !== "" ?
	            trim($_POST['notificationType']) : null);

	        if ($code && $type) {

	            $notificationType = new PagSeguroNotificationType($type);
	            $strType = $notificationType->getTypeFromValue();

	            switch ($strType) {

	                case 'TRANSACTION':
	                    self::transactionNotification($code);
	                    break;

	                default:
	                    LogPagSeguro::error("Unknown notification type [" . $notificationType->getValue() . "]");

	            }

	            self::printLog($strType);

	        } else {

	            LogPagSeguro::error("Invalid notification parameters.");
	            self::printLog();

	        }

	    }

	    private static function transactionNotification($notificationCode)
	    {

	        $credentials = new PagSeguroAccountCredentials("sousa.justa@gmail.com", "FD3C7617D29F4FA7A2C126676F99B772");
	        try {
	            $transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificationCode);
	            
	            $status = $transaction->getStatus();  
            	$status = $status->getValue(); 
            	$transaction_id = $transaction->getCode();
            	$reference= $transaction->getReference(); 
            	
            	$list->db->query("
            		update carrinho set status = {$status}
		    		where transaction_id = '{$transaction_id}' or referencia = '{$reference}'
            	");

            	if($status=='3'){
            		$query = $list->db->query("
	            		select * from carrinho
			    		where transaction_id = '{$transaction_id}' or referencia = '{$reference}' LIMIT 1
	            	");

	            	$carrinho = $listapagina->db->fetch_assoc($query);
	            	$list->db->query("
	            		update tb_anuncios set ativo = 1, dt_ativacao = NOW()
			    		where carrinho_id = {$carrinho['id']}
	            	");

            	}

	        } catch (PagSeguroServiceException $e) {
	            die($e->getMessage());
	        }

	    }

	    private static function printLog($strType = null)
	    {
	        $count = 4;
	        echo "<h2>Receive notifications</h2>";
	        if ($strType) {
	            echo "<h4>notifcationType: $strType</h4>";
	        }
	        echo "<p>Last <strong>$count</strong> items in <strong>log file:</strong></p><hr>";
	        echo LogPagSeguro::getHtml($count);
	    }
	}

	NotificationListener::main($list);

?>