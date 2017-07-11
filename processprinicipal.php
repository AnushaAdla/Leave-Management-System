<?php
	
	/*$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{*/
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		
		/* 
			:: Note to Wakaka Friends
			-----------------------------------------------------------------------------------------
			You can put your MySQL query here to check availability Username & Password from database
		*/
	// to prevent mysql injection
	/*/$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);*/
	
	// connect to the server and select database
	mysql_connect("localhost", "root", "");
	mysql_select_db("loginprinicipal");
	
	// query the database for user
	
	
	
	$result = mysql_query("select id from userspri where username = '".$username."' and password = '".$password."'");
	
	 $row = mysql_num_rows($result); 
	if($row==1)	{
			echo "success";
		}
		else { echo "Failed to login!!!!"; }
?>
