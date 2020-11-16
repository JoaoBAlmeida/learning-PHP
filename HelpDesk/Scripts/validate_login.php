<?php

	session_start();
	$_SESSION['validated'] = false;
	
	$validate = false;
	$users_validate = array(
		//Only 100 and lower will be considered admin;
		array('id' => 153, 'email' => "teste01@modulusone.com", 'pswd' => "123456"),
		array('id' => 1, 'email' => 'teste02@modulusone.com', 'pswd' => '123456')
	);
	
	for ($i=0; $i < count($users_validate);  $i++) {
		if($users_validate[$i]['email'] == $_POST['email']){
			echo "<br> Correct Email <br>";
			if ($users_validate[$i]['pswd'] == $_POST['pswd']) {
				$validate = true;
				if($users_validate[$i]['id'] <= 100) $_SESSION['perfil'] = "admin";
				else $_SESSION['perfil'] = "user";
				$_SESSION['perfil_id'] = $users_validate[$i]['id'];
				$_SESSION['validated'] = "true";
				try{
					header("Location: ../main_page.php");
				}catch(Exception $e){
					header("Location: ../help_desk.php?email=true&pswd=true");
				}
				break;
			}
			else {
				echo $users_validate[$i]['pswd'];
				$validate = true;
				$_SESSION['validated'] = "false";
				header("Location: ../help_desk.php?email=true&pswd=false");
				break;
			}
		}else if($users_validate[$i]['email'] != $_POST['email']){
			$validate = false;
			$_SESSION['validated'] = "false";
		}
	}
	if(!$validate){
		header("Location: ../help_desk.php?email=false&pswd=false");
	}
	
?>