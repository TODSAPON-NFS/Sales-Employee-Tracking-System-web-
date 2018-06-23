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
    function validatenum(){
        var number=document.getElementById("t1").value;
        var len=number.length;
        var phcode=number.substr(0,3);
        if(number==""){
            document.getElementById("err").innerHTML="empty";
            document.getElementById("t1").style.borderColor="red";
        }

        <!--NaN = add numbers only-->
        else if(isNaN(number)){
            document.getElementById("err").innerHTML="numbers only";
            document.getElementById("t1").style.borderColor="red";
        }

        else if(number!=0 && len!=10){
            document.getElementById("err").innerHTML="number is not valid";
            document.getElementById("t1").style.borderColor="red";
        }


        // else if(phcode !=071 ||phcode !=072 ||phcode !=076 ||phcode !=077 ||phcode !=075||phcode !=078){
        //   document.getElementById("err").innerHTML="code is not valid";
        //  document.getElementById("t1").style.borderColor="red";
        // }

        else{
            document.getElementById("err").innerHTML="";
            document.getElementById("t1").style.borderColor="";
        }

    }

    function confirmPwd() {
        var pwddd = document.getElementById("pwdd").value;
        var cpwddd = document.getElementById("cpwdd").value;

        if (pwddd != cpwddd) {
            document.getElementById("confm").innerHTML = "password not matched";
            document.getElementById("cpwdd").style.borderColor = "red";
        } else  {
            document.getElementById("cpwdd").style.borderColor = "";
            document.getElementById("confm").innerHTML = "";
        }

    }


</script>


<div class="container-fluid" >

    <h2>Admin Profiles</h2>
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
                  <form action = "<?php echo site_url('Viewadmin/viewadminprof');?>" method = "POST">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="pwd">Manager ID</label>
                          <input type="text" class="form-control" placeholder="Manager ID" name = "managerid" required>
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
                    <?php if (isset($results2)){?>
                    <?php foreach($results2 as $row1){?>

                    <div class="col-sm-5 col-xs-6 tital " >NIC Number:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['NIC'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['FirstName'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['LastName'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Address:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['AddressL1'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Gender:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['Gender'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>

                    <div class="col-sm-5 col-xs-6 tital " >Registration Date:</div><div class="col-sm-7 col-xs-6 "><?php echo $row1['Date'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>
                    <?php if (isset($results1)){?>
                    <?php foreach($results1 as $row){?>
                    <div class="col-sm-5 col-xs-6 tital " >Manager ID:</div><div class="col-sm-7 col-xs-6 "><?php echo $row['ManagerID'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>
                    <?php if (isset($results3)){?>
                    <?php foreach($results3 as $row2){?>
                    <div class="col-sm-5 col-xs-6 tital " >Phone Number:</div><div class="col-sm-7 col-xs-6 "><?php echo $row2['Number'];?></div>
                    <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <br>
                    <?php }?>
                    <?php }?>





                  </div>
                  <div class="col-md-6">
                    <?php if (isset($results2)){?>
                    <?php foreach($results2 as $row1){?>
                    <img src="../../assets/img/admin/<?php echo $row1['Picture'];?>" alt="" id="image">
                    <br>
                    <label for="">Profile Pic</label>
                    <?php }?>
                    <?php }?>

                  </div>




                </div>


        </div>
        <div id="Update" class="tab-pane fade">

                <h2>Update Profiles</h2>



                <form action = "<?php echo site_url('Viewadmin/updateadmin');?>" method = "POST">
                    <div class="form-group">
                        <label for="usr">First Name</label>
                        <input type="text" class="form-control" name = "fname" required>
                    </div>

                    <div class="form-group">
                        <label for="usr">Last Name</label>
                        <input type="text" class="form-control" name = "lname" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Gender</label>
                        <select class = "form-control" name="gender">
                            <option value="Male" name="Male">Male</option>
                            <option value="Female" name = "Female">Female</option>
                            <option value="Other" name = "Other">Other</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="usr">NIC</label>
                        <input type="text" class="form-control" name = "nic" required>
                    </div>

                    <div class="form-group">
                        <label for="usr">Address</label>
                        <input type="text" class="form-control" name = "address" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Contact NO</label>
                        <input type="text" class="form-control" id = "t1" name = "contact" required onkeyup="validatenum()">
                        <span id="err" Style="color:red"></span>
                    </div>

                    <div class="form-group">
                        <label for="pwd">User Type</label>
                        <select class = "form-control" name="type">
                            <option value="Super Admin" name="superadmin">Super Admin</option>
                            <option value="Admin" name = "admin">Admin</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Manager ID</label>
                        <input type="text" class="form-control" name="managerid" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password" class="form-control" name="password" required id = "pwdd">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Confirm Password</label>
                        <input type="password" class="form-control" required id = "cpwdd" onkeyup="confirmPwd()">
                        <span id="confm" Style="color:red"></span>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Registration Date</label>
                        <input type="date" class="form-control" name = "date" required>
                    </div>


                    </br>
                    <label for="pwd">Super Admin Username:</label>
                    <input type="text" class="" name="adusername" required>
                    <br>
                    <label for="pwd">Super Admin  Password:</label>
                    <input type="password" class="" name="adpassword" required>
                    <br>
                    <input type="submit"  class="btn btn-primary" name="submit1" value="Submit">
                </form>

        </div>

        <div id="Delete" class="tab-pane fade">

                <h2>Delete Profiles</h2>
                <div class="row">
                  <form action = "<?php echo site_url('Viewadmin/deleteadminprof');?>" method = "POST">

                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="pwd">NIC Of The Manager</label>
                          <input type="text" class="form-control" placeholder="NIC" name = "nic" required>
                      </div>

                    </br>
                    <label for="pwd">Super Admin Username:</label>
                    <input type="text" class="" name="adusername" required>
                    <br>
                    <label for="pwd">Super Admin  Password:</label>
                    <input type="password" class="" name="adpassword" required>
                    <br>
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
