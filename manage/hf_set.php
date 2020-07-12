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
                          <header class="panel-heading">تنظیمات  </header>
						
		 <?php
if(isset($_REQUEST['ID']))
{  exit;
	}
    
if(isset($_REQUEST['goupdate']))   
{
	
	 $Title = mysql_real_escape_string(htmlspecialchars($_REQUEST['site']['title']));
	 $facebook = mysql_real_escape_string(htmlspecialchars($_REQUEST['site']['facebook']));
    $instagram = mysql_real_escape_string(htmlspecialchars($_REQUEST['site']['instagram']));


if( ($Title != "")  AND($facebook != "") AND ($instagram != "")  ){
	
	mysql_query("UPDATE rt_setting SET OptionValue = '$Title'     WHERE OptionsName = 'DEFAULT_TITLE' ");
	mysql_query("UPDATE rt_setting SET OptionValue = '$facebook'  WHERE OptionsName = 'FACEBOOK' ");
	mysql_query("UPDATE rt_setting SET OptionValue = '$instagram'  WHERE OptionsName = 'INSTAGRAM' ");



echo"
									<div class='alert alert-success' style='font-size:13px; margin-top:10px;' >
										تنظیمات مدیریت با موفقیت بروز شده است.
									</div>
								";
					}}
	  

			$arr = array();
			$Get = mysql_query("SELECT * FROM rt_setting");
			while($g = mysql_fetch_array($Get)){
				$arr[$g['OptionsName']] = $g['OptionValue'];

			}
			?>
		
			 <table class="table table-striped border-top" id="sample_1">
        <form   method="POST">
                         
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td class="hidden-phone"><a href="#">عنوان سایت:</a></td>
                                        <td class="hidden-phone">
										<input name='site[title]' value='<?php print $arr['DEFAULT_TITLE']; ?>'  type="form" class="form-control" style="width:60%">
                                      </td>
                                    </tr>
									  <tr class="odd gradeX">
                                        <td class="hidden-phone"><a href="#">آدرس لینک facebook:</a></td>
                                        <td class="hidden-phone">
										<input name='site[facebook]' value='<?php print $arr['FACEBOOK']; ?>' type="form" class="form-control" style="width:60%">
                                      </td>
                                    </tr>
									  <tr class="odd gradeX">
                                        <td class="hidden-phone"><a href="#">آدرس لینک instagram :</a></td>
                                        <td class="hidden-phone">
										<input name='site[instagram]' value='<?php print $arr['INSTAGRAM']; ?>' type="form" class="form-control" style="width:60%">
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
