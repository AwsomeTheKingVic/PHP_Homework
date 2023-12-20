<?php

	session_start();
	
	session_destroy();
	
	//redirect
	//nothing infront of php
	header("Location: page2.php");
	
	//exit script
	//can also use exit();
	die();

?>