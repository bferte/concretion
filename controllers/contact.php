<?php
$template = 'contact';





$email = $_POST["email"];

if (isset($_POST['message'])) {
    if ($email === false) {
        echo '<p> Veuillez entrer un email Valide </p>';
    }
    else {
        $retour = mail('briac.ferte.pro@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'From: ' . $_POST['email']);
    }
    if ($retour) {
        
        header("Location: contact.php");
			return;
    }
    else{
        echo '<p>Erreur.</p>';
        }
            
     
    

   
}






include '../layout.phtml';


