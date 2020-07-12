<?php
include('../config.php');
$METAQ = mysql_query("SELECT * FROM rt_setting ");
$META = array();
while($M = mysql_fetch_array($METAQ)){
    $META[$M['OptionsName']] = $M['OptionValue'];
}
$AU = $META['ABOUT_US'];
?>
<footer class="content-footer">
    <!--  container  -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Footer logo -->
                <div class="footer-item footer-logo">
                    <a href="<?php print $webroot; ?>" class="ajax"><img style=" max-width: 100%; height: auto !important;" src="<?php print $webroot; ?>/site/images/final-logo.png" alt=""></a>
                    <p style="margin-left: 10px;"><?php echo $AU; ?></p>
                </div>

                <!-- Footer logo end -->
            </div>
            <!-- Footer info -->
            <div class="col-md-2">
                <div class="footer-item">
                    <h4 class="text-link">Call</h4>
                    <?php
                                                $Data = mysql_query("SELECT * FROM tbl_contact WHERE Contact_id='1' ");
                                                while($D = mysql_fetch_array($Data))
                                                {
                                                    $Address = $D['Address'];
                                                    $Phone = $D['Phone'];
                                                    
                                                }

                    echo"<ul>
                        <li><a href=''#'>$Phone</a></li>
                        <li><a href=''#'>09121773460</a></li>
                    </ul>
                </div>
            </div>
            <div class='col-md-2'>
                <div class='footer-item'>
                    <h4 class='text-link'>Write</h4>
                    <ul>
                        <li><a></a></li>
                    </ul>
                </div>
            </div>
            <div class='col-md-2'>
                <div class='footer-item'>
                    <h4 class='text-link'>Visit</h4>
                    <ul>
                        <li><span>$Address</span></li>
                        <li> <a href='contact.php' target='_blank'>View on map</a></li>
                    </ul>
                </div>
            </div>
        </div>";
                    ?>
        <!-- Footer copyright -->
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="footer-wrap">
                                        <span class="copyright">
@VAHID SAFAVI 2016.ALL RIGHTS RESERVED.
        </span>
					
                    <span class="to-top">To Top</span></br>
                     <P style="color:White;" >			Designed By <a style="color:#ff6163;" href="http://coral-tech.ir/" >
CORAL TECH
                        </a></P>
               
                </div>
            </div>
        </div>
        <!-- Footer copyright end -->
    </div>
    <div style='margin:auto;margin-top:60px'>
    <!-- Statistics by www.1abzar.com --->
<script type="text/javascript" src="http://1abzar.ir/abzar/tools/stat/amar-v3-ramz.php?mod=2&amar=fpz7uw2fwt0dzjawgo3tlgz66i34dd&p=56558ef3306ed59feee1e3ad75075429"></script><div style="display:none"><h3><a href="http://www.1abzar.com/abzar/stat.php"> <i class="fa fa-square-o fa-stack-2x"></i>
                                 <i class="fa fa-instagram fa-stack-1x"></i>&#1570;&#1605;&#1575;&#1585;&#1711;&#1740;&#1585; &#1608;&#1576;&#1604;&#1575;&#1711;</a></h3></div>
<!-- Statistics by www.1abzar.com --->
        <!-- Main end -->
    </div>
    <!--  container  end -->
    <!-- Hover animation  -->
    <canvas class="particular"></canvas>
    <!-- Hover animation  end -->
     
</footer>