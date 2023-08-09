<?php
include 'conn.php'; // เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
include './thai_date.php';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./lib/jquery.fancybox.css" type="text/css" media="screen" />
<link href='./fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='./fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="./lib/jquery/dist/jquery.min.js"></script>
<script src='./lib/moment.min.js'></script>
<script src='./fullcalendar/fullcalendar.min.js'></script>
<script src='./lib/lang/th.js'></script>
<script src="./lib/jquery.fancybox.pack.js"></script>
</head>
<body>
    <?php
    if(isset($_GET['serid'])){
    $sql = "SELECT * FROM tbservice WHERE serid ='" . $_GET['serid'] . "' ";
    $result = $mysqli->query($sql);
    $rs = $result->fetch_object();

    if ($rs->timer == 'ด่วน') {
        $status =
            "<button class='btn btn-warning btn-sm'>" .
            "<i class='fa fa-check pr-2'></i> ด่วน </button>";
    } elseif ($rs->timer == 'ปกติ') {
        $status2 =
            "<button class='btn btn-success btn-sm'>" .
            "<i class='fa fa-remove pr-2'></i> ปกติ</button>";
    }
    ?>
    <div id="wrapper">
        <div class="row">
            <div class="col-lg-2">
                <div class="panel panel-sm">
                    <div class="panel-heading ">
                       <legend>รายละเอียดการขอรับบริการ    <span class="text-danger">สถานะงาน :<?php echo $rs->serstatus; ?></span></legend> <label> สถานะงาน </label>
                        <!--                            
                                <?php
                                echo $status;
                                echo '&nbsp;';
                                echo $status2;
                                ?>  -->

                        <?php if ($rs->timer == 'ปกติ') {
                            echo $status2;
                        } else {
                            echo $status;
                        } ?>
                    </div>
                    <div class="panel-body">
                        <h4> ผู้รับบริการ </h4>
                        <div class="alert alert-primary">
                        ชื่อ-สกุล :    <?php echo $rs->membername; ?>  ,   แผนก :   <?php echo $rs->dename; ?>     ,       สังกัด :   <?php echo $rs->office; ?>
                        </div>
                        <h4> วันที่ขอเข้ารับบริการ </h4>
                        <div class="alert alert-primary">
                            เริ่ม <?php echo thai(
                                        $rs->startdate
                                    ); ?>
                        </div>
                        <h4> ปัญหาที่พบ </h4>
                        <div class="alert alert-primary">
                            <?php echo $rs->sername; ?>
                        </div>
                        <h4>รายละเอียดการของปัญหา </h4>
                        <div class="alert alert-primary">
                            <?php echo $rs->remark; ?>
                        </div>
                        <h4>รูปของปัญหา</h4>
                        <div class="alert alert-primary">
                        <img width="250" class="text-center" src="../issue_img/<?php echo $rs->img ?>" />                       
                        </div>
                    </div><!-- .panel-body -->

                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-8 -->
        </div><!-- row -->
    </div><?php } ?>


    <?php
    if(isset($_GET['newid'])){
    $sql = "SELECT * FROM tbnewwork WHERE newid ='" . $_GET['newid'] . "' ";
    $result = $mysqli->query($sql);
    $rs = $result->fetch_object();

    ?>
    <div id="wrapper">
        <div class="row">
            <div class="col-lg-2">
                <div class="panel panel-sm">
                    <div class="panel-heading ">
                       <legend>รายละเอียดการของโปรเจค <span class="text-info">( หัวหน้าโปรเจค : <?php echo $rs->leader ?> )</span></legend>
                    </div>
                    <h3 class="text-danger">สถานะงาน :<?php echo $rs->prostatus; ?></h3>
                    <div class="panel-body">
                        <h4> ผู้ขอเปิดโปรเจค </h4>
                        <div class="alert alert-primary">
                        ชื่อ-สกุล :    <?php echo $rs->membername; ?>  ,   แผนก :   <?php echo $rs->dename; ?>     ,       สังกัด :   <?php echo $rs->office; ?>
                        </div>
                        <h4> วันที่กำหนดเสร็จงาน </h4>
                        <div class="alert alert-primary">
                            กำหนดเสร็จงานภายในวันที่  -    <?php echo thai(
                                        $rs->startdate
                                    ); ?>
                        </div>
                        <h4> ชื่อโปรเจค </h4>
                        <div class="alert alert-primary">
                            <?php echo $rs->project; ?>
                        </div>
                        <h4>รายละเอียดการของโปรเจค </h4>
                        <div class="alert alert-primary">
                            <?php echo $rs->remark; ?>
                        </div>
                        <h4>รูปภาพที่ถูกแนบมา</h4>
                        <div class="alert alert-primary">
                        <a href="../project_img/<?php echo $rs->img ?>" target="_blank"><img width="250" class="text-center" src="../project_img/<?php echo $rs->img ?>" /></a>                
                        </div>
                    </div><!-- .panel-body -->

                </div> <!-- panel panel-default -->
            </div> <!-- col-lg-8 -->
        </div><!-- row -->
    </div><?php } ?>
</body>

</html>