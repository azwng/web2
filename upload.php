<?php
if(isset($_POST['submit']) && isset($_FILES['file'])){
    include "db_conn.php";
    session_start();
    $file = $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'txt');
    $user_id =  $_SESSION['user_id'];
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                //header("Location: index.php?uploadsuccess");

                // insert into Database
                $sql = "INSERT INTO images(image_url,user_id) VALUES('$fileNameNew','$user_id')";
                mysqli_query($con, $sql);
                header("Location: userupload.php");
                echo $sql;
                die;


            }else{
                echo "Your file is too big.";
            }

        }else{
            echo "There was an error uploading your file!";
        }
    }else{
        echo "You cannot upload file of this type.";
    }



}else{
    header("Location: index.php");
}

?>