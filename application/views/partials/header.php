<?php //session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Tracking System</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css' )?>"   rel="stylesheet"  type = "text/css" />



    <!--  Template  CSS    -->
    <link href=" <?php echo base_url('assets/css/templateStyle.css' )?>" rel="stylesheet"  type = "text/css"/>



    <!-- Icons -->

    <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>"/>


    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js' )?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js' )?>"></script>




    <title>Title</title>
</head>
    <body>
    <div id="navbar-wrapper">
        <!--Top Navbar-->
        <header >
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#393b59">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#" ><h3 id = "logo" style="color: white">Sp@rk Tec</h3></a>

                    </div>
                    <div id="navbar-collapse" class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"> <i class="fa fa-bell-o fa-1x" aria-hidden="true"></i></a></li>
                            <li class="dropdown">
                                <a id="user-profile" href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url('assets/img/emp.jpg' )?>" class="img-responsive img-thumbnail img-circle">Admin</a>
                                <ul class="dropdown-menu dropdown-block" role="menu">

                                    <li><a href="<?php echo base_url('index.php/Login_controller/logoutUser')?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav">
                    <li>
                        <a href="<?php echo base_url('index.php/home/index')?>"">
                            <span class="sidebar-icon"><i class="fa fa-dashboard"></i></span>
                            <span class="sidebar-title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                            <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                            <span class="sidebar-title">Profile Management</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">

                            <li><a href="<?php echo base_url('index.php/home/loadaddPerson')?>"><i class="fa fa-caret-right"></i>Registration</a></li>
                            <li><a href="<?php echo base_url('index.php/home/loademployeeprof')?>"><i class="fa fa-caret-right"></i>Employee Profiles</a></li>
                            <li><a href="<?php echo base_url('index.php/home/loadadminprof1')?>"><i class="fa fa-caret-right"></i>Admin Profiles</a></li>
                            <li><a href="<?php echo base_url('index.php/home/loadownerprof')?>"><i class="fa fa-caret-right"></i>Vehicle Owner Profiles</a></li>
                            <li><a href="<?php echo base_url('index.php/home/loadvehicle')?>"><i class="fa fa-caret-right"></i>Vehicle Profiles</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-3">
                            <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sidebar-title">Tasks</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-3" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="<?php echo base_url('index.php/home/loadAddTasks')?>"><i class="fa fa-caret-right"></i>Add Tasks</a></li>
                            <li><a href="<?php echo base_url('index.php/home/loadViewTasks')?>"><i class="fa fa-caret-right"></i>View Tasks</a></li>


                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-4">
                            <span class="sidebar-icon"><i class="fa fa-map-marker"></i></span>
                            <span class="sidebar-title">Location</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-4" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="<?php echo base_url('index.php/home/loadCurrentLocationsView')?>"><i class="fa fa-caret-right"></i>Current Locations</a></li>
                            <li><a href="<?php echo base_url('index.php/home/empLocation')?>"><i class="fa fa-caret-right"></i>Employee Location</a></li>

                        </ul>
                    </li>

                    <li>  <!--adding slide bar sub menu named vehicle details and sub menu item named vehicle status-->
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-5">
                            <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sidebar-title">Vehicle Details</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-5" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="<?php echo base_url('index.php/Vehicledetails/status')?>"><i class="fa fa-caret-right"></i>Vehicle Status</a></li>


                        </ul>
                    </li>
                    <li><!--                        adding a sidebar item named Attendance report-->
                        <a  href="<?php echo base_url('index.php/AttendanceController/attendance')?>">
                            <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sidebar-title">Attendance report</span>

                        </a>

                    </li>
                </ul>
            </aside>
        </div>
        <main id="page-content-wrapper" role="main">
