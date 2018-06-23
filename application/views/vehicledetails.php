<?php include 'partials/header.php' ?>
<style media="screen">
table,th, td{
  border: 1px solid black;

  padding:0 10px 0 10px;

}
th, td {
    border: 1px solid black;
    width: 200px;
}
</style>


<div class="container-fluid" >

    <h2>Vehicle Status</h2>
    <?php if($this->session->flashdata('success8')){?>  <!--get the flash data to this place-->
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success8'); ?>
      </div>
    <?php } ?>

    <div class="row">
      <div class="col-md-6">
        <br>

        <table>
          <tr>
            <th><strong>Vehicle No</strong></th>
            <th><strong>Reg No</strong></th>
            <th><strong>Vehicle Status</strong></th>

          </tr>

          <?php if ($result1){?>

          <?php foreach($result1 as $row1){?>
            <tr>
              <td><?php echo $row1['VehicleNo'];?></td>
              <td><?php echo $row1['RegNo'];?></td>
              <td><?php echo "Assigned";?></td>

            </tr>
          <?php }?>
          <?php }?>

          <?php if ($result2){?>
          <?php foreach($result2 as $row2){?>
          <tr>
            <td><?php echo $row2['VehicleNo'];?></td>
            <td><?php echo $row2['RegNo'];?></td>
            <td><?php echo "Not Assigned";?></td>
          </tr>
        <?php }?>
        <?php }?>
        </table>

      </div>
      <div class="col-md-6">
        <form action = "<?php echo site_url('Vehicledetails/viewdetails');?>" method = "POST">

          <div class="">
            <div class="form-group">
                <label for="pwd">Assigned Vehicle Details</label>
                <input type="text" class="form-control" placeholder="Vehicle No" name = "vehicleno" required>
            </div>

            <input type="submit"  class="btn btn-primary" name="submit" value="Search">

          </div>


      </form>
      <br>
      <br>
      <?php if (isset($res2)){?>
      <?php foreach($res2 as $row2){?>

      <div class="col-sm-5 col-xs-6 tital " >Assigned Employee ID:</div><div class="col-sm-7 col-xs-6 "><?php echo $row2['EmpID'];?></div>
      <div class="clearfix"></div>
      <div class="bot-border"></div>
      <br>
      <?php }?>
      <?php }?>
      <?php if (isset($res1)){?>
      <?php foreach($res1 as $row1){?>
      <div class="col-sm-5 col-xs-6 tital " >Assigned Employee Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['FirstName'];?></div>
      <div class="clearfix"></div>
      <div class="bot-border"></div>
      <br>
      <?php }?>
      <?php }?>
      <?php if (isset($res3)){?>
      <?php foreach($res3 as $row3){?>
      <div class="col-sm-5 col-xs-6 tital " >Vehicle Number:</div><div class="col-sm-7 col-xs-6 "><?php echo $row3['VehicleNo'];?></div>
      <div class="clearfix"></div>
      <div class="bot-border"></div>
      <br>

      <div class="col-sm-5 col-xs-6 tital " >Reg Number:</div><div class="col-sm-7 col-xs-6 "><?php echo $row3['RegNo'];?></div>
      <div class="clearfix"></div>
      <div class="bot-border"></div>
      <br>

      <div class="col-sm-5 col-xs-6 tital " >Brand:</div><div class="col-sm-7 col-xs-6 "><?php echo $row3['Brand'];?></div>
      <div class="clearfix"></div>
      <div class="bot-border"></div>
      <br>

      <div class="col-sm-5 col-xs-6 tital " >Model:</div><div class="col-sm-7 col-xs-6 "><?php echo $row3['Model'];?></div>
      <div class="clearfix"></div>
      <div class="bot-border"></div>
      <br>



      <div class="col-sm-5 col-xs-6 tital " >Owner ID:</div><div class="col-sm-7 col-xs-6 "><?php echo $row3['OwnerID'];?></div>
      <div class="clearfix"></div>
      <div class="bot-border"></div>
      <br>
      <?php }?>
      <?php }?>







      </div>


    </div>
    <br>
    <br>








</div>


<?php include 'partials/footer.php' ?>
