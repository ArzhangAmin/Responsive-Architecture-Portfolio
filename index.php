<?php
    include('config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>...</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->
        <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/css/reset.css">
        <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/css/style.css">
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
         <canvas class="particular"></canvas>
			<div class="iframe-holder">
				<iframe src="index.php"></iframe>
			</div>
            
            <div class="content" style='padding-top:4%'>
                <div class="container">
                <img style="margin-bottom: 30px; max-width: 100%; height: auto !important;float:left;margin-top:11%" src="<?php print $webroot; ?>/site/images/final2.png" alt="">
                    <div class="box-inner" style='top:40%'>
                        <div class="box" style="width: 70% !important; ">
                            <ul style="list-style-type: none;text-decoration: underline;">
                                <li><a href="<?php print $webroot; ?>/site/portfolio-parallax.php" target="_blank"> PROJECT</a></li>
                                <li><a href="<?php print $webroot; ?>/site/design.php" target="_blank">DESIGN</a></li>
                                <li><a href="<?php print $webroot; ?>/site/team-single.php" target="_blank">ABOUT US</a></li>
                                <li><a href="<?php print $webroot; ?>/site/contact.php" target="_blank">CONTACT</a></li>
                        </div>
                       
                    </div>
                   
                </div>
                
            </div>
            
        </div>
        
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </body>
</html>