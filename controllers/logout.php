<?php 

//deconnexion session

session_start();
session_destroy();

header('Location: ../index.php');

?>