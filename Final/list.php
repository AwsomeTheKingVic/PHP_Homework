<?php

require('dbconnect.php');

/*gets the lost person data*/
$sql = 'SELECT * FROM tbl_lost';

$rs = $pdo -> query($sql);

echo('

<!DOCTYPE html>
<html>

	<head>
	
		<title>The Losts Info</title>
		
		<!--- gives the information placed into boxes that then can be configured -->
		<style>
		
			nav{
				
				clear:both;
				padding-bottom: 10px;
				
			}
		
			.box{
				
				float: left;
				border: 5px solid black;
				height: 300px;
				width: 300px;
				padding: 20px;
				
			}
		
		</style>
	
	</head>
	
	<body>
	
		<header>
		
				<h1>Lost Info List</h1>
		
		</header>
		
		<nav>
		
			<a href = "index.html"><button>Home</button></a>
		
		</nav>
		
		<main>

');

/*gets the database data and allows us to place them in the boxes*/
while($row = $rs -> fetch()){
	
	echo('<div class = "box">');
	
		echo("Lost Name: ".$row['lostname']."<br>");
		echo("Lost location: ".$row['lostlocation']."<br>");
		echo("Lost id: ".$row['lost_id']."<br>");
		echo('<img style = "heigth: 150px; width: 150px;" src = "data:'.$row['imagetype'].';base64,'.$row['lostimage'].'"><br>');
		echo("Contact Info: ".$row['phoneusercontact']." | ".$row['emailusercontact']."<br>");
	
	echo('</div>');
	
}

echo('

		</main>
					
		<footer>
		
		
		
		</footer>
	
	</body>

<html>

');

?>