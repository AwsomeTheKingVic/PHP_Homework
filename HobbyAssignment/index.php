<?php

	require('dbfunclibrary.php');

?>

<!DOCTYPE html>
<html lang = "en">

	<head>

		<meta charset = "UTF=8">
		
		<title>Homepage</title>

	</head>
	
	<body>
	
		<header>
		
		</header>
		
		<nav>
		
			<a href = "index.php"><button type = "button">Home</button></a>
			<a href = "allinfo.php"><button type = "button">view full list</button></a>
			<a href = "clear.php"><button type = "button">Clear</button></a>
		
		</nav>
		
		<main>

<?php

	if(!isset($_POST['GameName'])){
		
		echo('
		
				<div>
				
					<h1>Enter Hobby info</h1>
				
					<form action = "index.php" method = "POST">
					
						<table border = "5">
						
							<tr>
							
								<td>GameName</td>
								<td><input type = "text" name = "GameName" id = "GameName" placeholder = "GameName" required></td>
							
							</tr>
							<tr>
							
								<td>GameType</td>
								<td><input type = "text" name = "GameType" id = "GameType" placeholder = "GameType" required></td>
							
							</tr>
							<tr>
							
								<td>HoursPlayed</td>
								<td><input type = "number" name = "HoursPlayed" id = "HoursPlayed" placeholder = "HoursPlayed" required></td>
							
							</tr>
							<tr>
							
								<td>GamePrice</td>
								<td><input type = "number" name = "GamePrice" id = "GamePrice" placeholder = "GamePrice" required></td>
							
							</tr>
							<tr>
							
								<td>Finnished</td>
								<td><input type = "submit" name = "enter"></td>
							
							</tr>
						
						</table>
					
					</form>
				
				</div>	
		
		');
		
	}
	else{
		
		pdoInsert();
		
		pdoPrintLast();
		
		echo('<a href = "index.php"><button type = "button">add new hobbies</button><a>');
		
	}

?>

		</main>
					
		<footer>
		</footer>
	
	</body>
	
</html>