<?php
include('../config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Project</title>
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
                    <?php
                    if(isset($_REQUEST['id']))
                    {
                    $id=$_REQUEST['id'];
                    $Data=mysql_query("SELECT * FROM tbl_project WHERE  ProjectID='$id' ");
                    while($D=mysql_fetch_array($Data)) {
                        $ProjectID = $D['ProjectID'];
                        $ProjectName = $D['ProjectName'];
                        $ProjectDesc = $D['ProjectDesc'];
                        $ProjectImage = $D['ProjectImage'];
                        $CatID = $D['CatID'];
                    }}
                    echo "<div class='dynamic-title'>$ProjectName</div>
                    <div class='content'>
                        <section class='parallax-section'>
                            <div class='parallax-inner'>
                                <div class='bg' data-bg='$webroot/$ProjectImage' data-top-bottom='transform: translateY(300px);' data-bottom-top='transform: translateY(-300px);'></div>

                                <div class='overlay'></div>
                            </div>

                            <div class='container'>
                                <div class='page-title'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <h2><strong>$ProjectName</strong></h2>
                                        </div>
                                        <div class='col-md-6'>
                                            <ul class='creat-list'>
                                                <li><a href='$webroot/index.php'>Home</a></li>
                                                <li><a href='portfolio-parallax.php'>Projects</a></li>
                                                <li><a href='portfolio-single.php?id=$ProjectID'>$ProjectName</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>";
            ?>
                    <!-- content end -->
                    <div class="content">
                        <section>
                            <div class="container">
                                <!--=============== portfolio holder ===============-->
                                <div class="gallery-items   three-columns grid-small-pad lightgallery">
                                    <!-- 1 -->
                                    <?php
                                    if(isset($_REQUEST['id']))
                                    {
                                        $id=$_REQUEST['id'];
                                        $Data=mysql_query("SELECT * FROM  tbl_image WHERE  ProjectID='$id' ");
                                        while($D=mysql_fetch_array($Data))
                                        {
                                            $ImageAddress = $D['ImageAddress'];

                                            echo"<div class='gallery-item'>
                                        <div class='grid-item-holder'>
                                            <div class='box-item'>
                                                <a data-src='$ImageAddress' class='popup-image' data-sub-html='$ProjectDesc'>
                                                <span class='overlay'></span>
                                                <img  src='$ImageAddress'   alt=''>
                                                </a>
                                            </div>
                                        </div>
                                    </div>";
                                        }}
                                    ?>

                                </div>
                                <!-- end gallery items -->               
                                <div class="custom-inner-holder">
                                    <!-- 1 -->	
                                    <div class="custom-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3>Project details</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                if(isset($_REQUEST['id']))
                                                {
                                                $id=$_REQUEST['id'];
                                                $Data=mysql_query("SELECT * FROM tbl_project WHERE  ProjectID='$id' ");
                                                while($D=mysql_fetch_array($Data)) {
                                                    $ProjectName = $D['ProjectName'];
                                                    $ProjectDesc = $D['ProjectDesc'];
                                                    echo"<h4>$ProjectName</h4>
                                                          <p>$ProjectDesc</p>";
                                                }}
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- 1 -->
                                </div>
                                <!-- custom-link-holder  end -->
                            </div>
                        </section>
                    </div>
                    <!-- content end -->
                    <!-- content footer-->
		    <div class="height-emulator"></div>
                    <?php
                    include('footer.php')
                    ?>
                    <!-- content footer end -->

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