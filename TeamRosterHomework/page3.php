<!DOCTYPE html>
<html lang="en">

	<head>
		
		<meta charset="utf-8">
		
		<title>Info Display</title>
	
		<?php
		
			session_start();
		
		?>
	
	</head>
	
	<body>
		<header>
		
			<h1>Display info</h1>
			
		</header>
		
		<Nav>
		
			<a href = "index.html">Home</a>
			<a href = "page2.php">page2</a>
			<a href = "page3.php">page3</a>
			<a href = "page4.php">ClearInformation</a>
		
		</Nav>
		
		<main>
			
			<br><br><br>
			
			<div>
				
				<h2>Team Players</h2>
				
				<table border = "1">
				
					<tr>
						
						<th>TeamName</th>
						<th>Frist Name</th>
						<th>Last Name</th>
						<th>Address</th>
						<th>City</th>
						<th>State</th>
						<th>Zip</th>
						
					</tr>
														
					
					
					<?php
					 
						if(!empty($_SESSION['teamInfo'])){
							
							sort($_SESSION['teamInfo'][0]);
							
							for($i = 0 ; $i < count($_SESSION['teamInfo']) ; $i++) {
								
								echo("<tr>");
								
								for($c = 0; $c < count($_SESSION['teamInfo'][$i]) ; $c++) {
									
									echo('<td>'.$_SESSION['teamInfo'][$i][$c].'</td>');
							
								} 
								
								echo("</tr>");
							
							} 
						
						}
						 
					?>
					 
					
				</table>
			
			</div>
			
		</main>
		
		<footer>
		
		</footer>
		
	</body>

</html>
