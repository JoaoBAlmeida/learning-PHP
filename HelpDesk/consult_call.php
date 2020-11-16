<?php require_once "Scripts/validator.php"; ?>
<!DOCTYPE html>
<html style="overflow-x: hidden;">
	<head>
		<?php include_once "Scripts/links.php"; ?>
		<title>Consulta de Chamados</title>
	</head>
	<body style="overflow-x: hidden;">
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	    <?php include_once "Scripts/header_menu.php"; ?>

	    <div class="container">
	    	<div class="card">
	    		<div class="card-header">
	    			Consulta de Chamados
	    		</div>
	    		<div class="card-body">

	    			<?php
	    				$chamados = array();
	    				$arquivo = fopen("calls.txt", 'r');
	    				while(!feof($arquivo)){
	    					$registro = fgets($arquivo);
	    					$chamados[] = $registro;
	    				}
	    				fclose($arquivo);

	    				foreach ($chamados as $chamado) {
	    					$chamado_dados = explode("#", $chamado);
	    					if(count($chamado_dados) < 3) continue;
	    					if($_SESSION['perfil'] == 'user' && $_SESSION['perfil_id'] != $chamado_dados[0]) continue;
	    			?>

	    			<div class="card-body">
	    				<h3><?=$chamado_dados[1]?></h3>
	    				<h5><?=$chamado_dados[2]?></h5>
	    				<p><?=$chamado_dados[3]?></p>
	    			</div>
	    			<hr>

	    			<?php } ?>

	    			<button class="mt-5 btn btn-lg btn-warning w-100" onclick="window.location.href='main_page.php'">
	    				Voltar
	    			</button>
	    		</div>
	    	</div>
	    </div>
	</body>
</html>