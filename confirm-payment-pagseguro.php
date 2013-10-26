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

	        $credentials = new PagSeguroAccountCredentials("macielcr7@gmail.com", "958538F94ABA4EACA3DFEACA066F0114");
	        try {
	            $transaction = PagSeguroNotificationService::checkTransaction($credentials, $notificationCode);
	            
	            $status = $transaction->getStatus();  
            	$status = $status->getValue(); 
            	
            	$list->db->query("
            		update carrinho set status = {$status}
		    		id = {$_SESSION['last_carrinho']}
            	");

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