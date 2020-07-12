<?php

	if( !isset($_SESSION['mng_login']) ) { 
		$_SESSION['mng_login'] = ""; 
	}
	
	function mgr_check_login(){
		if( isset($_SESSION['mng_login']) ){
			/*
			* Login algorithm -
			* --UserName^md5(PassWord)^datetime
			*/
			$session_data = mysql_real_escape_string(htmlspecialchars($_SESSION['mng_login']));
			$explode_data = explode('^',$session_data);
				if( is_array($explode_data) && count($explode_data) == 3 ){
					$UserName    = $explode_data[0];
					$PassWord   = $explode_data[1];
					$datetime = $explode_data[2];
					$finder = mysql_num_rows(mysql_query("SELECT * FROM user_members WHERE UserName = '$UserName' AND PassWord = '$PassWord' LIMIT 1"));
					if($finder == ""){
						$_SESSION['mng_login'] == "";
						return false;
					} else { 
						return true;
					}
				} else {
					return false;
				}
			
		} else {
			$_SESSION['mng_login'] = "";
			return false;
		}
	}

	function mgr_set_logged($UserName,$pass){
		global $webroot;
		if( isset($_SESSION['mng_login']) ){
		
			$datetime = "0";
			$_SESSION['mng_login'] = $UserName."^".$pass."^".$datetime;
			header('Location: '.$webroot.'/manage/index.php');
		
		}
	}
	
	function mgr_logout(){
		global $webroot;
		unset($_SESSION['mng_login']);
		header('Location: '.$webroot);
	}
	
	function mgr_get_user_field($field){
			$session_data = mysql_real_escape_string(htmlspecialchars($_SESSION['mng_login']));
			$explode_data = explode('^',$session_data);
				if( is_array($explode_data) && count($explode_data) == 3 ){
					$UserName    = $explode_data[0];
					$PassWord   = $explode_data[1];
					$datetime = $explode_data[2];
					$finder = mysql_fetch_array(mysql_query("SELECT $field FROM user_members WHERE UserName = '$UserName' AND PassWord = '$PassWord' LIMIT 1"));
						return $finder[$field];	
				}
	}	

	
?>