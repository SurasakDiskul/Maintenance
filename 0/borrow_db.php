<?php session_start();
    require_once('../php/connect.php'); //เรียกใช้ Database
    if (isset($_POST['submit'])) {//Check if isset ว่าได้มีการกดปุ่ม submit หรือเปล่าถ้ากดให้ทำงานต่อไป
        $office = $_SESSION['office'];
        $aa = $_POST['remark'];
        $dept = $_POST['dename'];
        $startdate = $_POST['startdate'];
        echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
        //ประกาศตัวแปร และ ใช้คำสั่งในการเพิ่มข้อมูลลง Table ใน Database
        $sql1 = "INSERT INTO `tbborrow`(`membername` , `dename`, `office`, `remark`, `startdate`, `enddate`, `borstatus`) 
        VALUES (
                    '".$_POST['membername']."', 
                    '".$_POST['dename']."',
                    '".$_POST['office']."',
                    '".$_POST['remark']."', 
                    '".$_POST['startdate']."', 
                    '".$_POST['enddate']."', 
                    'Wait'
                    )";
                    if (mysqli_query($conn, $sql1)) { // if check ว่า insert ข้อมูลสำเร็จหรือไม่
                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);
                        date_default_timezone_set("Asia/Bangkok");
                        $sToken = "AtMZbsD2MjL8dZhHmHhoiavpgpi09mO5GjBiIg0fzAt";
                        $con = "";
                        $con2 = "";
                        $con3 = "";
                        $con4 = "";
                        $con5 = "";
                        $con = "$office แผนก $dept ขอยืมโน๊ตบุ๊ค\n";
                        $con2 = "หมายเหตุ : $aa\n";
                        $con3 = "วันที่เริ่มยืม $startdate\n";
                        $con4 = "\n";
                        $con5 = "กรุณากดเข้าอนุมัติได้ที่ https://cjlinfo.com\n";
                                        
                        $sMessage = $con . "" . $con2 . "" . $con3 . "" . $con4 . "" . $con5;
                                        
                        $chOne = curl_init();
                        curl_setopt($chOne, CURLOPT_URL,"https://notify-api.line.me/api/notify");
                        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($chOne, CURLOPT_POST, 1);
                        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
                        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
                        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                        $result = curl_exec($chOne);
                                        
                        if (curl_error($chOne)) {
                            echo 'error:' . curl_error($chOne);
                        } else {
                            $result_ = json_decode($result, true);
                            echo "status : " . $result_['status'];
                            echo "message : " . $result_['message'];
                        }
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "เพิ่มข้อมูลสำเร็จ!",
                                text: "เราจะแจ้งให้ผู้ดูแลระบบทราบ.",
                                type: "success",
                                timer: 2000,
                                showConfirmButton: false
                            }, function() {
                                window.location = "./index.php"; //หน้าที่ต้องการให้กระโดดไป
                            });
                            }, 1000);
                        </script>';
                    } else {  //ถ้าไม่สำเร็จให้แสดงหน้า ERROR
                        echo '<script>
                            setTimeout(function() {
                            swal({
                                title: "เพิ่มข้อมูลไม่สำเร็จ!",
                                text: "กรุณาตรวจสอบอีกครั้ง.",
                                type: "warning",
                                showConfirmButton: true
                            }, function() {
                                window.location = "./index.php"; //หน้าที่ต้องการให้กระโดดไป
                            });
                            }, 1000);
                            </script>';
                                                }
    }
    mysqli_close($conn);
?>