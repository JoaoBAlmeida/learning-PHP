<?php
	require_once "validator.php";
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	$title = str_replace("#", "-", $_POST['title']);
	$category = $_POST['category'];
	$description = str_replace("#", "-", $_POST['description']);

	$arquivo = fopen("../calls.txt", 'a');
	fwrite($arquivo, $_SESSION['perfil_id'] . "#" . $title . "#" . $category . "#" . $description . PHP_EOL);
	fclose($arquivo);
	header("Location: ../main_page.php");
?>