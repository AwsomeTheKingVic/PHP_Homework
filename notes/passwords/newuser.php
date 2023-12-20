<?php

	require('dbconnect.php');
	
	print_r($_POST);
	print('<br><hr><br>');
	
	if(isset($_POST['username']) && !empty($_POST['username'])){
		
		try{
			
			//sqlstatment
			$sql = "INSERT INTO tbl_user ".
					"(firstname, lastname, username, pwd) ".
					"VALUES(:firstname, :lastname, :username, :pwd)";
					
			//prepare the statement
			$sql = $pdo -> prepare($sql);
			
			//sanitize
			$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
			$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
			$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			
			//************* PASSWORD *********************
			
			$pwd = $_POST['pwd'];
			
			$password = password_hash($pwd, PASSWORD_DEFAULT);
			
			//********************************************
			
			// bind param
			$sql -> bindparam(":firstname",$firstname);
			$sql -> bindparam(":lastname",$lastname);
			$sql -> bindparam(":username",$username);
			$sql -> bindparam(":pwd",$password);
			
			//execute
			$sql->execute();
			
			echo('<p>User was successfully entered</p>');
			
		}
		catch(PDOException $ee){
			
			echo($ee->getMessage());
			echo("<br><br>");
			echo($ee->getCode());
			
			if($ee->getCode()){
				
				//echo("Please select diffrent username");
				
				$_SESSION['logerr_message'] = "Please select diffrent username";
				
				header('location: NewUser.php');
				
			}
			
		}
		
	}
	else{

		echo('
			<!DOCTYPE html>
			<html>

				<head>
				
					<title>New User</title>
				
				</head>
				
				<body>
					
					<div class="content">
					
			');
			
		include('newuserform.php');
					
		echo('				
					
					</div>
				
				</body>

			</html>
			
			');
		
	}
	
?>