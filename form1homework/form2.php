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
					
					if(empty($_POST['Fname']) && empty($_POST['Lname'])){
						
						echo('
							<form action = "form2.php" method = "POST">
				
								<table border = "1">
								
									<tr>
									
										<td>Title</td>
										<td><select name = "Title" id = "Title">
										
											<option value = "Mr">Mr</option>
											<option value = "Msr">Msr</option>
											<option value = "Ms">Ms</option>
										
										</select></td>
									
									</tr>
									
									<tr>
									
										<td>First Name</td>
										<td><input type = "text" name = "Fname" id = "Fname"></td>
									
									</tr>
									
									<tr>
									
										<td>Last Name</td>
										<td><input type = "text" name = "Lname" id = "Lname"></td>
									
									</tr>
									
									<tr>
									
										<td>Address</td>
										<td><input type = "text" name = "Address" id = "Address"></td>
									
									</tr>
									
									<tr>
									
										<td>City</td>
										<td><input type = "text" name = "City" id = "City"></td>
									
									</tr>
									
									<tr>
									
										<td>State</td>
										<td><select name = "States" id = "States">
										
											<option value = "AL">AL</option>
											<option value = "AK">AK</option>
											<option value = "AZ">AZ</option>
											<option value = "AR">AR</option>
											<option value = "AS">AS</option>
											<option value = "CA">CA</option>
											<option value = "CO">CO</option>
											<option value = "CT">CT</option>
											<option value = "DE">DE</option>
											<option value = "DC">DC</option>
											<option value = "FL">FL</option>
											<option value = "GA">GA</option>
											<option value = "GU">GU</option>
											<option value = "ID">HI</option>
											<option value = "IL">IL</option>
											<option value = "IN">IN</option>
											<option value = "IA">IA</option>
											<option value = "KS">KS</option>
										
										</select></td>
									
									</tr>
									
									<tr>
									
										<td>Zip</td>
										<td><input type = "text" name = "Zip" id = "Zip" maxlength = "5"></td>
									
									</tr>
									
									<tr>
									
										<td>Gender</td>
										<td>
										
										<input type = "radio" name = "Gender" id = "Gender1" value = "M"><label for = "Gender1">M</label>
										<input type = "radio" name = "Gender" id = "Gender2" value = "F"><label for = "Gender2">F</label>
										
										</td>
									
									</tr>
									
									<tr>
									
										<td>Correct Billing Address</td>
										<td><input type = "checkbox" name = "BillingAddress" id = "BillingAddress"><label for  = "BillingAddress">Billing Address</label></td>
									
									</tr>
									
									<tr>
									
										<td>Finnished</td>
										<td><input type = "submit"></td>
									
									</tr>
								
								</table>
							
							</form>
							
						');
						
					}else{
						
						echo("Hello ".$_POST['Title']." ". $_POST['Fname']." ". $_POST['Lname']."<br> in ".
							$_POST['States']." Specifically ".$_POST['City']." at ".$_POST['Address']." ".$_POST['Zip']);	
						
					}
					

				?>
			
			</div>
			
		</main>
		
		<footer>
		
		</footer>
		
	</body>

</html>