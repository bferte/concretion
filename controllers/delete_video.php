<?php





if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
{
    header('Location: index.php');
    exit();
}

include '../conf/Database.php';


//Supression du fichier video

$sql0 = ' SELECT file_name
          FROM videos
          WHERE id = ?';


$stmt0 = $connect->prepare($sql0);
$stmt0->execute([$_GET['id']]);
$name = $stmt0->fetch();

unlink('../videos/'.$name[0]);



// Suppression de la video dans la bdd
$sql1 ='   DELETE FROM videos
           WHERE id = ?';




$stmt1 = $connect->prepare($sql1);


$stmt1->execute([$_GET['id']]);


// Redirection vers le panneau d'administration.
header('Location: profil.php');
exit();