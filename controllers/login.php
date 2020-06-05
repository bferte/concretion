<?php 

$template = 'login';




include '../conf/Database.php';

if(!isset($_SESSION['username'] )== 0) {
	header('Location: ../index.php');
}

if(isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']."ALS52KAO09");
// infos users
	try {
		$sql = "SELECT username,IsAdmin,id,password FROM users WHERE username = :username ";

		$stmt = $connect->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

	if (isset($user) && $user !== false) {
	
			

		
	//corresspondance password
		if(password_verify($_POST['password'], $user['password']))
		{
			
			$count = $stmt->rowCount();
			if($count == 1) {
			// Démarrage du module PHP de gestion des sessions.
				if(session_status() == PHP_SESSION_NONE)
				{        
					session_start();
				}
				$_SESSION['username'] = $username;
				$_SESSION['IsAdmin'] = $user['IsAdmin'];
				$_SESSION['id'] = $user['id'];
				
				
				header("Location: ../index.php");
				return;



		}
		else{
			//gestion des erreurs
			$errorMsg[]="Votre identifiant et/ou votre mot de passe est incorrect";
		}
		
		
			
			}else{
				
				$errorMsg[]="Votre identifiant et/ou votre mot de passe est incorrect";
			}
//
		}else{
			$errorMsg[]="Votre identifiant et/ou votre mot de passe est incorrect";
		}

//


		}
	
	

	catch(PDOException $e) {
		
		echo $e->getMessage();
	}
	
}

include '../layout.phtml';