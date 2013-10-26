<?php
require_once("includes/phpmailer/class.phpmailer.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

if((isset($_POST['nome']) and !empty($_POST['nome'])) and 
	(isset($_POST['email']) and !empty($_POST['email'])) and 
	(isset($_POST['assunto']) and !empty($_POST['assunto'])) and 
	(isset($_POST['mensagem']) and !empty($_POST['mensagem'])) )
{

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "smtp.shsolutions.com.br";
	$mail->SMTPAuth = true;
	$mail->Username = "noreply@shsolutions.com.br";
	$mail->Password = "fsj@1500";
	$mail->From = "noreply@cimentonline.com.br";
	$mail->FromName = $assunto;
	//$mail->AddAddress("miltoncintra@gmail.com","Milton Cintra");
	//$mail->AddAddress("victor@victorcintra.com.br","Victor Cintra");
	$mail->AddAddress("sousa.justa@gmail.com","Sousa Justa");
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	//$nome     = ucwords("MONITORAMENTO");
	//$email 	  = "sousa.justa@gmail.com";
	$mail->AddReplyTo($email,$nome);
	$msg1 .= "<br><br>\n<b> Formulario de contato do site CIMENTONLINE</b><br><br>\n";
	$mail->Subject = $assunto;
	$mail->Body = $msg1.' '.$mensagem;

	if(!$mail->Send())
	{
		echo "<P>houve um erro ao  enviar o email! </P>".$mail->ErrorInfo;
	}
}

header('Location: contato.php');
//if($enviar) {
//echo "<script type='text/javascript'> alert('Contato Enviado com Sucesso!'); window.location.href='contato.html'; </script>";

//echo "<script type='text/javascript'> alert('Ocorreu algum erro ao enviar o formul&aacute;rio'); </script>";
//}

?>