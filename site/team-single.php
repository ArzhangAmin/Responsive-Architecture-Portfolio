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
        <title>about</title>
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
                    <div class="dynamic-title">Vahid Safavi</div>
                    <!-- Page title  end-->
                    <!-- content  -->
                    <div class="content hor-content pad-con no-bg-con">
                        <section id="sec1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="section-title" ><strong> vahid safavi</strong></h2>
                                        <p style="margin-right: 100px;"><?php echo $A; ?></p>
                                        <div class="process-box">
                                            <h3>Responsibility</h3>
                                            <ul class="creat-list" >
                                                <?php
                                                $Data = mysql_query("SELECT CatTitle FROM tbl_category");
                                                while($D = mysql_fetch_array($Data))
                                                {
                                                    $CatTitle = $D['CatTitle'];
                                                    echo "<li><a href='#'>$CatTitle</a></li>";
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <h3 class="bold-title">Skills</h3>
                                        <div class="skillbar-box animaper"  >
                                            <?php
                                            $Data1 = mysql_query("SELECT * FROM  tbl_skills");
                                            while($D1 = mysql_fetch_array($Data1))
                                            {
                                                $skill = $D1['skill'];
                                                $percent = $D1['percent'];
                                                echo "<div class='custom-skillbar-title'><span>$skill</span></div>
                                            <div class='skill-bar-percent'>$percent%</div>
                                            <div class='skillbar-bg' data-percent='$percent%'>
                                                <div class='custom-skillbar'></div>
                                            </div>";
                                            }
                                            ?>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="parallax-box" data-top-bottom="transform: translateY(-150px);" data-bottom-top="transform: translateY(150px);">
                                            <img src="<?php print $webroot; ?>/site/images/team/vahid.jpg" class="respimg" alt="">
                                        </div>
                                    </div>
                                </div>
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