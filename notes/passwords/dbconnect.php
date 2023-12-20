<?php
// dbconnect.php

/*
DROP DATABASE IF EXISTS wp_newuser_demo;

-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS wp_newuser_demo ;

-- Use Database
USE wp_newuser_demo;

CREATE TABLE tbl_user(
	firstname VARCHAR(255),
	lastname VARCHAR(255),
	username VARCHAR(255) UNIQUE NOT NULL,
	pwd VARCHAR(255) NOT NULL,
	user_id int(9) AUTO_INCREMENT PRIMARY KEY);



*/

// connect to database
try
{
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=wp_newuser_demo','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

//only for educational purposes
$dbstatus = "Good db connection";

}
catch(PDOException $e)
{
	$dbstatus = 	"Database connection failed<br>".
				$e->getMessage();

	die();

}

SESSION_START();

?>


