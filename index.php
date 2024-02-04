<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
<body>

	<a href="logout.php">Logout</a>
	<h1>WELCOME TO LEONE's WEBSITE</h1>

	<br>
	Hello, <?php echo $user_data['user_name']; ?>

	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="file">
		<button type="submit" name="submit">UPLOAD FILE</button>
	</form>

	<a href="userupload.php">Go to Personal File Page</a>
</body>
</html>