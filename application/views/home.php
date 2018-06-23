<?php include 'partials/header.php'?>

<div class = "container-fluid">
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:17px">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo base_url('assets/img/location.jpg' )?>" alt="Los Angeles">
        </div>

        <div class="item">
            <img src="<?php echo base_url('assets/img/login.jpg' )?>" alt="Chicago">
        </div>

        <div class="item">
            <img src="<?php echo base_url('assets/img/track.jpg' )?>" alt="New York">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
</div>
<?php include 'partials/footer.php'?>
