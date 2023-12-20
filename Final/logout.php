<?php
	
	/*logsout the user*/
	session_start();
	
	unset($_SESSION['LoginStatus']);
	
	header('Location: index.html');

?>