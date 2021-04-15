<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['current_user']))
{
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$current_user = $_SESSION['current_user'];
	$company_name = $_POST['company'];
	$designation = $_POST['designation'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];

		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO experience (user_id, company_name, designation, start_date, end_date)
					VALUES ('$current_user', $company_name', '$designation', '$start_date', '$end_date')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! Experience Saved')</script>";
				$company_name = "";
				$designation = "";
				$start_date = "";
				$end_date = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Already Exists.')</script>";
		}
		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Experience</title>

</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Experience Form</p>
			<div class="input-group">
				<input type="text" placeholder="Company_name" name="company" value="<?php echo $company_name; ?>" required>
			</div>
			<div class="input-group">
				<input type="designation" placeholder="Designation" name="designation" value="<?php echo $designation; ?>" required>
			</div>
			<div class="input-group">
				<label>Starting Date</label>
				<input type="date" placeholder="Starting_Date" name="start_date" value="<?php echo $start_date; ?>" required>
            </div>
            <div class="input-group">
            	<label>Ending Date</label>
				<input type="date" placeholder="End_Date" name="end_date" value="<?php echo $end_date; ?>" required>
            </div>
			<div class="input-group">
				<button name="submit" class="btn">Save</button>
			</div>
			<a href="welcome.php"><.Back</a>
		</form>
	</div>
</body>
</html>
