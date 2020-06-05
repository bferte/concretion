<?php 

include '../conf/Database.php';

// Infos sur les videos

try {
$sql1 = "SELECT videos.id AS idVideo,name,content,user_id,username from videos 
            INNER JOIN users ON users.id = videos.user_id";


    $query = $connect->query($sql1);
    $videos = $query->fetchAll();
}
catch(PDOException $e) {
    echo $e->getMessage();
}





$template = 'formation';

include '../layout.phtml';