            <!-- Interests-->
            <section class="resume-section" id="NewProject">
                <div class="resume-section-content">
                    <h2 class="mb-5">New Project</h2>
                    <form class="row gy-4" action="./newwork_db.php" method="POST" enctype="multipart/form-data">   <!--ประกาศให้ Form นี้ทำงานจาก create.php-->
                <div class="col-3">
                    <input type="hidden" class="form-control " id="membername" name="membername" value="<?php echo $_SESSION['membername'] ?>" readonly>
                </div>
                <div class="col-3">
                    <input type="hidden" class="form-control " id="dename" name="dename" value="<?php echo $_SESSION['dename'] ?>" readonly>
                </div>
                <div class="col-3">
                    <input type="hidden" class="form-control " id="office" name="office" value="<?php echo $_SESSION['office'] ?>" readonly>
                </div>
                <div class="col-4">
                    <h5 for="startdate" class="form-label text-dark">วันที่ต้องการใช้งาน</h5>
                    <input type="date" name="startdate" id="startdate" class="form-control" value="" required>
                </div>
                <div class="col-4">
                    <h5 for="project" class="form-label text-dark">ชื่อโปรเจกต์</h5>
                    <input type="text" class="form-control " id="project" name="project" placeholder="ชื่อโปรเจกต์" required>
                </div>
                <div class="col-4">
                    <h5 for="project_img" class="form-label text-dark">Upload Image</h5>
                    <input type="file" class="form-control " id="project_img" name="project_img" accept="image/x-png;image/gif;image/jpeg" required>
                </div>
                <div class="col-12">
                    <h5 for="remark" class="form-label text-dark">รายละเอียดของโปรเจกต์</h5>
                    <textarea type="text" class="form-control " id="remark" name="remark" placeholder="รายละเอียดของโปรเจกต์" rows="5" required></textarea>
                </div>
                <div class="col-md-12">
                    <h5 type="hidden" for="enddate" class="form-label text-dark"></h5>
                </div>
                <!---------------------------------------------------------------------------------------------------------->
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-success">ตกลง</button>
                </div>
                </form>                </div>
            </section>