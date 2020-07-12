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
                        افزودن پروژه جدید
                    </header>
                    <?php
                   if(isset($_REQUEST['SubmitForm']))
                    {
                        $path="project/image/";
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
                                    "../project/image/". $_FILES["img"]["name"]);
                                $ProjectImage = $path. $_FILES["img"]["name"];

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
                        $ProjectName=$_REQUEST['ProjectName'];
                        $year=$_REQUEST['year'];
                        $num=$_REQUEST['num'];
                        $ProjectDesc=$_REQUEST['ProjectDesc'];
                        $CatId=$_REQUEST['CatId'];
                             if($year==""||$num==""){
                             echo "<div class='alert alert-block alert-danger fade in'>
                                    <button data-dismiss='alert' class='close close-sm' type='button'>
                                        <i class='icon-remove'></i>
                                    </button>
                                    <strong>پر کردن فیلد تاریخ و شماره پروژه لازم است!</strong>
                             
                                </div>";
                          
                              }
                     mysql_query("INSERT INTO `tbl_project`(`ProjectName`,`ProjectDesc`,`ProjectImage`,`year`,`num`,`CatID`)VALUES('".$ProjectName."','".$ProjectDesc."','".$ProjectImage."','$year','".$num."','$CatId')");
                        $last_id= mysql_insert_id();
                        for($i = 0; $i < count($_FILES['uploaded']['name']); $i++)
                        {
                            //get the temp_file_path and name_file;
                            $tmpFilePath = $_FILES['uploaded']['tmp_name'][$i];
                            $fileName = $_FILES['uploaded']['name'][$i];
                            //make sure we have a filepath;
                            if ($tmpFilePath != "")
                            {
                                //our new file path;
                                $newFilePath = "../project/" . $_FILES['uploaded']['name'][$i];

                                //upload the file;
                                if(move_uploaded_file($tmpFilePath, $newFilePath))
                                {

                                    //more handle .. add insert statement here to insert file address into database;
                                    mysql_query("INSERT INTO tbl_image(ImageAddress,ProjectID)VALUES('$newFilePath','$last_id')");


                                }else{
                                    echo "Error...";
                                }
                            }
                        }

                    } 
                    ?>
                    <table class="table table-striped border-top" id="sample_1">
                        <form  method="post" enctype="multipart/form-data" >

                            <tbody>
                            <tr class="odd gradeX">

                                <td class="hidden-phone"><a href="#">
                                        عنوان پروژه
                                        </a></td>
                                <td class="hidden-phone">
                                    <input name="ProjectName" type="form" class="form-control" style="width:50%">

                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td class="hidden-phone"><a href="#">
تاریخ
                                    </a></td>
                                <td class="hidden-phone">
                                    <input name="year" type="text" class="form-control" style="width:20%">

                                </td>
                            </tr>
                            <tr class="odd gradeX">
                                <td class="hidden-phone"><a href="#">
شماره پروژه
                                    </a></td>
                                <td class="hidden-phone">
                                    <input name="num" type="text" class="form-control" style="width:20%">

                                </td>
                            </tr>
                            <tr class="odd gradeX">


                                <td class="hidden-phone"><a href="#">توضیحات</a></td>
                                <td class="hidden-phone">
                                    <textarea  class="ckeditor"  id="editor1" rows="10" cols="50" name="ProjectDesc" style=" margin-top:10px;" ></textarea>

                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td class="hidden-phone">
                                    <a href="#">
                                        عکس اصلی پروژه
                                    </a></br>
                                </td>
                                <td class="hidden-phone">
                                    <input type="file" name="img" accept="image/*">
                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td class="hidden-phone">
                                    <a href="#">
عکس های دیگر پروژه
                                    </a></br>
                                </td>
                                <td class="hidden-phone">
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>
                                    <input type="file" name="uploaded[]"><br>

                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td class="hidden-phone">
                                    <a href="#">دسته بندی</a></td>
                                <td class="hidden-phone">

                                    <select size="1" name="CatId" aria-controls="sample_1" class="form-control" style="width:30%">
                                        <?php
                                           $Data = mysql_query("SELECT * FROM tbl_category");
                                           while($D = mysql_fetch_array($Data)) {
                                               $CatID = $D['CatID'];
                                               $CatTitle = $D['CatTitle'];
                                               echo " <option value=\"$CatID\">$CatTitle</option>";
                                           }
                                        ?>

                                    </select>
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
