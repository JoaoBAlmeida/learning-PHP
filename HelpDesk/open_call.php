<?php 
	require_once "Scripts/validator.php"
?>
<!DOCTYPE html>
<html style="overflow-x: hidden;">
	<head>
		 <?php
		 	include_once "Scripts/links.php";
		 ?>
		<title></title>
	</head>
	<body style="overflow-x: hidden;">
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	    <?php
	    	include_once "Scripts/header_menu.php";
	    ?>

	    <div class="container">
	    	<div class="card">
	    		<div class="card-header bg-primary">
	    			Abertura de Chamado
	    		</div>
	    		<div class="card-body">
	    			<form method="post" action="Scripts/opening_call.php">
	    				<fieldset class="form-group">
	    					<label for="title">Titulo</label>
	    					<input type="text" name="title" placeholder="Assunto" class="form-control" required>
	    				</fieldset>
	    				<fieldset class="form-group">
	    					<label>Categorial</label>
	    					<select class="form-control" name="category">
	    						<option>Criação de usuário</option>
	    						<option>Impressora</option>
	    						<option>Hardware</option>
	    						<option>Software</option>
	    						<option>Rede</option>
	    					</select>
	    				</fieldset>
	    				<fieldset class="form-group">
	    					<label for="description">Descreva o Problema</label>
	    					<textarea class="form-control" name="description" placeholder="Descrição do problema" required rows="3"></textarea>
	    				</fieldset>

	    				<div class="row mt-5">
		    				<div class="col-md-6">
		    					<button class="btn btn-lg btn-outline-warning form-control" onclick="window.location.href='main_page.php'">
		    						Voltar
		    					</button>
		    				</div>
		    				<div class="col-md-6">
		    					<button class="btn btn-lg btn-outline-success form-control" type="submit">
		    						Abrir
		    					</button>
		    				</div>
		    			</div>
	    			</form>
	    		</div>
	    	</div>
	    </div>
	</body>
</html>