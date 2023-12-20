<?php

	session_start();
	
	//unset/delete the session variable
	unset($_SESSION['LoginStatus']);
	
	//redirect to homepage
	header('Location: index.html');

?>