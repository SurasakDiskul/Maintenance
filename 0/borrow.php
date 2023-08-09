<?php
    $res = mysqli_query($conn,'SELECT sum(borstatus)FROM tbborrowlist');
    $row = mysqli_fetch_row($res);
    $sum = $row[0];
?>
<!-- Skills-->
<section class="resume-section" id="Borrow">
                <div class="resume-section-content">
                    <h2 class="mb-5">Borrow Notebook<h6 class="text-danger">**จำนวนโน๊ตบุ๊คคงเหลือ <?php echo $sum ?> เครื่อง**</h6></h2>
                    <form class="row gy-4" action="./borrow_db.php" method="POST" enctype="multipart/form-data">   <!--ประกาศให้ Form นี้ทำงานจาก create.php-->
                <div class="col-4">
                    <input type="hidden" class="form-control " id="membername" name="membername" value="<?php echo $_SESSION['membername'] ?>" readonly>
                </div>
                <div class="col-4">
                    <input type="hidden" class="form-control " id="dename" name="dename" value="<?php echo $_SESSION['dename'] ?>" readonly>
                </div>
                <div class="col-4">
                    <input type="hidden" class="form-control " id="office" name="office" value="<?php echo $_SESSION['office'] ?>" readonly>
                </div>
                <div class="col-12">
                    <h5 for="remark" class="form-h5 text-dark">รายละเอียดของการยืมโน๊ตบุ๊ค</h5>
                    <textarea type="text" class="form-control " id="remark" name="remark" rows="5" placeholder="รายละเอียดของการยืมโน๊ตบุ๊ค" required></textarea>
                </div>
                <div class="col-md-2">
                    <h5 for="startdate" class="form-h5 text-dark">วันที่เริ่มยืม</h5>
                    <input type="date" name="startdate" id="startdate" class="form-control" value="" require>
                </div>
                
                <div class="col-md-2">
                    <h5 for="enddate" class="form-h5 text-dark">กำหนดคืน</h5>
                    <input type="date" name="enddate" id="enddate" class="form-control" value="" require>
                </div>            
                <div class="col-md-8">
                    <h5 type="hidden" for="enddate" class="form-h5 text-dark"></h5>
                </div>
                <div class="col-md-12">
                    <h5 type="hidden" for="enddate" class="form-h5 text-dark"></h5>
                </div>
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-success">ตกลง</button>
                    <!--<a target="_blank" href="http://171.103.161.10:8888/LoginERS/login.aspx">B-Plus</a>-->
                </div>
              </form>
                </div>
            </section>