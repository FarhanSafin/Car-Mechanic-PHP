<?php
session_start();
include_once 'connect.php';

if (empty($_SESSION['invalidSerial'])) {
    $_SESSION['invalidSerial'] = '';
}

if (empty($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
}

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" crossorigin="ff"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" />
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>

<body class="covall">
    <div class="covall">
        
        <form action="check.php" method="POST" id="bookingForm" name="bookingForm">
        <p><h1>Welcome <?php echo $_SESSION['userName']; ?></h1></p>
            <b>Please enter your Car serial number</b>
            <input class="info" type="text" name="carSerial" placeholder="Car serial number" required>
            <b>Please enter your Car engine number</b>
            <input class="info" type="text" name="engineNumber" placeholder="Car engine number" required>

            <div>
                <label for="date">Appointment date: </label>
                <input id="txtDate" class="dateNmechanic" type="text" name="aptDate" placeholder="Date" required>
            </div>
            <p style="margin-top: 50px; color:red"><?php echo $_SESSION['msg']; ?></p>
            <p style="margin-top: 50px; color:red"><?php echo $_SESSION['invalidSerial']; ?></p>
            <button name="submit" id="submitbtn">Check Availability</button>
            <p><a href="index.php">Log Out</a></p>
        </form>
    </div>
    
</body>

</html>

<script>
    $("#txtDate").datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        minDate: new Date()
    });
</script>