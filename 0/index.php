<?php
session_start();
include('../php/connect.php');
$membername = $_SESSION['membername'];
?>
<?php
if ($_SESSION['membername'] != '') {

    header("refresh: 600;");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>IT SERVICE SYSTEM</title>
        <link rel="icon" type="image/x-icon" href="../T-11.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/r-2.4.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/r-2.4.0/datatables.min.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none"><?php echo $_SESSION['membername'] ?></span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../T-11.png" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#Service">Service</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#History">History</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#Borrow">Borrow Notebook</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#NewProject">New Project</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#Review">Review</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่?')" href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <?php include('./about.php') ?>
            <hr class="m-0" />
            <?php include('./service.php') ?>
            <hr class="m-0" />
<!-- Education-->
<section class="resume-section" id="History">
                <div class="resume-section-content">
                    <h2 class="mb-5">Service History</h2>
                    <div class="card-body px-20 pt-20 pb-20">
              <div class="table-responsive p-0">
              <?php 
                    $i = 1;
                    $sql = "SELECT * FROM `tbservice` where membername='$membername' ORDER BY `tbservice`.`serid` DESC";
                    $result = mysqli_query($conn,$sql);
                ?>
              <table id="test1" class="table table-responsive" width="100%">
              <thead>
                  <tr>
                    <th width="5%">ID</th>
                    <th width="5%">Issue</th>
                    <th width="10%">Remark </th>
                    <th width="20%"> Solution (วิธีแก้ไขปัญหา)</th>
                    <th width="15%"> ServiceDate </th>
                    <th width="10%"> Status </th>
                    <th width="5%">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $row['sername'] ?></td>
                  <td><?php echo $row['remark'] ?></td>
                  <td><?php echo $row['issue'] ?></td>
                  <td><?php echo $row['startdate'] ?></td>
                  <td><?php echo $row['serstatus'] ?></td>
                  <?php if ($row['serstatus'] != 'Fully Complete') {?>
                  <td><a href="delete_db.php?serid=<?php echo $row['serid'] ?>" class="btn btn-danger" name onclick="return confirm('คุณต้องการยกเลิกรายการใช่หรือไม่?')">Cancel</a></td>
                  <?php }else{ ?>
                  <td><button class="btn btn-success">Done</button></td>
                  <?php } ?>
                </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              </div>
            </div>
                </div>
            </section>
            <hr class="m-0" />
            <?php include('./borrow.php') ?>
            <hr class="m-0" />
            <?php include('./project.php') ?>
            <hr class="m-0" />
            <?php include('./review.php') ?>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
            <script>
        $(document).ready(function() {
            $('#test1').DataTable();
        });
    </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    </body>
</html>
<?php
  }else{
    echo '<script>alert("SESSION EXPIRED กรุณาเข้าสู่ระบบอีกครั้ง!!")</script>';
    header('Refresh:0; url=https://cjlinfo.com/');
  } ?>