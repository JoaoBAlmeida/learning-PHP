<?php

	session_start();

	if(!isset($_SESSION['validated']) || $_SESSION['validated'] != "true"){
		header("Location: help_desk.php?email=error&pswd=error");
	}

?>