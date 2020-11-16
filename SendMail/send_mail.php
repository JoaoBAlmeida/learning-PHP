<!DOCTYPE html>
<html>
	<head>
		<?php require_once "Scripts/links.php"; ?>
		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
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
					<div class="card">
						<div class="card-body">
							<form action="Scripts/process_mail.php" method="post">
								<fieldset class="form-group">
									<label for="destiny"><strong>E-mail</strong></label>
									<input type="E-mail" name="destiny" class="form-control" placeholder="E-mail do destinatário" required>
								</fieldset>
								<fieldset class="form-group">
									<label for="content"><strong>Assunto</strong></label>
									<input type="text" name="content" class="form-control" placeholder="Assunto a tratar" required>
								</fieldset>
								<fieldset class="form-group">
									<label for="description"><strong>Descrição</strong></label>
									<textarea name="description" class="form-control" placeholder="Sua mensagem..." rows="6" required></textarea>
								</fieldset>
								<div class="row justify-content-center">
									<button type="submit" class="btn btn-outline-success">Enviar Mensagem</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<hr>
			<p style="float: left;"><strong>Made By:</strong> <em>João Pedro Barbosa de Almeida</em></p>
			<span style="float: right;">01/08/2020</span>
		</footer>
	</body>
</html>