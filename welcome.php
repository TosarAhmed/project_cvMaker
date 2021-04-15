<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body background="bg.jpg">
    <?php echo "<h1>Welcome To CV Making Website</h1>"; ?>
    <a href="logout.php">Logout</a> 
</br></br>
    <a href="update.php">Update_Profile</a>
</br></br>
	<a href="experience.php">Experience</a>
</body>
</html>