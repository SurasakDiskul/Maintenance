<!-- Education-->
<section class="resume-section" id="education">
                <div class="resume-section-content">
                    <h2 class="mb-5">Service History</h2>
                    <div class="card-body px-20 pt-20 pb-20">
              <div class="table-responsive p-0">
              <?php 
                    $i = 1;
                    $sql = "SELECT * FROM `tbservice` where membername='$membername' and serstatus = 'Fully Complete' limit 10";
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
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              </div>
            </div>
                </div>
            </section>
