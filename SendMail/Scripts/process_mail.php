<?php
	require "../Library/PHPMailer/Exception.php";
	require "../Library/PHPMailer/OAuth.php";
	require "../Library/PHPMailer/PHPMailer.php";
	require "../Library/PHPMailer/POP3.php";
	require "../Library/PHPMailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	class message{
		private $destiny = null;
		private $content = null;
		private $description = null;
		public $status = array('code' => null, 'info' => null);

		public function __set($attr, $value){
			$this->$attr = $value;
		}

		public function __get($attr){
			return $this->$attr;
		}

		public function valid_message(){
			if(empty($this->destiny) || empty($this->content) || empty($this->description)) return false;
			return true;
		}
	}

	$message = new message();
	$message->__set('destiny', $_POST['destiny']);
	$message->__set('content', $_POST['content']);
	$message->__set('description', $_POST['description']);

	if(!$message->valid_message()){
		echo 'message not valid!';
		header("Location: ../send_mail.php");
	}else{
		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = false;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp1.gmail.com';  					  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'webcompleto2@gmail.com';           // SMTP username
		    $mail->Password = '!@#$4321';                     // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('jpbarbosinha@gmail.com');
		    $mail->addAddress($message->__get('destiny'));     // Add a recipient (can be repeated)
		    //$mail->addReplyTo('info@example.com', 'Information'); //reply added automatically
		    //$mail->addCC('cc@example.com');
		    //$mail->addBCC('bcc@example.com');

		    //Attachments
		    /*
		    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		    */

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $message->__get('content');
		    $mail->Body    = $message->__get('description');
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    $message->status['code'] = 1;
		    $message->status['info'] = 'Message has been sent successfully';
		} catch (Exception $e) {
			$message->status['code'] = 0;
		    $message->status['info'] = 'Message could not be sent: ' . $mail->ErrorInfo;
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php require_once "links.php"; ?>
		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<title>Send Mail</title>
	</head>
	<body>
		<div class="container">
			<div class="text-center">
				<i class="far fa-paper-plane fa-4x text-primary"></i>
				<h3>Send Mail</h3>
				<p>Seu app de envios particulares</p>
			</div>

			<div class="row">
				<div class="col-md-12">
					<?php
						if($message->status['code'] == 1){
					?>
						<div class="container">
							<h1 class="display-4 text-sucess">Sucesso</h1>
							<p><?= $message->status['info']?></p>
							<a href="../send_mail.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>

					<?php } else if($message->status['code'] == 0) {?>
						<div class="container">
							<h1 class="display-4 text-danger">Ops!</h1>
							<p><?= $message->status['info']?></p>
							<a href="../send_mail.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</body>
</html>