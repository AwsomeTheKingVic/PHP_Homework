<?php

/*

CREATE OR REPLACE TABLE tbl_user(
firstname VARCHAR(255),
lastname VARCHAR(255),
username VARCHAR(255) IS UNIQUE,
pwd VARCHAR(255),
user_id int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY
);

create or REPLACE TABLE tbl_image(
imagename VARCHAR(255),
userimage longblob,
imagetype VARCHAR(255),
imagesize int(45),
user_id INT(9),,
image_id int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,
CONSTRAINT fk_userimage FOREIGN KEY(user_id ) REFERENCES tbl_user(user_id) ON DELETE CASCADE
);

*/

try{
	
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=mockloginweb','root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$dbstatus = "Good db connection";
	
}catch(PDOException $e){
	
	$dbstatus = "Database connection failed<br>". $e->getMessage();
	
	die();
	
}

SESSION_START();

?>