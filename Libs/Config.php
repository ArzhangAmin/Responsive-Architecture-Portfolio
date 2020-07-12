<?php
$Database=mysql_connect("localhost","...","...");
	mysql_select_db("...",$Database);
	mysql_set_charset('utf8',$Database);
	
	
	$webroot="YOUR WEBSITE ADDRESS";
	ob_start();
		
	@session_start();
	error_reporting('~EALL');
	set_time_limit(0);
	if(defined("SubKERNEL")){
		define("KERNEL", SubKERNEL);
	} else {
		define("KERNEL", ".");
	}
	include_once(KERNEL.'/Libs/Class.jdf.php');
	if(!isset($_SESSION['mycarts'])){ $_SESSION['mycarts'] = ""; }



		function email($from,$to = "",$content,$subject){
			$message = "<html><body bgcolor=\"#DCEEFC\">".$content." <p>To : $to </p> </body></html>";
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=UTF-8\r\n";
			$headers .= "From: $from";
			mail($to, $subject, $message, $headers);
		}

?>