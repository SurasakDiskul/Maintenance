<?php session_start();
    require_once('../php/connect.php'); //เรียกใช้ Database
    if (isset($_POST['submit'])) {//Check if isset ว่าได้มีการกดปุ่ม submit หรือเปล่าถ้ากดให้ทำงานต่อไป
        echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    $date1 = date("Ymd_His");
    $office = $_SESSION['office'];
    $aa = $_POST['project'];
    $dept = $_POST['dename'];
    $timer = $_POST['timer'];
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['project_img']) ? $_POST['project_img'] : '');
    $upload=$_FILES['project_img']['name'];
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['project_img']['name'],".");
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //โฟลเดอร์ที่เก็บไฟล์
    $path="../project_img/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    if(move_uploaded_file($_FILES['project_img']['tmp_name'],$path_copy)){
        //ประกาศตัวแปร และ ใช้คำสั่งในการเพิ่มข้อมูลลง Table ใน Database
        $sql = "INSERT INTO `tbnewwork`(`membername` , `dename`, `office`, `project`, `remark`, `img`, `startdate`, `prostatus`) 
        VALUES (
                    '".$_POST['membername']."', 
                    '".$_POST['dename']."',
                    '".$_POST['office']."',
                    '".$_POST['project']."', 
                    '".$_POST['remark']."', 
                    '".$newname."', 
                    '".$_POST['startdate']."', 
                    'Wait'
                    )";
                    if (mysqli_query($conn, $sql)) { // if check ว่า insert ข้อมูลสำเร็จหรือไม่
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
                        $con = "$office แผนก $dept ขอเปิดโปรเจคใหม่\n";
                        $con2 = "เรื่อง : $aa\n";
                        $con3 = "\n";
                        $con4 = "วันที่ต้องการใช้งาน $timer\n";
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
}
    }
    mysqli_close($conn);
?>