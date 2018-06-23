<?php include 'partials/header.php' ?>

<script src="https://www.gstatic.com/firebasejs/3.6.5/firebase.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

<script src="https://use.fontawesome.com/45e03a14ce.js"></script>

<script>
    var config = {
        apiKey: "AIzaSyDEUlmbMLmmJqhiNZZ8he1_muiSTRkWins",
        authDomain: "sparktectaskmodule.firebaseapp.com",
        databaseURL: "https://sparktectaskmodule.firebaseio.com",
        storageBucket: "sparktectaskmodule.appspot.com"
    };
    firebase.initializeApp(config);
</script>

<script type="text/javascript" src="<?php echo base_url('assets/js/addTask.js' )?>"></script>


    <script type="text/javascript">
        function validatenum() {
            var number = document.getElementById("t1").value;
            var len = number.length;
            var phcode = number.substr(0, 3);
            if (number == "") {
                document.getElementById("err").innerHTML = "empty";
                document.getElementById("t1").style.borderColor = "red";
            }

            <!--NaN = add numbers only-->
            else if (isNaN(number)) {
                document.getElementById("err").innerHTML = "numbers only";
                document.getElementById("t1").style.borderColor = "red";
            } else if (number != 0 && len != 10) {
                document.getElementById("err").innerHTML = "number is not valid";
                document.getElementById("t1").style.borderColor = "red";
            }


            // else if(phcode !=071 ||phcode !=072 ||phcode !=076 ||phcode !=077 ||phcode !=075||phcode !=078){
            //   document.getElementById("err").innerHTML="code is not valid";
            //  document.getElementById("t1").style.borderColor="red";
            // }
            else {
                document.getElementById("err").innerHTML = "";
                document.getElementById("t1").style.borderColor = "";
            }

        }

        function confirmPwd() {
            var pwddd = document.getElementById("pwdd").value;
            var cpwddd = document.getElementById("cpwdd").value;

            if (pwddd != cpwddd) {
                document.getElementById("confm").innerHTML = "password not matched";
                document.getElementById("cpwdd").style.borderColor = "red";
            } else {
                document.getElementById("cpwdd").style.borderColor = "";
                document.getElementById("confm").innerHTML = "";
            }

        }
    </script>




    <div class="container"  style="width: 700px; margin-left: 50px">


                            <div class="row">
                                <h2>Add Task</h2>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Overview</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text_name">Title</label>
                                <input id="text_name" type="text" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label for=text_area>Area</label>
                                <input id=text_area type="text" class="form-control" required>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <h4>Contact details</h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="text_contact_name">Contact Name</label>
                                <input id=text_contact_name type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for=t1>Contact Number</label>
                                <input id=t1 type="text" class="form-control" name="contact" required onkeyup="validatenum()">
                                <span id="err" Style="color:red"></span>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <h4>Extra Details</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for=date_deadLine>DeadLine Date</label>
                                <input id=date_deadLine type="date" class="form-control" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for=textarea_description>description</label>
                                <textarea id=textarea_description rows=6 class="form-control" name="Description"></textarea>
                            </div>

                            </br>
                            <button id=button_submit class="btn btn-primary" onclick='submitClick()'> Add task</button>
                            <script src="<?php echo base_url('assets/js/addTask.js' )?>"></script>

            </div>


<?php include 'partials/footer.php' ?>
