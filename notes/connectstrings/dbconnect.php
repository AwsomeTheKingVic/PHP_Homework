<?php
// dbconnect.php

/*
-- Database
DROP DATABASE IF EXISTS wp_cars;

-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS wp_cars;

-- Use Database
USE wp_cars;

CREATE TABLE `wp_cars`.`tbl_car`(
    `OwnerFN` VARCHAR(20),
    `OwnerLN` VARCHAR(20),
    `Make` VARCHAR(20),
    `Model` VARCHAR(20),
    `Color` VARCHAR(20),
    `CarYear` CHAR(4),
    `Car_Id` INT(6) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(`Car_Id`)
) ENGINE = InnoDB;

*/

//connect to Database
try{
	
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=wp_cars', 'root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//only for educational purposes
	$dbstatus = "good db connection";
	
}
catch(PDOException $e){
	
	$dbstatus = "Database connection failed<br>".$e->getMessage();
	
	die();
	
}

session_start();

?>


