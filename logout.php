<?php include('./php/connect.php');
session_start(); ?>
<?php session_destroy();
        echo '
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
echo '<script>
setTimeout(function() {
 swal({
     title: "ออกจากระบบสำเร็จ!",
     text: "กลับไปที่หน้า Login.",
     type: "warning",
     showConfirmButton: true
 }, function() {
     window.location = "https://cjlinfo.com/"; //หน้าที่ต้องการให้กระโดดไป
 });
}, 1000);
</script>';
?>


