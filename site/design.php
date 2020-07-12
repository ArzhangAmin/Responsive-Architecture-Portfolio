<?php
include('../config.php');
$METAQ = mysql_query("SELECT * FROM rt_setting ");
$META = array();
while($M = mysql_fetch_array($METAQ)){
    $META[$M['OptionsName']] = $M['OptionValue'];
}
$A= $META['ABOUT_US'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/site/css/reset.css">
    <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/site/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="<?php print $webroot; ?>/site/css/style.css">
    <link rel="stylesheet" href="<?php print $webroot; ?>/site/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="http://1abzaar.ir/abzar/tools/no-rightclick.js"></script><div style="display:none"><h2><a href="http://www.1abzar.com">&#1575;&#1576;&#1586;&#1575;&#1585; &#1608;&#1576;&#1605;&#1587;&#1578;&#1585;</a></h2></div>

    <!--=============== favicons ===============-->
    <!--<link rel="shortcut icon" href="images/favicon.ico">-->
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
            <div class="dynamic-title">Design Gallery</div>
            <!-- Page title  end-->
            <!-- content  -->
            <div class="content hor-content full-height pad-con no-bg-con">
                <!-- portfolio  Images  -->

                <div class='control-panel'>
                    <div class='container'><a href='#' class='btn anim-button   flat-btn   transition    show-hid-sidebar'><span>More information</span><i class='fa fa-eye'></i></a>
                        <span     class='show-thumbs vis-con-panel vis-t' data-textshow='Show thumbnails' data-texthide='Hide thumbnails'></span>
                    </div>
                </div>


                <div class="resize-carousel-holder lightgallery ogm smp">
                    <div id="gallery_horizontal" class="gallery_horizontal flow-gallery" data-cen="1">

              <?php
                        $Data=mysql_query("SELECT * FROM tbl_design  ");
                        while($D=mysql_fetch_array($Data))
                        {
                            $DesignID = $D['DesignID'];
                            $DesignName = $D['DesignName'];
                            $DesignDesc = $D['DesignDesc'];
                            $DesignImage = $D['DesignImage'];
                            echo" <div class='horizontal_item' data-phname='Pellentesque fac' >
                            <img src='$webroot/$DesignImage' alt=''>
                       <a style='height:auto' data-src='$webroot/$DesignImage' class='popup-image slider-zoom' data-sub-html='<h2>$DesignName</h2></br>$DesignDesc'>
                                <i class='fa fa-expand'></i>
                            </a>
                        </div>
						";
}

?>                 </div>
                    <!--  navigation -->
                    <div class='customNavigation fhsln'>
                        <a class='prev-slide transition'><i class='fa fa-angle-left'></i></a>
                        <a class='next-slide transition'><i class='fa fa-angle-right'></i></a>
                    </div>
                    <!--  navigation end-->
                </div>
                <!-- portfolio  Images  end-->
                <!-- Hidden sidebar-->
                <div class='sb-overlay'></div>
                <div class='hid-sidebar'>
                    <div class='container small-container'>
                        <div class='sidebar-wrap'>
                            <div class='sb-bg'></div>
                            <div class='sb-inner'>
                                <div class='close-sidebar'></div>
                               <h2 class='section-title'><strong>VAHID SAFAVI </strong></h2>
                                <div class='separator'></div>
                                <div class='clearfix'></div>
                                <p><?php echo $A; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <!--sidebar end -->
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