<?php
    require_once('php/connect.php');
    if(!isset($_GET['id'])){
        header("location: ./index.php");
        exit();
    }
    $ss = $_GET['id'];
    $sql = "SELECT * FROM tbform WHERE id = '$ss'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $file = $row['doc_form'];
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
    $sql1 = "DELETE FROM `tbform` WHERE id = '".mysqli_real_escape_string($conn, $_GET['id'])."' ";
        if (mysqli_query($conn, $sql1)) {
            echo '<script> alert("ดาวน์โหลดเอกสารสำเร็จ")</script>';
            header('Refresh:0; url= ./form.php');
        } else {
            echo '<script> alert("ดาวน์โหลดเอกสารไม่สำเร็จ")</script>';
            header('Refresh:0; url= ./form.php');
        }
?>
