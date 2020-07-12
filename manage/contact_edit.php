<?php
include('header.php');
include('sidebar.php');
?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
ارتباط با ما
                  </header>

                    <?php
                    if(isset($_REQUEST['goupdate']))
                    {
                        $Contact_Text = mysql_real_escape_string(htmlspecialchars($_REQUEST['Contact_Text']));
                        $Address = $_REQUEST['Address'];
                        $Phone = $_REQUEST['Phone'];
                        $Email = $_REQUEST['Email'];

                        if( $Contact_Text != "" ){

                            mysql_query("UPDATE  tbl_contact SET Contact_Text = '$Contact_Text', Address='$Address', Phone='$Phone', Email='$Email' WHERE Contact_id='1' ");

                            echo"
									<div class='alert alert-success' style='font-size:13px; margin-top:10px;' >
اطلاعات ارتباطی بروز رسانی شد.
</div>
								";
                        }}

                    ?>
                    <?php
                    $Get = mysql_query("SELECT * FROM tbl_contact WHERE Contact_id='1' ");
                    while($g = mysql_fetch_array($Get)){
                       $Contact_Text = $g['Contact_Text'];
                        $Address = $g['Address'];
                        $Phone = $g['Phone'];
                        $Email = $g['Email'];

                    }
                    ?>

                    <table class="table table-striped border-top" id="sample_1">
                        <form   method="POST">

                            <tbody>
                            <tr class="odd gradeX">

                                <td class="hidden-phone"><a href="#">متن:</a></td>
                                <td class="hidden-phone">

                                    <textarea type="form" class="form-control" style="width:100%; "  rows="10" cols="50"  name='Contact_Text'   ><?php echo $Contact_Text; ?></textarea>
                                </td>

                            </tr>
                            <tr class="odd gradeX">

                                <td class="hidden-phone"><a href="#">آدرس</a></td>
                                <td class="hidden-phone">

                                    <input type="text" class="form-control" style="width:100%; "   name='Address' value="<?php echo $Address; ?>"  >
                                </td>

                            </tr>
                            <tr class="odd gradeX">

                                <td class="hidden-phone"><a href="#">تلفن</a></td>
                                <td class="hidden-phone">

                                    <input type="tel" class="form-control" style="width:100%; "   name='Phone'  value="<?php echo $Phone; ?>" >
                                </td>

                            </tr>
                            <tr class="odd gradeX">

                                <td class="hidden-phone"><a href="#">ایمیل</a></td>
                                <td class="hidden-phone">

                                    <input type="email" class="form-control" style="width:100%; "   name='Email'  value="<?php echo $Email; ?>" >
                                </td>

                            </tr>

                            <tr class="odd gradeX">

                                <td class="hidden-phone">

                                    <button type="submit" class="btn btn-success" name='goupdate' value="ثبت" style="color:#FFF; width:100px;">ثبت</button></td>


                                <td class="hidden-phone">

                                </td>

                            </tr>




                        </form>

                        </tbody>
                    </table></br>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->
<script src="js/dynamic-table.js"></script>


</body>
</html>
