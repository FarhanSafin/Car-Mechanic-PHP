<?php
include_once 'connect.php';
include_once 'function.php';

session_start();
if (empty($_SESSION['invalidLogin'])) {
    $_SESSION['invalidLogin'] = '';
}

if (isset($_POST['LogSubmit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    $query = "SELECT * from userlogin WHERE uName = '$username';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);



    if (mysqli_num_rows($result) == 1) {
        $checkPass = $row['password'];
        if (password_verify($pass, $checkPass)) {
            $_SESSION['userName'] = $username;
            header('location: home.php');
        } else {
            $_SESSION['invalidLogin'] = "Invalid username/password";
        }
    } else {
        $_SESSION['invalidLogin'] = "Invalid username/password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Mechanic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container sign-in-container">
		<form action="" method="POST">
			<h1>Sign In</h1>
			<input type="text" name="username" placeholder="Enter your Username" />
			<input type="password" name="password" placeholder="Enter your Password" />
            <p style="text-align: center; color:red"> <?php echo $_SESSION['invalidLogin']; ?> </p>
			<input type="submit" name="LogSubmit" value="Submit">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
				<h1>Hello, New</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp"><a href="register.php">Sign Up</a></button>
				<p><a href="adminlogin.php">Are you an admin?</a></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>