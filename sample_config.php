<?php
     include('config.php');
	include_once(__DIR__.'class.login.php');
	$Login = new LoginSystem();

	$Login->LogoutRedirect = "login.php";
	$Login->LoginRedirect = "login.php";
	$Login->LoginAfterRedirect = "./manage/";

?>