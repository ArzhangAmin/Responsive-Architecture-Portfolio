<?php
include('../config.php');
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>projects</title>
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
                    <div class="dynamic-title">Portfolio Parallax</div>
                    <!-- Page title  end--> 
                    <!-- content  -->
                    <div class="content">
                        <section class="parallax-section">
                            <div class="parallax-inner">
                                <div class="bg" data-bg="<?php print $webroot; ?>/site/images/folio/thumbs/22.jpg" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="container">
                                <div class="page-title">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2> Our Work <strong>Parallax</strong></h2>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="creat-list">
                                                <li><a href="<?php print $webroot; ?>">Home</a></li>
                                                <li><a href="<?php print $webroot; ?>/site/portfolio.php">Portfolio</a></li>
                                                <li><a href="<?php print $webroot; ?>/site/portfolio-parallax.php">Portfolio Parallax</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- content end -->
                    <!-- content  -->
                    <div class="content">
                        <section>
                            <div class="container">
                                <h2 class="section-title dec-title"><span>All <strong> projects</strong></span></h2>

                                <!-- 2 -->
                                    <?php
                                    if(isset($_REQUEST['ProjectID']))
                                    {
                                        exit;
                                    }
                                    if(isset($_REQUEST['page']))
                                    {   $page=$_REQUEST['page'];
                                    }
                                    else{
                                        $page=1;
                                    }
                                    $Start=($page*10)-10;
                                    $End=10;

                                    $Data=mysql_query("SELECT * FROM tbl_project ORDER BY ProjectID DESC LIMIT $Start,$End");
                                    while($D=mysql_fetch_array($Data)) {
                                        $ProjectID = $D['ProjectID'];
                                        $ProjectName = $D['ProjectName'];
                                        $ProjectDesc = $D['ProjectDesc'];
                                        $ProjectImage = $D['ProjectImage'];
                                        $year = $D['year'];
                                        $num = $D['num'];
                                        $CatID = $D['CatID'];

                                        $data1=mysql_query("SELECT CatTitle FROM tbl_category WHERE CatID=$CatID ");
                                        while($d1=mysql_fetch_array($data1))
                                        {
                                            $cattitle=$d1['CatTitle'];

                                        if($ProjectID & 1){
                                            echo  "
                                            <div class='row'>
                                    <div class='col-md-7'>
                                        <div class='parallax-item left-direction'>
                                        <div class='paralax-media'>
                                                <ul class='creat-list'>";

                                            if($year != 0)
                                                echo"<li><a href='#'>$year</a></li>";

                                               echo"<li><a href='#'>$ProjectName</a></li>
                                                    <li><a href='#'>$cattitle</a></li>
                                                    </ul>

                                               <div class='blog-media'>
                                                <div class='box-item'>
                                                    <a class='ajax' href='portfolio-single.php?id=$ProjectID'>
                                                    <span class='overlay'></span>
                                                    <img src='$webroot/$ProjectImage' alt='' class='respimg'>
                                                    </a>
                                                </div>
                                            </div>

                                            </div>

                                            <div class='parallax-deck' data-top-bottom='transform: translateY(-200px);' data-bottom-top='transform: translateY(200px)'>

                                               <div class='parallax-deck-item'>
                                                  <!--  <h1 style='margin-bottom: 40px;'></h1>-->
  <div class=' sect-subtitle right-align-dec skrollable skrollable-between' data-top-bottom='transform: translateY(300px);' data-bottom-top='transform: translateY(-300px);' style='transform: translateY(196.962px);'>
                                                    <span>$num</span></div>
                                                    <a href='portfolio-single.php?id=$ProjectID' class='btn anim-button fl-l'><span>View Project</span><i class='fa fa-long-arrow-right'></i></a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-5'></div>
                                           </div>";
                                        }

                                        else{
                                            echo "
                                            <div class='row'>
                                            <div class='col-md-5'></div>
                                    <div class='col-md-7'>
                                        <div class='parallax-item  right-direction'>
                                        <div class='paralax-media'>
                                                <ul class='creat-list'>";
                                            if($year != 0)
                                                echo"<li><a href='#'>$year</a></li>";

                                            echo"<li><a href='#'>$ProjectName</a></li>
                                                    <li><a href='#'>$cattitle</a></li>
                                                    </ul>
                                                   <div class='blog-media'>
                                                <div class='box-item'>
                                                    <a class='ajax' href='portfolio-single.php?id=$ProjectID'>
                                                    <span class='overlay'></span>
                                                    <img src='$webroot/$ProjectImage' alt='' class='respimg'>
                                                    </a>
                                                </div>
                                            </div>

                                            </div>
                                            <div class='parallax-deck' data-top-bottom='transform: translateY(-200px);' data-bottom-top='transform: translateY(200px)'>
                                                <div class='parallax-deck-item'>
                                                    <!--<h1 style='margin-bottom: 40px;'></h1>-->
                                                    <div class=' sect-subtitle left-align-dec skrollable skrollable-between' data-top-bottom='transform: translateY(300px);' data-bottom-top='transform: translateY(-300px);' style='transform: translateY(196.962px);'>
                                                    <span>$num</span></div>
                                                    <a href='portfolio-single.php?id=$ProjectID' class='btn anim-button fl-l'><span>View Project</span><i class='fa fa-long-arrow-right'></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                           </div>";
                                        }
                                        }
                                        }
                                     ?>



                                <div >
                                    <ul>
                                        <?php

                                        $Totul=mysql_fetch_array(mysql_query("SELECT COUNT(ProjectID) FROM tbl_project"));
                                        $Count=$Totul[0];
                                        $PageCount=ceil($Count/10);
                                        for($i=1;$i<=$PageCount;$i++)
                                        {
                                            echo"<li><a style='margin-right: 30px;'  href='portfolio-parallax.php?page=$i' class='text-link'>$i</a></li>";

                                        }
                                        ?>

                                    </ul>
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