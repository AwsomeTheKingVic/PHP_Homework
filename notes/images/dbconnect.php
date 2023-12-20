<?php

	try{
		
		$pdo = new PDO("mysql:hostname=localhost;dbname=wp_doggyembed", 'root','');
		
	}
	catch(PDOException $e){
		
		die();
		
	}
	
	session_start();

?>