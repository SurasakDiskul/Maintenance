<?php
    session_start();
    require_once('../php/connect.php');
    if (isset($_POST['submit'])) {
        if($_POST['status'] == 'Wait'){
            $sql = "UPDATE `tbsafety` SET
            `ststasus` = 'Partial'
            WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Update Status Successfully!!")</script>';
                header('Refresh:0; url=clean.php');
            }else{
                echo '<script>alert("Update Status Failed!!")</script>';
                header('Refresh:0; url=clean.php');
            }
        }else if($_POST['status'] == 'Partial'){
            $sql1 = "UPDATE `tbsafety` SET
            `ststasus` = 'Fully Complete'
            WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
            if (mysqli_query($conn, $sql1)) {
                echo '<script>alert("Maintenance Fully Complete!!")</script>';
                header('Refresh:0; url=clean.php');
            }else{
                echo '<script>alert("Maintenance Failed!!")</script>';
                header('Refresh:0; url=clean.php');
            }
        }
        }
