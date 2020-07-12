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
                    <header class="panel-heading">ویرایش پروژه</header>
                    <?php
					
                    if(isset($_REQUEST['id']))
                    {
                        $id=$_REQUEST['id'];
						$data=mysql_query("SELECT tbl_project.ProjectID,tbl_project.ProjectName,tbl_project.ProjectDesc,tbl_project.ProjectImage,tbl_project.year,tbl_project.num,tbl_category.CatID,tbl_category.CatTitle FROM tbl_project INNER JOIN tbl_category  ON tbl_project.CatID=tbl_category.CatID WHERE ProjectID = '$id' ");
                        while($D=mysql_fetch_array($data))
                        {
                        $ProjectName=$D['ProjectName'];
                        $year=$D['year'];
                        $num=$D['num'];
                        $ProjectDesc=$D['ProjectDesc'];
					    $ProjectImage=$D['ProjectImage'];
                        $CatID1 = $D['CatID'];
                        $CatTitle1=$D['CatTitle'];                 
				       }

                        if(isset($_REQUEST['SubmitForm']))
                        {
                            $path="project/image/";
                            $allowedExts = array("gif", "jpeg", "jpg", "png");
                            $temp = explode(".", $_FILES["img"]["name"]);
                            $extension = end($temp);
                            if ((($_FILES["img"]["type"] == "image/gif")
                                    || ($_FILES["img"]["type"] == "image/jpeg")
                                    || ($_FILES["img"]["type"] == "image/jpg")
                                    || ($_FILES["img"]["type"] == "image/pjpeg")
                                    || ($_FILES["img"]["type"] == "image/x-png")
                                    || ($_FILES["img"]["type"] == "image/png"))
                                && ($_FILES["img"]["size"] < 2000000)
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
                                    <p>	عکس محصول  با موفقیت آپلود شد</p>
                                </div>";
                                    move_uploaded_file($_FILES["img"]["tmp_name"],
                                        "../project/image/". $_FILES["img"]["name"]);
                                    $ProjectImage = $path. $_FILES["img"]["name"];

                                }}
                        
                    
			     $ProjectName=$_REQUEST['ProjectName'];
                             $year=$_REQUEST['year'];
                             $num=$_REQUEST['num'];
                             $ProjectDesc=$_REQUEST['ProjectDesc'];
							 $CatId=$_REQUEST['CatId'];
                            mysql_query("update tbl_project set ProjectName='$ProjectName',ProjectDesc='$ProjectDesc',ProjectImage='$ProjectImage',year='$year',num='$num',CatId='$CatId' where ProjectID='$id' ");
							
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
                                    mysql_query("INSERT INTO tbl_image(ImageAddress,ProjectID)VALUES('$newFilePath','$id')");


                                }
                                                            }
                        }

                        }

                        echo" <table class='table table-striped border-top' id='sample_1'>
                              <form  method='post' enctype='multipart/form-data'>
                         
                                <tbody>
                                    <tr class='odd gradeX'>
                                           
                                        <td class='hidden-phone'><a href='#'>عنوان پروژه</a></td>
                                        <td class='hidden-phone'>
										<input name='ProjectName' value='$ProjectName' type='form' class='form-control' style='width:50%'>

										</td>
                                    </tr>
									<tr class='odd gradeX'>
                                           
                                        <td class='hidden-phone'><a href='#'>تاریخ</a></td>
                                        <td class='hidden-phone'>
										<input name='year' value='$year' type='form' class='form-control' style='width:20%'>

										</td>
                                    </tr>
									
									<tr class='odd gradeX'>
                                           
                                        <td class='hidden-phone'><a href='#'>شماره پروژه</a></td>
                                        <td class='hidden-phone'>
										<input name='num' value='$num' type='form' class='form-control' style='width:20%'>

										</td>
                                    </tr>
									
									<tr class='odd gradeX'>
                                          
                                        <td class='hidden-phone'><a href='#'>توضیحات</a></td>
                                        <td class='hidden-phone'>
										<textarea  class='ckeditor'  id='editor1' rows='10' cols='50' name='ProjectDesc' style=' margin-top:10px;' >$ProjectDesc</textarea>

                                        </td>
                                    </tr>
									<tr class='odd gradeX'>
                                           
                                        <td class='hidden-phone'><a href='#'>دسته بندی</a></td>
                                        <td class='hidden-phone'>
<select size='1' name='CatId' aria-controls='sample_1' class='form-control' style='width:30%'>";
                                           $Data = mysql_query("SELECT * FROM tbl_category  ");
                                           while($D = mysql_fetch_array($Data)) {
                                               $CatID = $D['CatID'];
                                               $CatTitle = $D['CatTitle'];
											   	if($CatID==$CatID1)
												echo" <option selected='selected' value='$CatID1'>$CatTitle1</option>";
                                                else
											    echo " <option value='$CatID'>$CatTitle</option>";
										   
										   }
                                       
                                echo"    </select>
										</td>
                                    </tr>
									<tr class='odd gradeX' style='background:#EEE;'>
                                           
                                        <td class='hidden-phone'>
										 تغییر عکس اصلی پروژه </br>";   
							             if(! $ProjectImage=="")
                        {
                            echo"<img src='$webroot/$ProjectImage' style='width:200px; height:150px;' class='img-thumbnail'>";
                        }
                        echo"</td>
										<td class='hidden-phone'>
										 <input type='file' name='img' accept='image/*'>
										</td>
                                    </tr>
									<tr><td>تغییرعکس های دیگر پروژه</td> </tr>"; 
										 
										$Data = mysql_query("SELECT * FROM tbl_image where ProjectID = '$id'   ");
                                           while($D = mysql_fetch_array($Data)) {
                                               $ImageID = $D['ImageID'];
                                               $ImageAddress = $D['ImageAddress'];
											 if(! $ImageAddress=="")
											 {
                            echo"
							<tr class='odd gradeX'>
							<td class='hidden-phone'>
							<img src='$ImageAddress' style='width:200px; height:150px;' class='img-thumbnail'></td>
							<td class='hidden-phone'>
					 <a href='project_edit.php?id=$id&imgid=$ImageID&action=delete' onclick='return confirm(\"آیا اطمینان دارید؟\");' >
                             <button style='margin-left:10px;width:100px; margin-top:50px;' type='button' class='btn btn-shadow btn-danger'>حذف</button></a>
							</td>
							</tr>";
                        }}
						 $Totul=mysql_fetch_array(mysql_query("SELECT COUNT(ImageID) FROM tbl_image where ProjectID = '$id'"));
						 $Count=$Totul[0];
						 $r=10-$Count;
						 for($i = 1; $i<=$r; $i++)
                        {
							echo"<tr><td class='hidden-phone'><input type='file' name='uploaded[]'></td></tr>";
						}
?>

                        <tr class="odd gradeX">

                            <td class="hidden-phone">
                                <button type="submit"  class="btn btn-shadow btn-success" name="SubmitForm" >بروزرسانی</button></br>
                            </td>
                            <td class="hidden-phone">
                            </td>
                        </tr>


                        <?php
                        echo"</form>";
                    }
					 if(isset($_REQUEST['action']))
                        {
                            $ID=$_REQUEST['imgid'];
                            mysql_query("DELETE FROM  tbl_image WHERE ImageID = '$ID' ");
							header("Location: ".$webroot."/manage/project_edit.php?id=".$id);
                            exit();
							
                        }

					
                    ?>

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
