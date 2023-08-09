<?php
session_start();
include('../php/connect.php');
?>
<?php
if ($_SESSION['membername'] != '') {


    header("refresh: 600;");
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>IT SERVICE SYSTEM</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/T-11.png" />
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="./test.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!--Full Calender-->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.0.3/main.min.css" rel="stylesheet"></link>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
    <style>
section.home-section {
  background-image: url('../T.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
   </head>
<body>
<div class="sidebar">
    <div class="logo-details">
    <i class='bx icon'><img src="../T-11.png" class="navbar-brand-img h-100" alt="main_logo"></i>
        <div class="logo_name">IT SERVICE</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="./service.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Service</span>
        </a>
         <span class="tooltip">Service</span>
      </li>
      <li>
       <a href="./newwork.php">
         <i class='bx bx-calendar-plus' ></i>
         <span class="links_name">New Work</span>
       </a>
       <span class="tooltip">New Work</span>
     </li>
      <li>
       <a href="./borrow.php">
         <i class='bx bx-transfer-alt active' ></i>
         <span class="links_name active">Borrow</span>
       </a>
       <span class="tooltip active">Borrow</span>
     </li>
     <li>
       <a href="./history.php">
         <i class='bx bx-time active' ></i>
         <span class="links_name active">Service History</span>
       </a>
       <span class="tooltip active">Service History</span>
     </li>
     <li>
       <a href="./review.php">
         <i class='bx bx-star active' ></i>
         <span class="links_name active">Review</span>
       </a>
       <span class="tooltip active">Review</span>
     </li>
     <li>
       <a onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่?')" href="../logout.php">
         <i class='bx bx-log-out text-danger' ></i>
         <span class="links_name text-danger">Logout</span>
       </a>
       <span class="tooltip text-danger">Logout</span>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="container px-20 pt-20 pb-20">
      <div class="text text-white">New Project.</div>
      <form class="row gy-4" action="./newwork_db.php" method="POST" enctype="multipart/form-data">   <!--ประกาศให้ Form นี้ทำงานจาก create.php-->
                <div class="col-3">
                    <h5 for="membername" class="form-label text-white">ชื่อ - สกุล</h5>
                    <input type="text" class="form-control " id="membername" name="membername" value="<?php echo $_SESSION['membername'] ?>" readonly>
                </div>
                <div class="col-3">
                    <h5 for="dename" class="form-label text-white">แผนก</h5>
                    <input type="text" class="form-control " id="dename" name="dename" value="<?php echo $_SESSION['dename'] ?>" readonly>
                </div>
                <div class="col-3">
                    <h5 for="office" class="form-label text-white">สังกัด</h5>
                    <input type="text" class="form-control " id="office" name="office" value="<?php echo $_SESSION['office'] ?>" readonly>
                </div>
                <div class="col-md-3">
                    <h5 for="startdate" class="form-label text-white">วันที่ต้องการใช้งาน</h5>
                    <input type="date" name="startdate" id="startdate" class="form-control" value="" required>
                </div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-6">
                    <h5 for="project" class="form-label text-white">ชื่อโปรเจกต์</h5>
                    <input type="text" class="form-control " id="project" name="project" placeholder="ชื่อโปรเจกต์" required>
                </div>
                <div class="col-6">
                    <h5 for="project_img" class="form-label text-white">Upload Image</h5>
                    <input type="file" class="form-control " id="project_img" name="project_img" accept="image/x-png;image/gif;image/jpeg" required>
                </div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12">
                    <h5 for="remark" class="form-label text-white">รายละเอียดของโปรเจกต์</h5>
                    <textarea type="text" class="form-control " id="remark" name="remark" placeholder="รายละเอียดของโปรเจกต์" rows="5" required></textarea>
                </div>
                <div class="col-md-12">
                    <h5 type="hidden" for="enddate" class="form-label text-white"></h5>
                </div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <div class="col-12"></div>
                <!---------------------------------------------------------------------------------------------------------->
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-success">ตกลง</button>
                </div>
                </form>
                <br>
                <hr class="text-white">
                <legend class="text-center text-white">ตารางคิวงาน</legend>
                <br>
                <iframe src="../calender/" width="100%" height="800" border="0" scrolling="no" frameborder="0" style = "border:0px;overflow:hidden;"></iframe>
      </div>
  </section>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth'
  });
  calendar.render();
});
</script>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
  });

  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>

  <?php
  }else{
    echo '<script>alert("SESSION EXPIRED กรุณาเข้าสู่ระบบอีกครั้ง!!")</script>';
    header('Refresh:0; url=https://cjlinfo.com/');
  } ?>
                