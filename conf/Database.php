<?php



$host = "localhost"; // nom hote
$user = "root"; // username bdd
$pass = ""; //mdp bdd
$db   = "bddtest6"; // nom bdd

try {
	$connect = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}
