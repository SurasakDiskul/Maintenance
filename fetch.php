<?php
session_start();
?>
                    <div class="container1">
                        <?php 
                        if($_POST['request'] == '1'){

                            $request = $_POST['request']; ?>

                            <div class="container1">
                            <form action="./safety_db.php" method="POST" enctype="multipart/form-data">   <!--ประกาศให้ Form นี้ทำงานจาก create.php-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="membername" name="membername" value="<?php echo $_SESSION['membername'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <input class="form-control" type="date" id="startdate" name="startdate" required>
                                    <span class="form-label">Date - วันที่ตรวจ</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                                <select class="form-control form-select" name="place" id="place" >
                                  <option value="" disabled="" selected="">Select-Place</option>
                                  <option value="บริษัท">บริษัท</option>
                                  <option value="บ้านพัก">บ้านพักพนักงาน</option>
                        </select>
                                    <span class="select-arrow"></span>
                                </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="file" id="issue_img" name="issue_img" accept="image/jpg, image/jpeg, image/png" required>
                                        
                                </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                <input class="form-control" type="text" id="issue" name="issue" placeholder="Safety - บริเวณที่ทำ 2 ส." require>
                                </div>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button class="submit-btn" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                            </div>
                    </div>
                  
      <?php }elseif($_POST['request'] == '2'){ ?>
      
      <div class="container1">
      <form action="./safety_db.php" method="POST" enctype="multipart/form-data">   <!--ประกาศให้ Form นี้ทำงานจาก create.php-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="membername" name="membername" value="<?php echo $_SESSION['membername'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <input class="form-control" type="date" id="startdate" name="startdate" required>
                                    <span class="form-label">Date - วันที่ตรวจ</span>
                                </div>
                            </div>
                        </div>
                        
                            <input type="hidden" name="place" id="place" value="ถังดับเพลิง">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="file" id="issue_img" name="issue_img" accept="image/jpg, image/jpeg, image/png" required>
                                        
                                </div>
                                </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                <input class="form-control" type="text" id="issue" name="issue" placeholder="Safety - บริเวณที่ตรวจคุณภาพถังดับเพลิง" require>
                                </div>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button class="submit-btn" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                            </div>
                    </div>
                  
      <?php } ?>
<script type="text/javascript">
        $(document).ready(function(){
            $("#fetchval").on('change',function(){
            var value = $(this).val();
            console.log(value); 

            $.ajax({
                url:"fetch.php",
                type:"POST",
                data: 'request=' + value ,
                beforeSend:function(){
                    $(".container1").html("<span>   Working...</span>");
                },
                success:function(data){
                    $(".container1").html(data);
                }
                });
            });
        });
    </script>

