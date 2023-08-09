<!-- Experience-->
<section class="resume-section" id="Service">
                <div class="resume-section-content">
                    <h2 class="mb-5">Service</h2>
                    <form class="row gy-4" action="./service_db.php" method="POST" enctype="multipart/form-data">   <!--ประกาศให้ Form นี้ทำงานจาก create.php-->
                <div class="col-4">
                   
                    <input type="hidden" class="form-control " id="membername" name="membername" value="<?php echo $_SESSION['membername'] ?>" readonly>
                </div>
                <div class="col-4">
                    <input type="hidden" class="form-control " id="dename" name="dename" value="<?php echo $_SESSION['dename'] ?>" readonly>
                </div>
                <div class="col-4">
                    <input type="hidden" class="form-control " id="office" name="office" value="<?php echo $_SESSION['office'] ?>" readonly>
                </div>
                <div class="col-4">
                <h5 for="aa" class="form-label text-dark">ปัญหาที่พบ</h5>
                <select class="border border-secondary form-control form-select selectpicker" data-live-search="true" name="aa" id="aa" aria-placeholder="" required>
                <option value="" selected="" disabled="">ปัญหาที่พบ</option>
                <?php
                    $query2 = "select * from `tbservicelist`;";
                    $result2 = mysqli_query($conn, $query2);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                            <option value="<?php echo $row2['sername']?>"><?php echo $row2['sername']?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                </div>
                <div class="col-4">
                    <h5 for="issue_img" class="form-label text-dark">แนบรูปของปัญหาที่เกิดขึ้น</h5>
                    <input type="file" class="form-control " id="issue_img" name="issue_img" accept="image/jpg, image/jpeg, image/png" required>
                </div>
                <div class="col-md-4">
                    <?php $today = date("Ymd");
                          $today = date_create($today);
                          $today = date_format($today,"Y-m-d");
                    ?>
                    <h5 for="startdate" class="form-label text-dark">วันที่ต้องการรับบริการ</h5>
                    <input type="date" name="startdate" id="startdate" class="form-control" value="" min="<?php echo $today ?>" required>
                </div>
                <div class="col-12">
                    <h5 for="remark" class="form-label text-dark">รายละเอียดของปัญหา</h5>
                    <textarea type="text" class="form-control " id="remark" name="remark" placeholder="รายละเอียดของปัญหา" rows="3" required></textarea>
                </div>
                <div id="price" name="price">
                <input type="hidden" id="price" name="price">
                <input type="hidden" id="docid" name="docid">
                </div>
                
                <!---------------------------------------------------------------------------------------------------------->
                <div class="col-1">
                    <input type="checkbox" id="timer" name="timer">
                    <label class="text-dark" for="timer">ด่วน</label>
                </div>
                <div class="col-11"> 
                    <button type="submit" name="submit" class="btn btn-success">ตกลง</button>
                </div>
                </form>
                </div>
            </section>
            <script>
    $(document).ready(function() {

        $("#aa").change(function() {
            var aa = $("#aa").val();
              console.log(aa);

              $.ajax({
                type: "POST",
                url: "select.php", //ทำงานกับไฟล์นี้
                data: { aa : aa },
                success: function(data) {
                    $("#price").html(data);
                }
    });
});
});
</script>