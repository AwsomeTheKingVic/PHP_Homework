<!DOCTYPE html>
<html lang="en">

	<head>
		
		<title>Page Title Goes Here</title>
	
		<meta charset="utf-8">
	
	</head>
	
	<body>
		<header>
		
			<h1>Forms</h1>
			
		</header>
		
		<Nav>
		
			<a href = "index.html">Home</a>
			<a href = "form2.php">form2</a>
		
		</Nav>
		
		<main>
			
			<br><br><br>
			
			<div>
				
				<?php
					
					echo("Hello ".$_POST['Title']." ". $_POST['Fname']." ". $_POST['Lname']."<br> in ".
						$_POST['States']." Specifically ".$_POST['City']." at ".$_POST['Address']." ".$_POST['Zip']);	

				?>
			
			</div>
			
		</main>
		
		<footer>
		
		</footer>
		
	</body>
	
</html>