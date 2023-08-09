<?php 
session_start();
include('../php/connect.php');
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
<?php include('./css.php') ?>
</head>
<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include('./sidebar.php');?>
        <div class="main-content">
            <?php include('./navbar.php'); ?>
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Maintenance</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Maintenance</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle text-dark" data-toggle="dropdown"><?php echo $_SESSION['membername'] ?><i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"  onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่?')" href="../logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- overarea start -->
                <div class="row p-3">
      <div class="row">
        <div class="col-12">
        <h2>Maintenance List</h2>
        <hr>
          <div class="card mb-4">
            <div class="container1">
            <div class="card-body px-20 pt-20 pb-20">
              <div class="table-responsive p-0">
              <?php 
                    $i = 1;
                    $sql = "SELECT * FROM `tbmaintenance` where mtstatus !='Fully Complete' limit 20";
                    $result = mysqli_query($conn,$sql);
                ?>
              <table id="service" class="table table-responsive" width="100%">
              <thead class="thead-light">
                  <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Issue</th>
                    <th width="20%">Membername </th>
                    <th width="20%"> Place </th>
                    <th width="10%"> Date </th>
                    <th width="10%"> Status </th>
                    <th width="5%"> Action </th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $row['issue'] ?></td>
                  <td><?php echo $row['membername'] ?></td>
                  <td><?php echo $row['place'] ?></td>
                  <td><?php echo $row['startdate'] ?></td>
                  <td><?php echo $row['mtstatus'] ?></td>
                  <td>
                  <a class="btn text-center" name="modal" data-bs-toggle="modal" data-bs-target="#my-modal<?php echo $row['id'] ?>"><i class="fa fa-eye"></i></a>
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="my-modal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">รายละเอียด</h5>
                                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="modal-body">
                            <form class="row gy-4" action="./maintenance_db.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" class="form-control " id="id" name="id" value="<?php echo $row['id'] ?>" readonly>
                                <input type="hidden" class="form-control " id="startdate" name="startdate" value="<?php echo $row['startdate'] ?>" readonly>
                                <p class="text-center"><b>User : </b><?php echo $row['membername'] ?></p>
                                <p class="text-center"><b>Place : </b><?php echo $row['place'] ?></p>
                                <p class="text-center"><b>Issue :</b> <?php echo $row['issue'] ?></p>
                                <p class="text-center"><b>Remark :</b> <?php echo $row['remark'] ?></p>
                                <p class="text-center"><b>Maintenance Date :</b> <?php echo $row['startdate'] ?></p>
                                <hr>
                                <p class="text-center" style="border-width:3px; border-style:solid; border-color:#000; padding: 1em;"><a href="../issue_img/<?php echo $row['issue_img'] ?>" target="_blank"><img width="250" class="text-center" src="../issue_img/<?php echo $row['issue_img'] ?>" /></a></p>
                              </div>
                            <div class="modal-footer">
                               <div class="row">
                                <input type="text" class="form-control text-center" id="status" name="status" value="<?php echo $row['mtstatus'] ?>" readonly>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success" onclick="return confirm('คุณต้องการกดยืนยันใช่หรือไม่?')">ตกลง</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Modal end-->
                  <?php endwhile; ?>
                </tbody>
              </table>
              </div>
            </div>
            </div>
          </div>
        </div>
        <br>
        <div class="col-12">
        <h2>Maintenance List ( Fully Complete )</h2>
        <hr>
          <div class="card mb-4">
            <div class="p-1">
              
            </div>
            <div class="card-body px-20 pt-20 pb-20">
              <div class="table-responsive p-0">
              <?php 
                    $i = 1;
                    $sql = "SELECT * FROM `tbmaintenance` where mtstatus ='Fully Complete' order by id DESC limit 20";
                    $result = mysqli_query($conn,$sql);
                ?>
              <table id="service1" class="table table-responsive" width="100%" >
              <thead class="thead-light">
                  <tr>
                  <th width="5%">ID</th>
                    <th width="20%">Issue</th>
                    <th width="20%">Membername </th>
                    <th width="20%"> Place </th>
                    <th width="10%"> Date </th>
                    <th width="10%"> Status </th>
                    <th width="5%"> Action </th>
                  </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                  <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $row['issue'] ?></td>
                  <td><?php echo $row['membername'] ?></td>
                  <td><?php echo $row['place'] ?></td>
                  <td><?php echo $row['startdate'] ?></td>
                  <td><?php echo $row['mtstatus'] ?></td>
                  <td>
                  <a class="btn text-center" name="modal" data-bs-toggle="modal" data-bs-target="#my-modal1<?php echo $row['id'] ?>"><i class="fa fa-eye"></i></a>
                  </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="my-modal1<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">รายละเอียด</h5>
                                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="modal-body">
                            <form class="row gy-4" action="./maintenance_db.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" class="form-control " id="id" name="id" value="<?php echo $row['id'] ?>" readonly>
                                <input type="hidden" class="form-control " id="startdate" name="startdate" value="<?php echo $row['startdate'] ?>" readonly>
                                <p class="text-center"><b>User : </b><?php echo $row['membername'] ?></p>
                                <p class="text-center"><b>Place : </b><?php echo $row['place'] ?></p>
                                <p class="text-center"><b>Issue :</b> <?php echo $row['issue'] ?></p>
                                <p class="text-center"><b>Remark :</b> <?php echo $row['remark'] ?></p>
                                <p class="text-center"><b>Maintenance Date :</b> <?php echo $row['startdate'] ?></p>
                                <hr>
                                <p class="text-center" style="border-width:3px; border-style:solid; border-color:#000; padding: 1em;"><a href="../issue_img/<?php echo $row['issue_img'] ?>" target="_blank"><img width="250" class="text-center" src="../issue_img/<?php echo $row['issue_img'] ?>" /></a></p>
                              </div>
                            <div class="modal-footer">
                               <div class="row">
                                <input type="text" class="form-control text-center" id="status" name="status" value="<?php echo $row['mtstatus'] ?>" readonly>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Modal end-->
                  <?php endwhile; ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
      </div>
            </div>
            </div>

        </div>
        <!-- main content area end -->
        <?php include('./footer.php') ?>
    </div>
    <!-- page container area end -->
<?php include('./js.php') ?>
<script>
        $(document).ready(function() {
          $('#service1').DataTable( {
      "pagingType": "numbers"
    } )
  });
    </script>
  <script>
    $(document).ready(function() {
      $('#service').DataTable( {
      "pagingType": "numbers"
    } )
  });
  </script>
</body>

</html>
