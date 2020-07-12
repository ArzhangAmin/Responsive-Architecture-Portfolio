<?php
    include('../config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Projects</title>
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
                    <div class="dynamic-title">Projects</div>
                    <!-- Page title  end-->
                    <!-- content  -->
                    <div class="content hor-content full-height pad-con no-bg-con">
                        <!-- filter  -->
                        <div class="filter-holder round-filter">
                            <div class="gallery-filters hid-filter">
                                <a href="#" class="gallery-filter transition2 gallery-filter_active" data-filter="*">All</a>
                                <?php
                                $Data=mysql_query("SELECT * FROM tbl_category");
                                while($D=mysql_fetch_array($Data)) {
                                    $CatID = $D['CatID'];
                                    $CatTitle = $D['CatTitle'];
                                    echo"<a href='#' class='gallery-filter transition2' data-filter='.$CatTitle'>$CatTitle</a>";
                                }
                                ?>

                            </div>
                            <div class="clearfix"></div>
                            <div class="filter-button">Filter</div>
                            <div class="count-folio round-counter">
                                <div class="num-album"></div>
                                <div class="all-album"></div>
                            </div>
                        </div>
                        <!-- filter end -->
                        <!--=============== portfolio holder ===============-->
                        <div class="resize-carousel-holder hpw">
                            <div class="p_horizontal_wrap">
                                <div id="portfolio_horizontal_container" class="two-ver-columns">

                                    <?php
                                    $data2=mysql_query("SELECT tbl_project.ProjectID,tbl_project.ProjectName,tbl_project.ProjectImage,tbl_category.CatID,tbl_category.CatTitle FROM tbl_project INNER JOIN tbl_category  ON tbl_project.CatID=tbl_category.CatID ORDER BY RAND(ProjectID)");
                                    while($D=mysql_fetch_array($data2)) {
                                        $ProjectID = $D['ProjectID'];
                                        $ProjectName = $D['ProjectName'];
                                        $ProjectImage = $D['ProjectImage'];
                                        $CatID = $D['CatID'];
                                        $CatTitle=$D['CatTitle'];

                                            echo "
                                        <div class='portfolio_item $CatTitle '>
                                        <img  src='$webroot/$ProjectImage'    alt=''>
                                        <div class='port-desc-holder'>
                                            <div class='port-desc'>
                                                <div class='grid-item'>
                                                    <h3><a href='portfolio-single.php?id=$ProjectID'>$ProjectName</a></h3>
                                                    <span>$CatTitle</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> ";



                                    }
                                    ?>
                                    <!-- portfolio item end -->
                                </div>
                                <!--portfolio_horizontal_container  end-->
                            </div>
                            <!--p_horizontal_wrap  end-->
                        </div>
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
        <script type="text/javascript">
		$(window).resize(function() {
			if ($(window).width() < 778) {
				location.reload();
			}
		});
        </script>
    </body>
</html>