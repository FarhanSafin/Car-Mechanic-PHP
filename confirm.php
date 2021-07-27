<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="covall">
    <div>

        <p> <b> Your appointment is done! See you soon.</b> </p>

        <p>Car No: <b> <?php echo $_SESSION['serial']; ?> </b></p>
        <p>engineNo: <b> <?php echo $_SESSION['engineNo']; ?> </b> </p>
        <p>Date: <b> <?php echo $_SESSION['date']; ?> </b> </p>
        <p>Mechanic: <b> <?php echo $_SESSION['mechanic']; ?> </b> </p>
        
    </div>
    <b>See you soon!</b>
    <a href="index.php"><b>Log Out</b></a>
    <a href="home.php"><b>Home</b></a>
</body>

</html>