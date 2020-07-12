 <?php
include('config.php');
?>
<aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a class="" href="index.php">
                            <i class="icon-dashboard"></i>
                            <span>صفحه اصلی</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>مدیریت پروژه ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a  href="project_add.php">افزودن پروژه جدید</a></li>
                            <li><a href="project_list.php">لیست پروژه ها</a></li>
                            <li><a href="cat_add.php">دسته بندی</a></li>
                            <li><a href="design_add.php">مدیریت Design </a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-user "></i>
                            <span>
                                درباره وحید صفوی
                            </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a  href="slogan.php">متن</a></li>
                            <li><a  href="skills.php">مهارت ها</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book "></i>
                            <span>
                                اطلاعات ارتباطی
                            </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a  href="contact_edit.php">ارتباط با ما</a></li>
                        </ul>
                    </li>
					 <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-cogs"></i>
                            <span>تنظیمات</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
						    <li><a class="" href="hf_set.php">هدر و فوتر</a></li>

                        </ul>
                    </li>
              
                    <li>
<a href="<?php print $webroot; ?>">
                            <i class="icon-user"></i>
                            <span>صفحه ورود به سایت</span>
                        </a>
                    </li> 
					<li>
                        <a href="<?php print $webroot."/manage/logout.php"; ?>">
                            <i class="icon-user"></i>
                            <span>خروج</span>
                        </a>
                    </li>
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>