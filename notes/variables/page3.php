<?php

	//destroy the session variable
	//everything goes
	
	session_start();
	
	//delete the entire variable
	session_destroy();
	
	echo('<br><a href = "page2.php">page2</a>');

?>