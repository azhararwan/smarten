<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_USER_ID is present or not
	if(!isset($_SESSION['SESS_USER_ID']) || (trim($_SESSION['SESS_USER_ID']) == '')) {
		header("location: ../index.php");
		exit();
	}
?>