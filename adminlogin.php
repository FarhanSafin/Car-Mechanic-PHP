<?php
include_once 'connect.php';
include_once 'function.php';

session_start();
if (empty($_SESSION['invalidAdminLogin'])) {
    $_SESSION['invalidAdminLogin'] = '';
}
unset($_SESSION['userName']);

if (isset($_POST['loginSubmit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['loginUname']);
    $pass = $_POST['loginPass'];

    $query = "SELECT * from adminlogin WHERE userName = '$username';";
    //echo $query;
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);



    if (mysqli_num_rows($result) == 1) {
        if ($row['password'] === $pass) {
            $_SESSION['adminName'] = $username;
            header('location: AdminPanel.php');
        }
    } else {
        $_SESSION['invalidAdminLogin'] = "Invalid username/password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>

<body class="covall">
    <div>
        <form action="" method="POST">
            <div>
                <p>Admin Login</p>
                <p> <input type="text" name="loginUname" placeholder="Username"></p>
                <p> <input type="password" name="loginPass" placeholder="Password"></p>
                <p style="text-align: center; color:red"><?php echo $_SESSION['invalidAdminLogin']; ?> </p>
                <p><input type="submit" name="loginSubmit" value="Submit"> </p>
                <p> Not an admin?<a href="index.php"> <b>User Login</b></a></p>
            </div>
        </form>
    </div>
</body>