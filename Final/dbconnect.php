<?php

/*

CREATE OR REPLACE DATABASE final;

USE final

CREATE OR REPLACE TABLE tbl_lost(

lostname VARCHAR(255),
lostlocation VARCHAR(255),
lostimage longblob,
imagetype VARCHAR(255),
phoneusercontact VARCHAR(255),
emailusercontact VARCHAR(255),
lost_id int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY

);

CREATE OR REPLACE TABLE tbl_user(
firstname VARCHAR(255),
lastname VARCHAR(255),
username VARCHAR(255) IS UNIQUE,
pwd VARCHAR(255),
user_id int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY
);



*/

try{
		
	/*allows us to use the database*/
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=final','root','');
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$dbstatus = "Good db connection";
	
}catch(PDOException $e){
	
	$dbstatus = "Database connection failed<br>". $e -> getMessage();
	
	die();
	
}

SESSION_START();

?> 