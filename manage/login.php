<?php
  set_time_limit(0);
  define("SubKERNEL", "..");

    include_once('../Libs/Config.php');
  include_once('../Libs/Class.security.php');
    if(mgr_check_login() == true){
      header("Location: ".$webroot."/manage/index.php");
      exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body">

    <div class="container">
  
<?php
	
			if(isset($_REQUEST['submit']))
			{
				$UserName = mysql_real_escape_string(htmlspecialchars($_REQUEST['UserName']));
				$PassWord = mysql_real_escape_string(htmlspecialchars($_REQUEST['PassWord']));
					$Counter = mysql_fetch_array(mysql_query("SELECT COUNT(UserID) FROM user_members WHERE UserName = '$UserName' AND PassWord = '$PassWord' "));
					if($Counter[0] >= 1)
					{
						mgr_set_logged($UserName,$PassWord);
					} else
					 {
						echo"
							<font color='red'>مشخصات وارد شده اشتباه میباشد.</font>
						";
					}
			}
		?>

      <form class="form-signin" >
        <h2 class="form-signin-heading">ورود به پنل مدیریت</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="نام کاربری"  id="UserName" name="UserName" autofocus>
            <input type="password" class="form-control" placeholder="کلمه عبور"  id="PassWord" name="PassWord">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> مرا به خاطر بسپار
                <span class="pull-right"> <a href="#"> کلمه عبور را فراموش کرده اید؟</a></span>
            </label>
			 <input name="submit" type="submit" value="ورود" class="btn btn-lg btn-login btn-block" >          
            <div class="login-social-link">
                
            </div>

        </div>

      </form>

    </div>


  </body>
</html>
