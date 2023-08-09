<?php
    session_start();
    require_once('../php/connect.php');
    $doc = $_POST['form'];
    $docform = 'doc_form/'.$doc ;
    if (isset($_POST['submit'])) {
            $sql = "UPDATE `tbform` SET
            `doc_form` = '$docform' ,
            `fstatus` = 'Fully Complete'
            WHERE id = '".mysqli_real_escape_string($conn, $_POST['id'])."'";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Approve Successfully!!")</script>';
                header('Refresh:0; url=form.php');
            }else{
                echo '<script>alert("Approve Failed!!")</script>';
                header('Refresh:0; url=form.php');
            }
       
        }
        
