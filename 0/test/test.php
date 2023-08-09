<?php
session_start();
include('../../php/connect.php');
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<select class="border border-secondary form-control selectpicker" data-live-search="true" name="aa" id="aa" required>
    <option value="1">1</option>
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


<select class="border border-secondary form-control selectpicker" data-live-search="true" name="bb" id="bb" >

    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>

</select>


<script>
     $("#aa").change(function() {
        var aa = $("#aa").val();
          console.log(aa); 

        $.ajax({
            type: "POST",
            url: "test.php", //ทำงานกับไฟล์นี้
            data: { aa: aa },
            success: function(data) {
                $("#bb").html(data);
            }
        });
    });
</script>


<?php
if (isset($_POST['aa'])) {
    $aa = $_POST['aa'];

    $sql_amphures = "select * from `tbservicelist` whare sername = '$aa';";
    $result_amphures = mysqli_query($conn, $sql_amphures);
    if (mysqli_num_rows($result_amphures) > 0) {
        foreach ($result_amphures as $row_amphures) {
            echo "<option value='$row_amphures[id]'>" . $row_amphures["price"] . "</option>";
        }
    }
}
?>