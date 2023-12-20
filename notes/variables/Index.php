<!DOCTYPE html>

<html lang="en">

	<head>
	
		<meta charset="utf-8">
	
		<title>index</title>
		
		<?php
		
			//first step is session_start()
			session_start();
		
		?>

	</head>
	
	<body>
		
		<?php
		
			//assign values to a session variables
			$_SESSION['firstName'] = "Bubba";
			$_SESSION['lastName'] = "Smith";
			
			
			//quick review on how to add to arrays
			$myArray = array("Larry","Curly","Moe");
			array_push($myArray, "Shemp");
			$myArray[4] = "Curly Joe";
			$myArray[count($myArray)] = "Jim";
			
			$_SESSION["stooges"] = $myArray;
			
			$arrayManagers = array(
			
			"CEO" => "Sally",
			"CIO" => "Jim",
			"CFO" => "Suzy",
			"CSO" => "Billy"
			
			);
			
			$_SESSION['managers'] = $arrayManagers;
			
			
		
		?>
		
		<h1>Session Variables</h1>
		
		<p>List the values of the session variables</p>
		
		<?php
		
			echo('$_SESSION<br>');
			print_r($_SESSION);
			echo('<br><hr><br>');
			print_r($_SESSION['stooges']);
			echo('<br><hr><br>');
			print_r($_SESSION['stooges'][0]);
			echo('<br><hr><br><br>');
			
			for($i = 0; $i < count($_SESSION['stooges']);$i++){
				
				echo($_SESSION['stooges'][$i].'<br>');
				
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