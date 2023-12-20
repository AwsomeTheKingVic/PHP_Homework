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
		
		<div class="content">
		
			<h1>New User Registration</h1>
		
			<form method = "POST" action = "newuser.php">
			
				<table border = "1">
				
					<tr>
					
						<td colspan = "2">NewUser</td>
					
					</tr>
					<tr>
					
						<td>First Name</td>
						<td><input type = "text" name = "firstname" size = "25" value = "bubba" placeholder = "first name"></td>
					
					</tr>
					<tr>
					
						<td>Last Name</td>
						<td><input type = "text" name = "lastname" size = "25" value = "smith" placeholder = "last name"></td>
					
					</tr>
					<tr>
					
						<td>UserName</td>
						<td><input type = "text" name = "username" size = "25" value = "bsmith" placeholder = "username" required></td>
					
					</tr>
					<tr>
					
						<td>Password</td>
						<td><input type = "text" name = "pwd" size = "25" value = "bubba" placeholder = "password" required></td>
					
					</tr>
					<tr>
					
						<td>Submit</td>
						<td><input type = "submit" name = "submit" size = "25" value = "enter"></td>
					
					</tr>
				
				</table>
			
			</form>
		
		</div>
	
	</body>

</html>