<?php
include_once 'connect.php';
include_once 'function.php';

session_start();
global $uNameMsg;
global $contactNoMsg;
global $nameMsg;
$continue = true;

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $add = mysqli_real_escape_string($conn, $_POST['address']);
    $contactNo = mysqli_real_escape_string($conn, $_POST['contactno']);
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    if (!checkName($name)) {
        $nameMsg = "Name must be alphabetic only";
        $continue = false;
    }

    if (!checkNumber($contactNo)) {
        $contactNoMsg = "Invalid phone number";
        $continue = false;
    }

    if (duplicateExists('userlogin', 'uName', $userName, $conn)) {
        $uNameMsg = "Username not available!";
        $continue = false;
    }

    if (!checkuName($userName)) {
        $uNameMsg = "Username can contain only numbers and letters";
        $continue = false;
    }

    if (duplicateExists('userinfo', 'cNumber', $contactNo, $conn)) {
        $contactNoMsg = "This number is already in use!";
        $continue = false;
    }

    if ($continue) {
        $query = "INSERT INTO userinfo (uName, name, address, cNumber) values (?, ?, ?, ?);";

        $statement = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($statement, $query)) {
            mysqli_stmt_bind_param($statement, "ssss", $userName, $name, $add, $contactNo);
            mysqli_stmt_execute($statement);
        }

        $query1 = "INSERT INTO userlogin (uName, password) values ('$userName' , '$hashedPass');";
        mysqli_query($conn, $query1);

        header('location: success.php');
    }
}
?>

















































<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
      <div class="row">
      <form action="" method="POST">
        <h1> Sign Up </h1>
        <br>
        
          <h1>Your Basic Info</h1>
        
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
          <p style="text-align : center; color : red"> <?php echo $nameMsg; ?> </p>
        
          <label for="address">Address:</label>
          <input type="text" id="mail" name="address" required>
       
          <label for="number">Contact No.:</label>
          <input type="number" id="password" name="contactno" required>
          <p style="text-align : center; color : red"> <?php echo $contactNoMsg; ?> </p>
          
          <label for="uname">Username:</label>
          <input type="text" id="mail" name="username" required>
          <p style="text-align : center; color : red"> <?php echo  $uNameMsg; ?> </p>
       
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" required>
        
          <input type="submit" value="Sign up" id="loginInputBtn" name="submit">
          <p>Already a user! <a href="index.php">Click here</a></p>
       </form>
        </div>
      </div>
      
    </body>
</html>
