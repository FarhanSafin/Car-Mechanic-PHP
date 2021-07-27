<?php
include_once 'connect.php';
session_start();
global $currDate;
$currDate = Date("yy-m-d");
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
</head>

<body class="covall">
    <div class="covall">
        <?php
        $query = "SELECT appointment.job_ID, appointment.uName, mechanicinfo.name, appointment.serialNo, appointment.engineNo, appointment.apt_date, appointment.Overridden
                        FROM appointment
                        INNER JOIN mechanicinfo ON appointment.mID = mechanicinfo.ID ORDER BY apt_date desc;";
        $result = mysqli_query($conn, $query);
        $datas = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }
        } ?>
        <table id="apts">
            <tr>
                <th>Mechanic Name</th>
                <th>Customer Name</th>
                <th>Car Serial No.</th>
                <th>Engine Number</th>
                <th>Appointment Date</th>
            </tr>
            <?php
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td>
                        <?php echo $data['name']; ?>
                    </td>
                    <td>
                        <?php echo $data['uName']; ?>
                    </td>
                    <td>
                        <?php echo $data['serialNo']; ?>
                    </td>
                    <td>
                        <?php echo $data['engineNo']; ?>
                    </td>
                    <td>
                        <?php echo $data['apt_date']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <p><a href="index.php"><b>Log Out</b></a></p>

</body>

</html>