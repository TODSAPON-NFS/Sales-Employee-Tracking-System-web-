<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test run</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!--<link href="css/login.css" rel="stylesheet>"-->
</head> 
<body background ="<?php echo'assets/img/location.jpg'?>">
	<div class="container" style="padding-top: 175px" >
    <div class="row vertical-offset-100">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Please sign in</h3>
        </div>
          <div class="panel-body">
              <?php echo validation_errors();?>
          <?php echo form_open('Login_controller/loginUser'); ?>

                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Username" name="username" type="text" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
              </div>
              <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember You"> Remember You
                  </label>
                </div>
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
            </fieldset>

              <?php echo form_close(); ?>


              <!--      Error message for Wrong Password      -->

              <?php if($this->session->flashdata('errormsg')){

                  echo "<p>".$this->session->flashdata('errormsg')."</p>";
              }
              ?>
          </div>
      </div>
    </div>
  </div>
</div>
</body>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>