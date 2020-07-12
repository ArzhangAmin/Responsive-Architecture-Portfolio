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
                        افزودن Design
                    </header>
                    <?php
                    if(isset($_REQUEST['SubmitForm']))
                    {
                        $path="project/design/";
                        $ProjectImage="";
                        $allowedExts = array("gif", "jpeg", "jpg", "png");
                        $temp = explode(".", $_FILES["img"]["name"]);
                        $extension = end($temp);
                        if ((($_FILES["img"]["type"] == "image/gif")
                                || ($_FILES["img"]["type"] == "image/jpeg")
                                || ($_FILES["img"]["type"] == "image/jpg")
                                || ($_FILES["img"]["type"] == "image/pjpeg")
                                || ($_FILES["img"]["type"] == "image/x-png")
                                || ($_FILES["img"]["type"] == "image/png"))
                            && ($_FILES["img"]["size"] < 20000000)
                            && in_array($extension, $allowedExts)){
                            if ($_FILES["img"]["error"] > 0){
                                echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
                            }
                            else
                            {

                                echo "<div class='alert alert-success alert-block fade in'>
                                    <button data-dismiss='alert' class='close close-sm' type='button'>
                                        <i class='icon-remove'></i>
                                    </button>
                                    <h4>
                                        <i class='icon-ok-sign'></i>
                                        Success!
                                  </h4>
                                </div>";
                                move_uploaded_file($_FILES["img"]["tmp_name"],
                                    "../project/design/". $_FILES["img"]["name"]);
                                $DesignImage = $path. $_FILES["img"]["name"];

                            }}
                        else
                        {
                            echo "
                                <div class='alert alert-block alert-danger fade in'>
                                    <button data-dismiss='alert' class='close close-sm' type='button'>
                                        <i class='icon-remove'></i>
                                    </button>
                                    <strong>اخطار</strong>!عکس آپلود نشد
                             
                                </div>";
                        }
                        $DesignName=$_REQUEST['DesignName'];
                        $DesignDesc=$_REQUEST['DesignDesc'];
  mysql_query("INSERT INTO tbl_design(DesignName,DesignImage,DesignDesc)VALUES('$DesignName','$DesignImage','$DesignDesc')");
                      
                    }
                    ?>
                    <table class="table table-striped border-top" id="sample_1">
                        <form  method="post" enctype="multipart/form-data" >

                            <tbody>
                            <tr class="odd gradeX">

                                <td class="hidden-phone"><a href="#">
                                        عنوان 
                                        </a></td>
                                <td class="hidden-phone">
                                    <input name="DesignName" type="form" class="form-control" style="width:50%">

                                </td>
                            </tr>
                            <tr class="odd gradeX">
                                <td class="hidden-phone"><a href="#">توضیحات</a></td>
                                <td class="hidden-phone">
                   <textarea  class="ckeditor"  id="editor1" rows="10" cols="50" name="DesignDesc" style=" margin-top:10px;" ></textarea>

                                </td>
                            </tr>
                            <tr class="odd gradeX">
                                <td class="hidden-phone">
                                    <a href="#">
                                        عکس design
                                    </a></br>
                                </td>
                                <td class="hidden-phone">
                                    <input type="file" name="img" accept="image/*">
                                </td>
                            </tr>
                           
                           

                            <tr class="odd gradeX">

                                <td class="hidden-phone">
                                    <button type="submit" class="btn btn-shadow btn-success" name="SubmitForm"  >ثبت</button></br>
                                </td>
                                <td class="hidden-phone">
                                </td>
                            </tr>

                        </form>

                        </tbody>
                    </table></br>
                    <table class="table table-striped border-top" >
                        <tr>
                            <th style="width:25px !important;">#</th>
                            <th style="width:100px;">عنوان</th>
                            <th style="width:100px;">تصویر</th>
                            <th style="width:15px;">تنظیمات</th>
                        </tr>
                        <?php
                        $z=1;
                        if(isset($_REQUEST['action'])){
                            $DesignID=$_REQUEST['id'];
                            mysql_query("DELETE FROM tbl_design WHERE DesignID = '$DesignID' ");
                        }

                        $Data = mysql_query("SELECT * FROM tbl_design");
                        while($D = mysql_fetch_array($Data))
                        {	$DesignID = $D['DesignID'];
                            $DesignName= $D['DesignName'];
							$DesignImage= $D['DesignImage'];
                            echo "
				<tr>
			<td> $z </td>  
			<td>$DesignName</td>
			<td><img src='$webroot/$DesignImage' style='width:100px; height:100px;' class='img-thumbnail'></td>	
		 <td>
		<a href='design_add.php?id=$DesignID&action=delete' onclick='return confirm(\"آیا اطمینان دارید؟\");' >
		<button type='submit' name='submit' value='حذف' class='btn btn-danger'>حذف</button>
		</a></td>
		</tr>
		";
                            $z++;}

                        ?>
                    </table>
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
