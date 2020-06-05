<?php 

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$template = 'profil';
$userId = $_SESSION['id'];

include '../conf/Database.php';
 // videos validées
try {
    $sql1 = "SELECT  validated_training.user_id,video_id,created_at,name FROM validated_training 
                INNER JOIN users ON users.id = validated_training.user_id
                INNER JOIN videos ON videos.id = validated_training.video_id
                WHERE validated_training.user_id = :userId";

        $query = $connect->prepare($sql1);
        $query->execute(
        [
            'userId' => $userId
        ]

    );
    $formations = $query->fetchAll();


}
catch(PDOException $e) {
    echo $e->getMessage();
}


//liste videos

try {
    $sql2 = "SELECT  id,name
                FROM videos";
                

        $query = $connect->prepare($sql2);
        $query->execute( );
    $videos = $query->fetchAll();



}
catch(PDOException $e) {
    echo $e->getMessage();
}















include '../layout.phtml';