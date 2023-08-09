<?php session_start();
    require_once('../php/connect.php'); //เรียกใช้ Database
    if (isset($_POST['submit'])) {//Check if isset ว่าได้มีการกดปุ่ม submit หรือเปล่าถ้ากดให้ทำงานต่อไป
        echo '
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
            if($_POST['timer'] == ''){
                $timer = 'ปกติ';
            }else{
                $timer = 'ด่วน';
            }
    $date1 = date("Ymd_His");
    $office = $_SESSION['office'];

    $aa = $_POST['aa'];
    $dept = $_POST['dename'];
    $remark = $_POST['remark'];
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['issue_img']) ? $_POST['issue_img'] : '');
    $upload=$_FILES['issue_img']['name'];
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['issue_img']['name'],".");
    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //โฟลเดอร์ที่เก็บไฟล์
    $path="../issue_img/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    if(move_uploaded_file($_FILES['issue_img']['tmp_name'],$path_copy)){
        $sql9 = "INSERT INTO `tbservicehistory`(`docid`, `sername`) 
        VALUES (
                    '".$_POST['docid']."', 
                    '".$_POST['aa']."'
                    )";
        $result9 = mysqli_query($conn,$sql9); 
        //ประกาศตัวแปร และ ใช้คำสั่งในการเพิ่มข้อมูลลง Table ใน Database
        $sql1 = "INSERT INTO `tbservice`(`docid` ,`sername` , `remark`, `price`, `membername`, `dename`, `office`, `img`, `serstatus`, `timer`, `startdate`) 
        VALUES (
                    '".$_POST['docid']."', 
                    '".$_POST['aa']."', 
                    '".$_POST['remark']."',
                    '".$_POST['price']."',
                    '".$_POST['membername']."',
                    '".$_POST['dename']."', 
                    '".$_POST['office']."', 
                    '".$newname."', 
                    'Wait',
                    '".$timer."', 
                    '".$_POST['startdate']."'
                    )";
                    if (mysqli_query($conn, $sql1)) { // if check ว่า insert ข้อมูลสำเร็จหรือไม่
                        $sToken = "AtMZbsD2MjL8dZhHmHhoiavpgpi09mO5GjBiIg0fzAt";
                        $sMessage = "$office แผนก $dept ได้มีการเพิ่มรายการ Service\n";
                        $sMessage .= "ปัญหา $aa\n";
                        $sMessage .= "เรื่อง $remark\n";
                        $sMessage .= "ระยะเวลาในการดำเนินงาน $timer\n";
                        $sMessage .= "กรุณากดเข้าอนุมัติได้ที่ https://cjlinfo.com";
                        $imageFile = new CURLFILE("../issue_img/$newname");
                
                        $data  = array(
                            'message' => $sMessage,
                            'imageFile' => $imageFile
                        );
                
                        
                        $chOne = curl_init(); 
                        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                        curl_setopt( $chOne, CURLOPT_POST, 1); 
                        curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data); 
                        $headers = array( 'Content-type: multipart/form-data', 'Authorization: Bearer '.$sToken.'', );
                        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                        $result = curl_exec( $chOne ); 
                
                        if ($result) {
                            $_SESSION['success'] = "ส่งข้อมูลแจ้งเตือน Line Notify เรียบร้อยแล้ว!";
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
                        } else {
                            $_SESSION['error'] = "ส่งข้อมูลแจ้งเตือนผิดพลาด!";
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
