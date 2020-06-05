<?php 

session_start();
//////////////////////////////   Infos de la video recherchée

if(!array_key_exists('id', $_GET) OR !ctype_digit($_GET['id']))
{
    header('Location: ../index.php');
    exit();
}


if ($_SESSION == !NULL) {
    $_SESSION['idVideo'] = $_GET['id']; 
}





include '../conf/Database.php';

try {
    $sql1 = "SELECT id,name,content,file_name from videos 
             WHERE  id = :idVideo";
    
    
       

        $query = $connect->prepare($sql1);
        $query->execute(
            [
                'idVideo' => $_GET['id']
            ]

        );
        $video = $query->fetch();



    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }









///////////////////////////////

$template = 'video';

include '../layout.phtml';

