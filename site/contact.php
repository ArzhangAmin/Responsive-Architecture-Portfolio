<?php
include('../config.php');
$METAQ = mysql_query("SELECT * FROM rt_setting ");
$META = array();
while($M = mysql_fetch_array($METAQ)){
    $META[$M['OptionsName']] = $M['OptionValue'];
}

$F = $META['FACEBOOK'];
$IN = $META['INSTAGRAM'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="css/reset.css">
    <link type="text/css" rel="stylesheet" href="css/plugins.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

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
            <div class="dynamic-title">Contacts</div>
            <!-- Page title  end-->
            <!-- content  -->
            <div class="content">
                <section class="parallax-section">
                    <div class="parallax-inner">
                        <div class="bg" data-bg="images/folio/thumbs/13.jpg" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);"></div>
                        <div class="overlay"></div>
                    </div>
                    <div class="container">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2> Our <strong> Contacts </strong></h2>
                                </div>
                                <div class="col-md-6">
                                    <ul class="creat-list">
                                        <li><a href="../index.php">Home</a></li>
                                        <li><a href="contact.php">Contact</a></li>
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
                <section style='padding:40px 0'>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h2 class="section-title">Where to <strong>Find us </strong></h2>
                                <?php
                                $Data1 = mysql_query("SELECT Contact_Text FROM tbl_contact WHERE Contact_id='1' ");
                                while($D1 = mysql_fetch_array($Data1))
                                {
                                    $Contact_Text = $D1['Contact_Text'];
                                    echo " <p style='padding-bottom:40px'>$Contact_Text</p>";
                                }
                                ?>

                            </div>
                        </div>
                        <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/css/bootstrap.css" rel="stylesheet" media="screen">

                        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
                        <!--[if lt IE 9]>
                        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
                        <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>
                        <![endif]-->

                        <style>
                            #map-container { height: 400px;width:100%; }
                        </style>
                        </head>
                        <body>
                        
      
            


   <div id="map-container" class="col-md-6"></div>

                        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
                        <!-- Include all compiled plugins (below), or include individual files as needed -->
                        <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
                        <script src="http://maps.google.com/maps/api/js?key=AIzaSyBxtZFBy_AvXi7IxW65DC6wKsNqG7s0krk"></script>
                        <script>

                            function init_map() {
                                var var_location = new google.maps.LatLng(35.811364, 51.464511);

                                var var_mapoptions = {
                                    center: var_location,
                                    zoom: 16
                                };

                                var var_marker = new google.maps.Marker({
                                    position: var_location,
                                    map: var_map,
                                    title:"Venice"});

                                var var_map = new google.maps.Map(document.getElementById("map-container"),
                                    var_mapoptions);

                                var_marker.setMap(var_map);

                            }

                            google.maps.event.addDomListener(window, 'load', init_map);

                        </script>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="contact-details">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="bold-title">Contact  details : </h3>
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Office in Tehran</h4>
                                            <ul>
                                                <?php
                                                $Data = mysql_query("SELECT * FROM tbl_contact WHERE Contact_id='1' ");
                                                while($D = mysql_fetch_array($Data))
                                                {
                                                    $Address = $D['Address'];
                                                    $Phone = $D['Phone'];
                                                    $Email = $D['Email'];
                                                }
                                                echo"<li><a href='#'>$Address</a></li>";
                                                echo"<li><a href='#'>$Phone</a></li>";
                                                echo"<li><a href='mailto:$Email' target='_blank'>$Email</a></li>";
                                                ?>

                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Find Us On : </h4>
                                            <ul>
                                                <li><a href="<?php print "https://$F/"; ?>">Facebook</a></li>
                                                <li><a href="<?php print "https://$IN/"; ?>">Instagram </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- contact form -->
                                <div class="contact-form-holder">
                                    <div id="contact-form">
                                        <div id="message"></div>
					 <form action="email.php" method="POST" name="contactform" id="contactform">
                                            <input name="name" type="text" id="name"  onClick="this.select()" value="Name" >
                                            <input name="email" type="text" id="email" onClick="this.select()" value="E-mail" >
                                            <textarea name="comments"  id="comments" onClick="this.select()" >Message</textarea>
                                            <button type="submit"  id="submit"  data-top-bottom="transform: translateY(-50px);" data-bottom-top="transform: translateY(50px);"><span>Send Message </span></button>
                                        </form>
                                    </div>
                                </div>
                                <!-- contact form  end-->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- content end-->
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
<!--=============== google map ===============-->

<!--=============== scripts  ===============-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

</body>
</html>