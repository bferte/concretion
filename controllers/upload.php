<?php

include '../conf/Database.php';
session_start();
    $errors = []; 

    $fileExtensionsAllowed = ['mp4','avi']; // extensions autorisés
    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];

    $name = $_POST['name'];
    $content = $_POST['content'];
    $userId = $_SESSION['id'];

    
    $fileNameExploded = explode('.',$fileName);
    $fileExtension = strtolower(end($fileNameExploded));


    $uploadPath = "../videos/". basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "Cette extension de fichier n'est pas autorisée. Veuillez uploadé un fichier mp4 ou avi.";
      }

      if ($fileSize > 100000000 ) {
        $errors[] = "Le fichier dépasse la taille maximale (100Mo)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        //upload ok  et ajout infos du fichier  dans la bdd
        if ($didUpload) {
          
          try {
              $sql = "INSERT INTO videos(name,content,user_id,file_name) VALUES (:name,:content,:user_id,:file_name)";
              $stmt = $connect->prepare($sql);
              $stmt->bindParam(':name', $name);
              $stmt->bindParam(':content', $content);
              $stmt->bindParam(':user_id', $userId);
              $stmt->bindParam(':file_name', $fileName);
              $stmt->execute();

              header("Location: ../index.php");
              return;
      
            }
            
            catch(PDOException $e) {
              echo $e->getMessage();
            }
          

          

          
          
          //
          echo "The file " . basename($fileName) . " a été uploadé";
        } else {
          echo "Une erreur est survenue. Veuillez contacter l'administrateur.";
        }
      } else {
        foreach ($errors as $error) {
          echo $error  . "\n";
        }
      }

    }