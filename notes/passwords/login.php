<?php

	// turn off error reporting
    error_reporting(0);
	
	require('dbconnect.php');
	
	echo('here');
	
	print_r($_POST);
	
	if(isset($_POST['username']) && !empty($_POST['username'])){
		
		$sql_login = "SELECT username, pwd ".
					 "FROM tbl_user ".
					 "WHERE username = :username";
					 
		// prepare
		$sql_login = $pdo -> prepare($sql_login);
		
		//sanitize
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		
		//bind param
		$sql_login -> bindparam(':username', $username);
		
		//execute
		$sql_login -> execute();
		
		// --- next get dataset
		
		//get the dataset
		$result = $sql_login -> fetch();
		
		if($result['pwd'] == null || $result['username'] == null){
			
			echo('<br>Bad Username / or Password');
			
		}
		else{
			
			//for your information only - not in production
			print_r($result['pwd']);
			echo('<br><br>');
			
			//store the password into a variable
			$hashed_pwd = $result['pwd'];
			
			//reverse the password process
			if(password_verify($_POST['pwd'], $hashed_pwd)){
				
				echo('<br><br>Password is valid');
				
				//This session variable will be a flag to let user log into a "members" page
				$_SESSION['LoginStatus'] = true;
				
				header('location:memberpage.php');
				
			}
			else{
				
				//bad login
				$_SESSION['LoginStatus'] = false;
				
				echo('<br><br>Password is INVALID');
				
			}
			
		}
		
	}
	else{
		
		
		
	}

?>

<!DOCTYPE html>
<html>

	<head>
	
		<title>Home</title>
	
	</head>
	
	<body>
		
		<div class="content">
		
			<form method="POST" action="login.php">
			
				<table border = "1">
				
					<tr>
					
						<td>UserName</td>
						<td><input type="text" name="username" placeholder="UserName" size="25" require></td>
					
					</tr>
					<tr>
					
						<td>Password</td>
						<td><input type="text" name="pwd" placeholder="Password" size="25" require></td>
					
					</tr>
					<tr>
					
						<td>finnished</td>
						<td><input type="submit" name="submit" value="enter"></td>
					
					</tr>
				
				</table>
			
			</form>
			
			<p><a href = "index.html">Home</p>
		
		</div>
	
	</body>

</html>