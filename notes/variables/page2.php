<!DOCTYPE html>

<html lang="en">

	<head>
	
		<meta charset="utf-8">
	
		<title>Page2</title>
		
		<?php

			session_start();
		
		?>

	</head>
	
	<body>
		
		<h1>Page 2</h1>
		
		<?php
		
			//show info from index
			
			echo($_SESSION['firstName']."&nbsp".$_SESSION['lastName']."<br>");
			
			echo($_SESSION['stooges'][1].'<br>');
			echo($_SESSION['stooges'][0].'<br>');
			echo($_SESSION['managers']['CFO'].'<br>');
		
		?>
		
		<br><hr><br>
		
		<h2>Managers</h2>
		
		<?php
		
			foreach($_SESSION['managers'] as $key => $value){
				
				echo("Title: ". $key."&nbsp;&nbsp;&nbsp;".$value."<br>");
				
			}
		
		?>
		
		<br><hr><br>
		
		<a href = "Index.php">Home</a>
		<a href = "page2.php">Page 2</a>
		<a href = "page3.php">destroy session variable</a>
		<a href = "page4.php">destroy</a>
		<a href = "page5.php">destroy some variables</a>
		
	</body>
	
</html>