<?php 

//Inscription

$template = 'signup';



error_reporting(0);
include '../conf/Database.php';



$username 		 = $_POST['username'];
$email 			 = $_POST['email'];







if (!empty($_POST)) {
	$password 		 = password_hash($_POST['password'],PASSWORD_BCRYPT);

	if (!empty($username) && !empty($email) && !empty($password)) {
		
		if(isset($username, $email, $password) ) {
			
			if( filter_var($email,FILTER_VALIDATE_EMAIL) ) {
				if($_POST['password'] == $_POST['confirmPassword']) {
					try {
						$sql = "SELECT * FROM users WHERE username = :username OR email = :email";
						$stmt = $connect->prepare($sql);
						$stmt->bindParam(':username', $username);
						$stmt->bindParam(':email', $email);
						$stmt->execute();
					}
					catch(PDOException $e) {
						echo $e->getMessage();
					}

					$count = $stmt->rowCount();
					if($count == 0) {
						try {
							$sql = "INSERT INTO users SET username = :username, email = :email, password = :password";
							$stmt = $connect->prepare($sql);
							$stmt->bindParam(':username', $username);
							$stmt->bindParam(':email', $email);
							$stmt->bindParam(':password', $password);
							$stmt->execute();
						}
						catch(PDOException $e) {
							echo $e->getMessage();
						}
						//gestion des erreurs
						if($stmt) {
							
							$registerMsg="Félicitations vous êtes inscrit !";
							
						}
					}else{
						
						$errorMsg[]="Le nom d'utilisateur et l'e-mail ont déjà été utilisés!";				
					}
				}else{
									
					$errorMsg[]="Les mots de passe ne sont pas les mêmes";
				}
			}else{
				
				$errorMsg[]="Email Invalide";
			}
		}

	}else{
		$errorMsg[]="Veuillez remplir les champs";
	}
}

include '../layout.phtml';