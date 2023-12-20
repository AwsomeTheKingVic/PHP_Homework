<!DOCTYPE html>
<html>

	<head>
	
		<title>Home</title>
	
	</head>
	
	<body>
	
		<?php
		
			if(isset($_SESSION['logerr_message'])){
				
				echo('warning: '.$_SESSION['logerr_message'].'<br><br>');
				unset($_SESSION['logerr_message']);
				
			}
		
		?>
		
		<div class = "content">
		
			<h1>New User Registration</h1>
			
			<!--- gets the new user data to send to the database-->
			<form method = "POST" action = "newuser.php">
			
				<table border = "5">
				
					<tr>
					
						<td colspan = "2">NewUser</td>
					
					</tr>
					
					<tr>
					
						<td>First Name</td>
						<td><input type = "text" name = "firstname" value = "John" placeholder = "First Name"></td>
					
					</tr>
					<tr>
					
						<td>Last Name</td>
						<td><input type = "text" name = "lastname" value = "doe" placeholder = "Last Name"></td>
					
					</tr>
					<tr>
					
						<td>User Name</td>
						<td><input type = "text" name = "username" value = "jdoe" placeholder = "User Name" required></td>
					
					</tr>
					<tr>
					
						<td>Password</td>
						<td><input type = "text" name = "pwd" value = "1234" placeholder = "Password" required></td>
					
					</tr>
					<tr>
					
						<td>Submit</td>
						<td><input type = "submit" name = "submit" value = "enter"></td>
					
					</tr>
				
				</table>
			
			</form>
		
		</div>
	
	</body>

</html>