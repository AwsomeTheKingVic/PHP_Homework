<!DOCTYPE html>
<html lang="en">

	<head>
		
		<meta charset="utf-8">
		
		<title>Conformation</title>
	
		<?php
		
			session_start();
			
			
		
		?>
	
	</head>
	
	<body>
		<header>
		
			<h1>Conformation</h1>
			
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
				
				<?php
					
					if(!empty($_POST)){
						
						if(empty($_SESSION['teamInfo'])){
							
							$info = array();
							
							$_SESSION['teamInfo'] = array();
							
							array_push($info, $_POST['teamName'] ,$_POST['firstName'],$_POST['lastName'],$_POST['address'],$_POST['city'],$_POST['states'],$_POST['zip']);
							array_push($_SESSION['teamInfo'], $info);
							
						}else{
							
							$info = array();
							
							array_push($info, $_POST['teamName'] ,$_POST['firstName'],$_POST['lastName'],$_POST['address'],$_POST['city'],$_POST['states'],$_POST['zip']);
							array_push($_SESSION['teamInfo'], $info);
							
						}
						
						echo('
							
							<table border = "1">
					
								<tr>
								
									<td>TeamName</td>
									<td>'.$_POST['teamName'].'</td>
								
								</tr>
							
								<tr>
								
									<td>FirstName</td>
									<td>'.$_POST['firstName'].'</td>
								
								</tr>
								<tr>
								
									<td>lastName</td>
									<td>'.$_POST["lastName"].'</td>
								
								</tr>
								<tr>
								
									<td>Address</td>
									<td>'.$_POST['address'].'</td>
								
								</tr>
								<tr>
								
									<td>City</td>
									<td>'.$_POST['city'].'</td>
								
								</tr>
								<tr>
								
									<td>State</td>
									<td>'.$_POST['states'].'</td>
								
								</tr>
								<tr>
								
									<td>Zip</td>
									<td>'.$_POST['zip'].'</td>
								
								</tr>
								
							</table>
								
						');
						
					}

				?>
			
			</div>
			
		</main>
		
		<footer>
		
		</footer>
		
	</body>
	
</html>
