<?php
include('../config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>send message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/site/css/reset.css">
    <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/site/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/site/css/style.css">
    <link rel="stylesheet" href="<?php print $webroot; ?>/site/font-awesome/css/font-awesome.min.css">

    <!--=============== favicons ===============-->

</head>
<body>
<!-- loader -->
<div class="loader">
    <div id="movingBallG">
        <div class="movingBallLineG"></div>
        <div id="movingBallG_1" class="movingBallG"></div>
    </div>
</div>
<!-- loader end -->
<!--================= main start ================-->
<div id="main">
    <!--=============== header ===============-->
    <?php
    include('header.php')
    ?>
    <!--=============== wrapper ===============-->
    <div id="wrapper">
        <!-- content-holder  -->
        <div class="content-holder">
            <!-- Page title -->
            <div class="dynamic-title">send mail</div>
            <!-- Page title  end-->
            <!-- content  -->
            <!-- content  -->
            <div class="content full-height">
                <!-- Hero section   -->
                <div class="hero-wrap">
                    <!-- Hero image   -->
                    <div class="bg"  data-bg="<?php print $webroot; ?>/site/images/13.jpg"></div>
                    <!-- Hero image   end -->
                    <div class="overlay"></div>
                    <!-- Hero text   -->
                    <div class="hero-wrap-item nFound-page-wrap">
                        <span class="nFound-Page"></span>
                        <h2>Your email has been sent successfully.</h2>
                        <a href="<?php print $webroot; ?>" class="hero-link">Back to home page</a>
                    </div>
                    <!-- Hero text   end-->
                </div>
                <!-- Hero section   end -->
            </div>
            <!-- content end -->
        </div>
        <!-- content-holder  end-->
    </div>
    <!-- wrapper end -->
    <!-- Fixed footer -->
    <?php
    include('fixed-footer.php')
    ?>
    <!-- Fixed footer end-->
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>