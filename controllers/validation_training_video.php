<?php


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}



$today = date("Y-m-d H:i:s");
$userId = $_SESSION['id'];
$videoId = $_SESSION['idVideo'];



include '../conf/Database.php';

//// verifie que la formation n'as pas deja été enregistré

try {
    $sql = "SELECT * FROM validated_training WHERE video_id = :video_id AND user_id = :user_id ";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':video_id', $videoId);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
}
catch(PDOException $e) {
    echo $e->getMessage();
}


//// enregistre la formation effectuée

$count = $stmt->rowCount();

if($count == 0) {

    try {
        $sql = "INSERT INTO validated_training (user_id,video_id,created_at)
                VALUES (:user_id,:video_id,:created_at)";

        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':video_id', $videoId);
        $stmt->bindParam(':created_at', $today);
        $stmt->execute();
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
echo "Success" ;




