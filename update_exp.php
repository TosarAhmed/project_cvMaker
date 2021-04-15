<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['current_user'])) {
    header("Location: update.php");
    
}

if (isset($_POST['submit'])) {
	$current_user = $_SESSION['current_user'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);

		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (user_id, username, email, address, phone, password)
					VALUES ('$current_user','$username', '$email', '$address', '$phone', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Update Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Already Updated.')</script>";
		}
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Update Profile</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="address" placeholder="Address" name="address" value="<?php echo $address; ?>" required>
			</div>
			<div class="input-group">
				<input type="phone" placeholder="Phone_Number" name="phone" value="<?php echo $phone; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
			<div class="input-group">
				<button name="submit" class="btn">Update</button>
			</div>
			<a href="register.php"><.Back</a></p>
		</form>
	</div>
</body>
</html>