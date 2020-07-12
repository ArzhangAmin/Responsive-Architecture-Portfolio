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
<footer class="fixed-footer">
    <div class="footer-social">
        <ul>

            <li><a href="<?php print "https://$F/"; ?>" target="_blank">
                                <span class="fa-stack fa-sm">
                                 <i class="fa fa-square-o fa-stack-2x"></i>
                                 <i class="fa fa-facebook fa-stack-1x"></i>
                                </span>
                </a></li>
            <li><a href="<?php print "https://$IN/"; ?>" target="_blank" ><span class="fa-stack fa-sm">
                                 <i class="fa fa-square-o fa-stack-2x"></i>
                                 <i class="fa fa-instagram fa-stack-1x"></i>
                                </span></a></li>

        </ul>
    </div>
    <!-- Header  title -->
    <div class="footer-title">
        <h2><a  href="#"></a></h2>
    </div>
    <!-- Header  title  end-->
</footer>