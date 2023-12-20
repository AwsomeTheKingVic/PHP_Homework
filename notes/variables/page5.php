<?php

	session_start();
	
	//delete a field in the session variable
	//use unset command
	unset($_SESSION['managers']);
	
	unset($_SESSION['firstName']);
	
	unset($_SESSION['stooges'][0]);
	
	//redirect
	header("Location: page2.php");
	
	die();
	

?>