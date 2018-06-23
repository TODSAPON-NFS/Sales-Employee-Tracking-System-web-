<?php include 'partials/header.php' ?>


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

        else{
            document.getElementById("err").innerHTML="";
            document.getElementById("t1").style.borderColor="";
        }

    }
    function validatenum1(){
        var number=document.getElementById("t2").value;
        var len=number.length;
        var phcode=number.substr(0,3);
        if(number==""){
            document.getElementById("err2").innerHTML="empty";
            document.getElementById("t2").style.borderColor="red";
        }

        <!--NaN = add numbers only-->
        else if(isNaN(number)){
            document.getElementById("err2").innerHTML="numbers only";
            document.getElementById("t2").style.borderColor="red";
        }

        else if(number!=0 && len!=10){
            document.getElementById("err2").innerHTML="number is not valid";
            document.getElementById("t2").style.borderColor="red";
        }

        else{
            document.getElementById("err2").innerHTML="";
            document.getElementById("t2").style.borderColor="";
        }

    }
    function validatenum2(){
        var number=document.getElementById("t3").value;
        var len=number.length;
        var phcode=number.substr(0,3);
        if(number==""){
            document.getElementById("err3").innerHTML="empty";
            document.getElementById("t3").style.borderColor="red";
        }

        <!--NaN = add numbers only-->
        else if(isNaN(number)){
            document.getElementById("err3").innerHTML="numbers only";
            document.getElementById("t3").style.borderColor="red";
        }

        else if(number!=0 && len!=10){
            document.getElementById("err3").innerHTML="number is not valid";
            document.getElementById("t3").style.borderColor="red";
        }

        else{
            document.getElementById("err3").innerHTML="";
            document.getElementById("t3").style.borderColor="";
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
    function confirmPwd1() {
        var pwddd = document.getElementById("pwdd1").value;
        var cpwddd = document.getElementById("cpwdd1").value;

        if (pwddd != cpwddd) {
            document.getElementById("confm1").innerHTML = "password not matched";
            document.getElementById("cpwdd1").style.borderColor = "red";
        } else  {
            document.getElementById("cpwdd1").style.borderColor = "";
            document.getElementById("confm1").innerHTML = "";
        }

    }
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

    <h2>Person And Vehicle Registration</h2>

    <?php if($this->session->flashdata('success')){?>
      <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php } ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#Admin">Admin</a></li>
        <li><a href="#SalesEmployee">Sales Employee</a></li>
        <li><a href="#VehicleOwner">Vehicle Owner</a></li>
        <li><a href="#Vehicle">Vehicle</a></li>
    </ul>

    <div class="tab-content">
        <div id="Admin" class="tab-pane fade in active">

                <h2>Registration for Admin</h2>



                <form enctype="multipart/form-data" action = "<?php echo site_url('Addperson/registerUser');?>" method = "POST">
                  <div class="form-group">
                      <label for="usr">Admin Photo</label>
                      <input type="file" class="form-control" name = "adminpic" required>
                  </div>

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
                            <option value="3" name="superadmin">Super Admin</option>
                            <option value="4" name = "admin">Admin</option>

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
        <div id="SalesEmployee" class="tab-pane fade">
            <h2>Registration For Sales Employee</h2>



            <form enctype="multipart/form-data" action = "<?php echo site_url('Addperson/registerUser');?>" method = "POST">
                <div class="form-group">
                    <label for="usr">Sales Employee Photo</label>
                    <input type="file" class="form-control" name = "emppic" required>
                </div>
                <div class="form-group">
                    <label for="usr">First Name</label>
                    <input type="text" class="form-control" name="fname" required>
                </div>

                <div class="form-group">
                    <label for="usr">Last Name</label>
                    <input type="text" class="form-control" name="lname" required>
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
                    <label for="usr">Employee ID</label>
                    <input type="text" class="form-control" name="empid" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Manager ID</label>
                    <input type="text" class="form-control" name="managerid" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Contact NO</label>
                    <input type="text" class="form-control" id ="t2"  name = "contact" required onkeyup="validatenum1()">
                    <span id="err2" Style="color:red"></span>
                </div>


                <input type="hidden" value="1" class="form-control"   name = "type" required >


                <div class="form-group">
                    <label for="pwd">Registration Date</label>
                    <input type="date" class="form-control" name = "date" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Vehicle No</label>
                    <input type="text" class="form-control" name = "vehicleno" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Availablity</label>
                    <select class = "form-control" name="availability">
                        <option value="Engaged" name="Engaged">Engaged</option>
                        <option value="Available" name = "Available">Available</option required>

                    </select>
                </div>

                <div class="form-group">
                    <label for="pwd">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" name="password" required id = "pwdd1">
                </div>

                <div class="form-group">
                    <label for="pwd">Confirm Password</label>
                    <input type="password" class="form-control" required id = "cpwdd1" onkeyup="confirmPwd1()">
                    <span id="confm1" Style="color:red"></span>
                </div>

                </br>
                <input type="submit"  class="btn btn-primary" name="submit2" value="Submit">
            </form>
        </div>
        <div id="VehicleOwner" class="tab-pane fade">
            <h2>Registration for Vehicle Owner</h2>


            <form enctype="multipart/form-data" action = "<?php echo site_url('Addperson/registerUser');?>" method = "POST">
                <div class="form-group">
                    <label for="usr">Vehicle Owner Photo</label>
                    <input type="file" class="form-control" name = "ownerpic" required>
                </div>
                <div class="form-group">
                    <label for="usr">First Name</label>
                    <input type="text" class="form-control" name="fname" required>
                </div>

                <div class="form-group">
                    <label for="usr">Last Name</label>
                    <input type="text" class="form-control" name="lname" required>
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
                    <label for="pwd">Vehicle Owner ID</label>
                    <input type="text" class="form-control" name="ownerid" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Contact NO</label>
                    <input type="text" class="form-control" id = "t3" name = "contact" required onkeyup="validatenum2()">
                    <span id="err3" Style="color:red"></span>
                </div>

                <input type="hidden" value="2" class="form-control"   name = "type" required >

                <div class="form-group">
                    <label for="pwd">Registration Date</label>
                    <input type="date" class="form-control" name = "date" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" name="password" required id = "pwdd2">
                </div>

                <div class="form-group">
                    <label for="pwd">Confirm Password</label>
                    <input type="password" class="form-control" required id = "cpwdd2" onkeyup="confirmPwd2()">
                    <span id="confm2" Style="color:red"></span>
                </div>

                </br>
                <input type="submit"  class="btn btn-primary" name="submit3" value="Submit">
            </form>
        </div>
        <div id="Vehicle" class="tab-pane fade">
            <h2>Registration for Vehicles</h2>



            <form enctype="multipart/form-data" action = "<?php echo site_url('Addperson/registerUser');?>" method = "POST">
                <div class="form-group">
                    <label for="usr">Vehicle Photo</label>
                    <input type="file" class="form-control" name = "vehiclepic" required>
                </div>

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
                <input type="submit"  class="btn btn-primary" name="submit4" value="Submit">
            </form>
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
