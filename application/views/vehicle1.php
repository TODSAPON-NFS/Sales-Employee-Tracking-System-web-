<?php include 'partials/header.php' ?>

<style media="screen">
#image{
    border-style:solid;
    border-width:5px;
    border-color:redrgb(198, 146, 153);
}
#f{
  font-weight: bold;
}
</style>

<script type="text/javascript">
    



    function confirmPwd2() {
        var pwddd = document.getElementById("pwdd2").value;
        var cpwddd = document.getElementById("cpwdd2").value;

        if (pwddd != cpwddd) {
            document.getElementById("confm2").innerHTML = "password not matched";
            document.getElementById("cpwdd2").style.borderColor = "red";
        } else  {
            document.getElementById("cpwdd2").style.borderColor = "";
            document.getElementById("confm2").innerHTML = "";
        }

    }


</script>


<div class="container-fluid" >

    <h2>Vehicle Profiles</h2>
    <?php if($this->session->flashdata('success8')){?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success8'); ?>
      </div>
    <?php } ?>


    <ul class="nav nav-tabs">
        <li class="active"><a href="#View">View Profiles</a></li>
        <li><a href="#Update">Update Profiles</a></li>
        <li><a href="#Delete">Delete Profiles</a></li>

    </ul>

    <div class="tab-content">
        <div id="View" class="tab-pane fade in active">

                <h2>View Profiles</h2>
                <div class="row">
                  <form action = "<?php echo site_url('Viewvehicle/viewvehicle');?>" method = "POST">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="pwd">Vehicle Number</label>
                          <input type="text" class="form-control" placeholder="Vehicle No" name = "vehicleno" required>
                      </div>

                      <input type="submit"  class="btn btn-primary" name="search" value="Search">

                    </div>

                    <div class="col-md-6">



                    </div>
                </form>

                </div>
                <br>
                <br>
                <div class="row">
                  <div class="col-md-6" id="f">
                    <?php if (isset($results1)){?>
                    <?php foreach($results1 as $row1){?>
                    <div class="col-sm-5 col-xs-6 tital " >Vehicle No:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['VehicleNo'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Reg No:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['RegNo'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Brand:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['Brand'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Model:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['Model'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Owner ID:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['OwnerID'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>







                  </div>
                  <div class="col-md-6">
                    <?php if (isset($results1)){?>
                    <?php foreach($results1 as $row1){?>
                    <img src="../../assets/img/vehicle/<?php echo $row1['Picture'];?>" alt="" id="image">
                    <?php }?>
                    <?php }?>

                  </div>

                </div>


        </div>
        <div id="Update" class="tab-pane fade">
            <h2>Update Profiles</h2>



            <form action = "<?php echo site_url('Viewvehicle/updatevehicle');?>" method = "POST">
              <div class="form-group">
                  <label for="usr">Vehicle NO</label>
                  <input type="text" class="form-control" name="vehicleno" required>
              </div>

              <div class="form-group">
                  <label for="usr">Reg NO</label>
                  <input type="text" class="form-control" name="regno" required>
              </div>

              <div class="form-group">
                  <label for="usr">Brand</label>
                  <input type="text" class="form-control" name="brand" required>
              </div>

              <div class="form-group">
                  <label for="usr">Model</label>
                  <input type="text" class="form-control" name = "model" required>
              </div>

              <div class="form-group">
                  <label for="pwd">Vehicle Owner ID</label>
                  <input type="text" class="form-control" name="ownerid" required>
              </div>

              <div class="">
                <br>
              </div>
              <br>
              <div class="">
                <br>
              </div>

              </br>
              <input type="submit"  class="btn btn-primary" name="submit2" value="Update">
            </form>
        </div>

        <div id="Delete" class="tab-pane fade">

                <h2>Delete Profiles</h2>
                <div class="row">
                  <form action = "<?php echo site_url('Viewvehicle/deletevehicle');?>" method = "POST">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="pwd">Vehicle Number</label>
                          <input type="text" class="form-control" placeholder="Vehicle Number" name = "vehicleno" required>
                      </div>

                      <input type="submit"  class="btn btn-primary" name="delete" value="Delete">

                    </div>


                </form>

                </div>

        </div>



    </div>
</div>

<script>
    $(document).ready(function(){
        $(".nav-tabs a").click(function(){
            $(this).tab('show');
        });
    });
</script>


<?php include 'partials/footer.php' ?>
