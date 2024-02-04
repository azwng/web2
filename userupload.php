

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <a href="index"></a>

    <?php
        session_start();
        include "db_conn.php";
        $id = $_SESSION['user_id'];
        $sql = "SELECT image_url FROM images WHERE user_id='$id'";
        $query  = mysqli_query($con, $sql);
       

        while ($row = mysqli_fetch_assoc($query)) {
            foreach($row as $image) {
                $path = './uploads/'.$image;
                echo '<img src="'.$path.'" /><br />';  
                
            }
        }
       

   ?>


</body>
</html>