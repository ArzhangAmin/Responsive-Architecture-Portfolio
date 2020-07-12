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
                    <header class="panel-heading">لیست پروژه ها<header>
                    <table class="table table-striped border-top">
                        <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th class="hidden-phone">عنوان</th>
                            <th class="hidden-phone">دسته بندی</th>
                            <th class="hidden-phone">تنظیمات</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $z= 1 ;
                        if(isset($_REQUEST['ID']))
                        {
                            exit;
                        }
                        if(isset($_REQUEST['page']))
                        {   $page=$_REQUEST['page'];
                        }
                        else{
                            $page=1;
                        }
                        $Start=($page*10)-10;
                        $End=10;

                        if(isset($_REQUEST['action']))
                        {
                            $ID=$_REQUEST['id'];
                            mysql_query("DELETE FROM  tbl_project WHERE ProjectID = '$ID' ");
                        }

                        $Data=mysql_query("SELECT tbl_project.ProjectID,tbl_project.ProjectName,tbl_category.CatTitle FROM tbl_project INNER JOIN tbl_category  ON tbl_project.CatID=tbl_category.CatID ORDER BY ProjectID ASC LIMIT $Start,$End  ");
                        while($D = mysql_fetch_array($Data))
                        {
                            $ProjectID= $D['ProjectID'];
                            $ProjectName= $D['ProjectName'];
                            $CatTitle= $D['CatTitle'];


                            echo" <tr class='odd gradeX'>
                                        <td>$z</td>
                                        <td class='hidden-phone'><a href='#'>$ProjectName</a></td>
                                        <td class='hidden-phone'>$CatTitle</td>
                                        <td class='hidden-phone'>
										<a href='project_edit.php?id=$ProjectID'>
										<button type='button' class='btn btn-shadow btn-warning'>ویرایش محصول</button></a>
									    <a href='project_list.php?page=$page&id=$ProjectID&action=delete' onclick='return confirm(\"آیا اطمینان دارید؟\");' >
                                        <button style='margin-left:10px' type='button' class='btn btn-shadow btn-danger'>حذف</button></a>
										</td>
                                    </tr>";
                            $z++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="dataTables_info" id="sample_1_info"></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="dataTables_paginate paging_bootstrap pagination">
                                <ul>
                                    <?php

                                    $Totul=mysql_fetch_array(mysql_query("SELECT COUNT(ProjectID) FROM tbl_project"));
                                    $Count=$Totul[0];
                                    $PageCount=ceil($Count/10);
                                    for($i=1;$i<=$PageCount;$i++)
                                    {
                                        echo"<li><a href='project_list.php?page=$i'>$i</a></li>";
                                    }
                                    ?>


                                </ul>
                            </div>
                        </div>
                    </div>
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
