<?php
session_start();
include('./php/connect.php');
?>
<?php
if ($_SESSION['membername'] != '') {
   $employee = $_SESSION['membername'];

    header("refresh: 600;");
?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Request Form - CJ</title>
                                <link rel="icon" type="image/x-icon" href="./T-11.png" />
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                                <link href='' rel='stylesheet'>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                <style>
body {
    background-size: cover;
    background-image: url('./bg.jpg');
}

.section {
    position: relative;
    height: 100vh;
}

.section .section-center {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}

#booking {
    font-family: 'Raleway', sans-serif;
}

.booking-form {
    position: relative;
    max-width: 642px;
    width: 100%;
    margin: auto;
    padding: 40px;
    overflow: hidden;
 
    background-size: cover;
    border-radius: 5px;
    z-index: 20;
}

.booking-form::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: -1;
}

.booking-form .form-header {
    text-align: center;
    position: relative;
    margin-bottom: 30px;
}

.booking-form .form-header h1 {
    font-weight: 700;
    text-transform: capitalize;
    font-size: 42px;
    margin: 0px;
    color: #fff;
}

.booking-form .form-group {
    position: relative;
    margin-bottom: 30px;
}

.booking-form .form-control {
    background-color: rgba(255, 255, 255, 0.2);
    height: 60px;
    padding: 0px 25px;
    border: none;
    border-radius: 40px;
    color: #fff;
    -webkit-box-shadow: 0px 0px 0px 2px transparent;
    box-shadow: 0px 0px 0px 2px transparent;
    -webkit-transition: 0.2s;
    transition: 0.2s;
}

.booking-form .form-control::-webkit-input-placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form .form-control:-ms-input-placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form .form-control::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form .form-control:focus {
    -webkit-box-shadow: 0px 0px 0px 2px #ff8846;
    box-shadow: 0px 0px 0px 2px #ff8846;
}

.booking-form input[type="date"].form-control {
    padding-top: 16px;
}

.booking-form input[type="date"].form-control:invalid {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form input[type="date"].form-control+.form-label {
    opacity: 1;
    top: 10px;
}

.booking-form select.form-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.booking-form select.form-control:invalid {
    color: rgba(255, 255, 255, 0.5);
}

.booking-form select.form-control+.select-arrow {
    position: absolute;
    right: 15px;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 32px;
    line-height: 32px;
    height: 32px;
    text-align: center;
    pointer-events: none;
    color: rgba(255, 255, 255, 0.5);
    font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
    content: '\279C';
    display: block;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
}

.booking-form select.form-control option {
    color: #000;
}

.booking-form .form-label {
    position: absolute;
    top: -10px;
    left: 25px;
    opacity: 0;
    color: #ff8846;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.3px;
    height: 15px;
    line-height: 15px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
}

.booking-form .form-group.input-not-empty .form-control {
    padding-top: 16px;
}

.booking-form .form-group.input-not-empty .form-label {
    opacity: 1;
    top: 10px;
}

.booking-form .submit-btn {
    color: #fff;
    background-color: #e35e0a;
    font-weight: 700;
    height: 60px;
    padding: 10px 30px;
    width: 100%;
    border-radius: 40px;
    border: none;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1.3px;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
}

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
    opacity: 0.9;
}
input[type=file] 
{
  width: 350px;
  max-width: 100%;
  color: #adadad;
  padding: 5px;
  background: #ffffff2e;
  border-radius: 10px;
  border: 1px solid #555;
}
input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #ff5e00;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #ff5e00;
}
.btn-warning,.btn-outline-warning:hover,.btn-warning:hover {
    color: #fff;
    background-color: #ff5e00;
    border-color: #ff5e00;
}
.btn-outline-warning {
    color: #ff5e00;
    background-color: transparent;
    background-image: none;
    border-color: #ff5e00;
}
.btn-outline-warning:not(:disabled):not(.disabled).active, .btn-outline-warning:not(:disabled):not(.disabled):active, .show>.btn-outline-warning.dropdown-toggle {
    color: #fff;
    background-color: #ff5e00;
    border-color: #ff5e00;
}
a {
    color: #ff5e00;
    text-decoration: none;
    background-color: #000000eb;
    -webkit-text-decoration-skip: objects;
}
a:hover{
    color: #ff5e00;
    text-decoration: none;
    background-color: #000000eb;
    -webkit-text-decoration-skip: objects;
}
</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js'></script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            
            <div class="row">
                
                
                <div class="booking-form">
               
                    <div class="form-header">
                    <div class="row justify-content-center">
                            <div class="col-4">
                                <span><a href="./index.php" class="btn btn-outline-warning btn-lg">Maintenance</a></span>
                            </div>
                            <div class="col-4">
                                <span><a href="./safety.php" class="btn btn-outline-warning btn-lg">Safe&Clean</a></span>
                            </div>
                            <div class="col-4">
                                <span><a href="./form.php" class="btn btn-warning btn-lg">Request Form</a></span>
                            </div>
                        </div>
                        <hr>
                        <h1>Request Form - CJ</h1>
                    </div>
                    <form action="./form_db.php" method="POST" enctype="multipart/form-data">   <!--ประกาศให้ Form นี้ทำงานจาก create.php-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="membername" name="membername" value="<?php echo $_SESSION['membername'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="place" name="place" placeholder="Department - แผนก" require>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <select class="form-control form-select js-example-basic-single" name="form" id="form" >
                                  <option value="" disabled="" selected="">Select-Form</option>
                                  <option value="FM005.0.HR-CJL.65 ใบลาออก cjp.pdf">ใบลาออก CJP</option>
                                  <option value="FM005.0.HR-CJL.65 ใบลาออก.pdf">ใบลาออก CJL</option>
                                  <option value="FM006.0.HR-CJL.65แบบสอบถามความคิดเห็นกรณีลาออก CJP.pdf">แบบสอบถามความคิดเห็นกรณีลาออก CJP</option>
                                  <option value="FM006.0.HR-CJL.65แบบสอบถามความคิดเห็นกรณีลาออก.pdf">แบบสอบถามความคิดเห็นกรณีลาออก CJL</option>
                                  <option value="FM017.0.HR-CJL.65แบบฟอร์มขออัตรากำลังคน.pdf">แบบฟอร์มขออัตรากำลังคน</option>
                                  <option value="FM022.0.HR-CJL.65 แบบรายงานการฝึกอบรม.pdf">แบบรายงานการฝึกอบรม</option>
                                  <option value="FM036.0.HR-CJL.66 แบบคำร้องทั่วไป.pdf">แบบคำร้องทั่วไป</option>
                                  <option value="FM041.0.HR-CJL.66 บันทึกข้อความ.pdf">บันทึกข้อความ</option>
                        </select>
                                    <span class="select-arrow"></span>
                                </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="remark" name="remark" placeholder="Remark - หมายเหตุ" require>
                                </div>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button class="submit-btn" type="submit" id="submit" name="submit">Submit</button>
                            <hr>
                            <a href="./form.php#download"><p class="text-white text-center">คลิกเพื่อดูรายการดาวน์โหลด</p></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="download">
<div class="card mb-4">
    <div class="card-header">
    <h2 class="text-center">Download Form</h2>
    </div>
            <div class="container1">
            <div class="card-body px-20 pt-20 pb-20">
              <div class="table-responsive p-0">
              <?php 
                    $membername = $_SESSION['membername'] ;
                    $i = 1;
                    $sql = "SELECT * FROM `tbform` WHERE membername = '$membername' and fstatus != 'Wait'";
                    $result = mysqli_query($conn,$sql);
                ?>
              <table id="service" class="table table-responsive" width="100%">
              <thead class="thead-light">
                  <tr>
                    <th width="5%">ID</th>
                    <th width="40%">Doc_Form</th>
                    <th width="50%">Remark </th>
                    <th width="5%"> Action </th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $row['form'] ?></td>
                  <td> <div id="mylayout_2"><?php echo $row['remark'] ?></div></td>
                  <td>
                  <a href="./download.php?id=<?php echo $row['id'] ?>" onclick="return confirm('คุณต้องการดาวน์โหลดไฟล์ใช่หรือไม่?')" class="btn"><i class="fa fa-download"></i> Download</a>
                  </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              </div>
            </div>
            </div>
          </div>
          </div>
                            </body>
                        </html>
                        <?php
  }else{
    echo '<script>alert("กรุณาเข้าสู่ระบบ!!")</script>';
    header('Refresh:0; url=https://cjlinfo.com/');
  } ?>