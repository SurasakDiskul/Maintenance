<?php
session_start();
include('../php/connect.php');
?>

<?php
if (isset($_POST['aa'])) {
    $aa = $_POST['aa'];


    $aa = $_POST['aa'];
    $code = ".CJL/";
    $sql99 = "SELECT * FROM `tbservicelist` WHERE `sername`='$aa'";
    $res = mysqli_query($conn,$sql99);
    $row99 = mysqli_fetch_assoc($res);
    //$dept = $row99['deptname'].'.';
    $dept = $row99['shortname'];
    $sql9 = "SELECT docid FROM `tbservicehistory` WHERE sername = '$aa';";
    $res = mysqli_query($conn,$sql9);
    $row9 = mysqli_num_rows($res);
    $maxId = substr($row9, -5);
    $maxId = ($maxId + 1); 
    $maxId = substr(".0000".$maxId, -5);
    $nextId = $dept.$code.$maxId; 

    $sql = "SELECT * FROM `tbservicelist` WHERE `sername`='$aa'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            echo "<input type='hidden' id='price' name='price' value='$row[price]'>"; 
            echo "<input type='hidden' id='docid' name='docid' value='$nextId'>";
    }
}else{
    echo "0";
}
}
?>