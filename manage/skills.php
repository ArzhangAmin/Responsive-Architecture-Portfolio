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
افزودن مهارت
                    </header>
                    <?php

                    if(isset($_REQUEST['SubmitForm']))
                    {
                        $skill=$_REQUEST['skill'];
                        $percent=$_REQUEST['percent'];
                        if(! $skill == ""){

                            mysql_query("INSERT INTO tbl_skills(skill,percent)VALUE('$skill','$percent')");
                        }}
                    ?>
                    <table class="table table-striped border-top" id="sample_1" >
                        <form  method="post" enctype="multipart/form-data">
                            <tbody>
                            <tr class="odd gradeX">
                                <td ><a href="#">
                                        عنوان مهارت
                                        </a></td>
                                <td >
                                    <input name="skill" type="form" class="form-control" style="width:30%" >
                                </td>
                                </td>
                            </tr>

                            <tr class="odd gradeX">
                                <td width="40" ><a href="#">
درصد
                                    </a></td>
                                <td >
                                    <input name="percent" type="form" class="form-control" style="width:30%">
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
                            $Skill_ID=$_REQUEST['id'];
                            mysql_query("DELETE FROM tbl_skills WHERE Skill_ID = '$Skill_ID' ");
                        }

                        $Data = mysql_query("SELECT * FROM tbl_skills");
                        while($D = mysql_fetch_array($Data))
                        {	$Skill_ID = $D['Skill_ID'];
                            $skill= $D['skill'];
                            echo "
				<tr>
			<td> $z </td>  
			<td>$skill</td>
		 <td>
		<a href='skills.php?id=$Skill_ID&action=delete' onclick='return confirm(\"آیا اطمینان دارید؟\");' >
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
