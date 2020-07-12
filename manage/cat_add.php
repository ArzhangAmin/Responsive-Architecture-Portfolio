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
افزودن دسته بندی پروژه ها
                    </header>
                    <?php

                    if(isset($_REQUEST['SubmitForm']))
                    {
                          $CatTitle=$_REQUEST['CatTitle'];
                        if(! $CatTitle == ""){

                            mysql_query("INSERT INTO tbl_category(CatTitle)VALUE('$CatTitle')");
                        }}
                    ?>
                    <table class="table table-striped border-top" id="sample_1">
                        <form  method="post" enctype="multipart/form-data">
                            <tbody>
                            <tr class="odd gradeX">
                                <td width="30" ><a href="#">عنوان دسته بندی</a></td>
                                <td >
                                    <input name="CatTitle" type="form" class="form-control" width="70" >
                                </td>
                                </td>
                            </tr>
                            <tr class="odd gradeX">

                                <td >
                                    <button type="submit" class="btn btn-success" name="SubmitForm"  style="color:#FFF; width:100px;">ثبت</button></td>
                                <td>

                                </td>

                            </tr>
                        </form>
                        </tbody>
                    </table></br>
                    <table class="table table-striped border-top" >
                        <tr>
                            <th style="width:25px !important;">#</th>
                            <th style="width:100px;">عنوان</th>
                            <th style="width:15px;">تنظیمات</th>
                        </tr>
                        <?php
                        $z=1;
                        if(isset($_REQUEST['action'])){
                            $CatID=$_REQUEST['id'];
                            mysql_query("DELETE FROM tbl_category WHERE CatID = '$CatID' ");
                        }

                        $Data = mysql_query("SELECT * FROM tbl_category");
                        while($D = mysql_fetch_array($Data))
                        {	$CatID = $D['CatID'];
                            $CatTitle= $D['CatTitle'];
                            echo "
				<tr>
			<td> $z </td>  
			<td>$CatTitle</td>
		 <td>
		<a href='cat_add.php?id=$CatID&action=delete' onclick='return confirm(\"آیا اطمینان دارید؟\");' >
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
