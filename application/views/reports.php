<?php include 'partials/header.php'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
    <style>

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 2px solid #dddddd;
            text-align: left;
            padding: 8px;
        }



    </style>
</head>
<body>


    <div class="container-fluid" >
        <h1>Reports</h1>
        <h2>Daily Attendance of Employees</h2>

        <?php if($this->session->flashdata('success8')){?>   <!--to get the flash data in this position-->
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success8'); ?>
            </div>
        <?php } ?>

        <form action = "<?php echo site_url('AttendanceController/attendance');?>" method = "POST">
                <label for="searchUsername" class="bmd-label-floating">Search Employee</label>
                <input type="text" class="form-control" name="search" id="search" placeholder="Enter a Username of an employee.."
                        required style="width: 300px"> <br>
                <button type="submit" style="background-color: #0d1a30" class="btn btn-primary btn-raised">Search</button><br>
                <br>
        </form>
                <table class="table table-bordered">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Timestamp</th>
                        <th>Attendance Status</th>
                    </tr>
                    <?php if (isset($result1)){?>

                        <?php foreach($result1 as $row){?>
                            <tr>
                                <td><?php echo $row['FirstName'];?></td>
                                <td><?php echo $row['LastName'];?></td>
                                <td><?php echo $row['timeStamp'];?></td>
                                <td><?php
                                    if($row['attendance']==1){  //attendance(1) means he reported to start working.
                                        echo "In";
                                    }else{
                                        echo "out";
                                    }
                                    ;?></td>


                            </tr>

                        <?php }?>
                    <?php }?>




                </table>


    </div>






</body>
</html>

<?php include 'partials/footer.php'?>

