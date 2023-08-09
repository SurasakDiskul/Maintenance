<?php 
    include('../php/connect.php');
    if(!isset($_GET['serid'])){
        header("location: ./");
        exit();
    }else{
        $sql = "DELETE FROM `tbservice` WHERE serid = '".mysqli_real_escape_string($conn, $_GET['serid'])."' ";
        if (mysqli_query($conn, $sql)) {
            echo '<script> alert("ยกเลิกรายการสำเร็จ")</script>';
            header('Refresh:0; url= ./index.php#History');
        } else {
            echo '<script> alert("ยกเลิกรายการไม่สำเร็จ")</script>';
            header('Refresh:0; url= ./index.php#History');
        }
    }
    mysqli_close($conn);
?>