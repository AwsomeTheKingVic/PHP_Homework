<?php

	session_start();
	
	unset($_SESSION['teamInfo']);
	
	session_destroy();
	
	header("Location: index.html");
	
	die();

?>