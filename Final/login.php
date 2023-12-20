<?php

	require('dbconnect.php');
	
	if(isset($_POST['username']) && !empty($_POST['username'])){
		
		/*get us the user information to validate login info*/
		$sql_login = "SELECT username, pwd, user_id ".
					 "FROM tbl_user ".
					 "WHERE username = :username";
					 
		$sql_login = $pdo -> prepare($sql_login);
		
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		
		$sql_login -> bindparam(':username', $username);
		
		$sql_login -> execute();
		
		$result = $sql_login -> fetch();
		
		$_SESSION['user_id'] = $result['user_id'];
		
		if($result['pwd'] == null || $result['username'] == null){
			
			echo('<br>Bad username/Password');
			
		}else{
			
			echo('<br><br>');
			
			/*password check*/
			$hashed_pwd = $result['pwd'];
			
			if(password_verify($_POST['pwd'], $hashed_pwd)){
				
				echo('<br><br>Password is valid');
				
				$_SESSION['LoginStatus'] = true;
				
				header('location:index.html');
				
			}else{
				
				$_SESSION['LoginStatus'] = false;
				
				echo('<br><br>Password is INVALID');
				
			}
			
		}
		
	}else{
		
		
		
	}

?>

<!DOCTYPE html>
<html>

	<head>
	
		<title>Login page</title>
	
	</head>
	
	<body>
	
		<div>
			
			<!--- get user input data -->
			<form method = "POST" action="login.php">
			
				<table border = "5">
				
					<tr>
					
						<td>User Name</td>
						<td><input type = "text" name = "username" placeholder = "User Name"></td>
					
					</tr>
					
					<tr>
					
						<td>Password</td>
						<td><input type = "text" name = "pwd" placeholder = "Password"></td>
					
					</tr>
					
					<tr>
					
						<td>Finnished</td>
						<td><input type = "submit" name = "submit" value = "enter"></td>
					
					</tr>
				
				</table>
			
			</form>
			
			<a href = "index.html"><button>Home</button></a>
			<a href = "logout.php"><button>Logout</button></a>
		
		</div>
	
	</body>

</html>