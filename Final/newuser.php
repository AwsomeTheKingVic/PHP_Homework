<?php

	require('dbconnect.php');
	
	if(isset($_POST['username']) && !empty($_POST['username'])){
		
		/*gets the user information to send to the database to use for other times*/
		try{
			
			/*sending the data to the database*/
			$sql = "INSERT INTO tbl_user ".
				   "(firstname, lastname, username, pwd) ".
				   "VALUES(:firstname, :lastname, :username, :pwd)";
				   
			$sql = $pdo -> prepare($sql);
			
			/*making sure the data wont harm the database*/
			$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
			$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			
			$pwd = $_POST['pwd'];
			
			$password = password_hash($pwd, PASSWORD_DEFAULT);
			
			/*matching the values*/
			$sql -> bindparam(':firstname', $firstname);
			$sql -> bindparam(':lastname', $lastname);
			$sql -> bindparam(':username', $username);
			$sql -> bindparam(':pwd', $password);
			
			$sql -> execute();
			
			echo('<p>User was successfully entered</p>');
			
			header('location: index.html');
			
		}catch(PDOException $ee){
			
			echo($ee -> getMessage());
			echo("<br><br>");
			echo($ee -> getCode());
			
			if($ee -> getCode()){
				
				$_SESSION['logerr_message'] = "Please select diffrent username";
				
				header('location: newuser.php');
				
			}
			
		}
		
	}else{
		
		echo('
		
			<!DOCTYPE html>
			<html>
			
				<head>
				
					<title>New User</title>
				
				</head>
				
				<body>
				
					<div class = "content">
		');
		
		include('newuserform.php');
		
		echo('
					
					</div>
					
					<a href = "index.html"><button>Home</button></a>
					<a href = "logout.php"><button>Logout</button></a>
					
				</body>
		
			</html>
		
		');
		
	}

?>