<!DOCTYPE html>
<html>
	<head>
		<?php
			include_once "Scripts/links.php";
		?>

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="css/helpD.css">

		<title>Help Desk Login</title>
	</head>
	<body>
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	    <?php
	    	include "Scripts/header_menu.php";
	    ?>

	    <!-- Login Informations -->
    	<div class="container d-flex justify-content-center">
    		<div class="card my-auto">
    			<div class="card-header">
    				Login
    			</div>
				<div class="card-body">
					<form action="Scripts/validate_login.php" method="post">
						<fieldset class="form-group">
							<label for="user_email">Email Address</label>
							<input type="email" name="email" class="form-control" id="user_email" placeholder="Email" required>
							<small class="form-text text-muted">Ex: something@emailhost.com</small>
							<?php if(isset($_GET['email']) && $_GET['email'] == "false"){ ?>
								<small class="text-danger">Wrong Email</small>
							<?php }
							if(isset($_GET['email']) && $_GET['email'] == "true"){ ?>
								<small class="text-success">Correct Email</small>
							<?php } ?>
						</fieldset>
						<hr>
						<fieldset class="form-group">
							<label for="user_pswd">Password</label>
							<input type="password" name="pswd" class="form-control" id="user_pswd" placeholder="Password" required>
							<?php if(isset($_GET['pswd']) && $_GET['pswd'] == "false"){ ?>

								<small class="text-danger">Wrong Password</small>

							<?php }
							if(isset($_GET['pswd']) && $_GET['pswd'] == "true"){ ?>

								<small class="text-success">Correct Password</small>

							<?php } ?>
						</fieldset>
						<hr>
						<?php
							if(isset($_GET['email']) && $_GET['email'] == "error"){
						?>

						<div class="text-danger">
							Faça o login para acessar páginas protegidas
						</div>

						<?php } ?>
						<button type="submit" class="btn btn-lg btn-primary btn-lock form-control">Submit</button>
					</form>
				</div>
			</div>
    	</div>
	</body>
</html>