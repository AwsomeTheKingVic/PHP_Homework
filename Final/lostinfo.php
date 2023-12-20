<?php

require('dbconnect.php');

if(isset($_POST['lostname']) && !empty($_POST['lostname'])){
	
	/*once we get the data from the form we then get it ready for the database*/
	/*getting image data*/
	$thefile = $_FILES['lostimage']['tmp_name'];
	$imagetype = mime_content_type($thefile);
	
	$lostimage = base64_encode(file_get_contents($_FILES['lostimage']['tmp_name']));
	
	/*sending data to database*/
	$sql = "INSERT INTO tbl_lost(lostname, lostlocation, lostimage, imagetype, phoneusercontact, emailusercontact)
								VALUES(:lostname, :lostlocation, :lostimage, :imagetype, :phoneusercontact, :emailusercontact)";
								
	$sql = $pdo -> prepare($sql);
	
	/*preparing the data for the database*/
	$lostname = filter_var($_POST['lostname'],FILTER_SANITIZE_STRING);
	$lostlocation = filter_var($_POST['lostlocation'],FILTER_SANITIZE_STRING);
	$phoneusercontact = filter_var($_POST['phoneusercontact'],FILTER_SANITIZE_STRING);
	$emailusercontact = filter_var($_POST['emailusercontact'],FILTER_SANITIZE_STRING);
	
	/*setting php values to database locations*/
	$sql -> bindparam(":lostname",$lostname);
	$sql -> bindparam(":lostlocation",$lostlocation);
	$sql -> bindparam(":lostimage", $lostimage, PDO::PARAM_LOB);
	$sql -> bindparam(":imagetype", $imagetype);
	$sql -> bindparam(":phoneusercontact", $phoneusercontact);
	$sql -> bindparam(":emailusercontact", $emailusercontact);
	
	/*quick bool to see if it ran the code for sql or not*/
	try{
		
		$upcheck = $sql -> execute();
		
	}catch(PDOException $e){
		
		echo("Failed: ".$e -> getMessage());
		
		$upcheck = false;
		
	}
	
	if($upcheck){
		
		echo('
		
			<br>File uploaded correctly
			'.header('Location:list.php').'
		
		');
		
	}else{
		
		echo('
		
			<br>File uploaded failed
			'.header('Location:lostinfo.php').'
		
		');
		
	}
	
}else{

		echo('
		
			<!DOCTYPE html>
			<html>

				<head>
				
					<title>The Losts Info</title>
				
				</head>
				
				<body>
				
					<header>
					
							<h1>Lost Info</h1>
					
					</header>
					
					<nav>
					
						<a href = "index.html"><button>Home</button></a>
					
					</nav>
					
					<main>
					
						<h2>Needed Information</h2>
					
						<!--- get all the data needed for the lost person -->
						<form action = "lostinfo.php" method = "POST" enctype = "multipart/form-data">
						
							<table border = "5">
							
								<tr>
								
									<td>the lost Full name</td>
									<td><input type = "text" size = "25" name = "lostname" value = "John Doe"></td>
								
								</tr>
							
								<tr>
								
									<td>the lost Last Location</td>
									<td><input type = "text" size = "25" name = "lostlocation" value = "Address"></td>
								
								</tr>
								
								<tr>
								
									<td> the lost Picture</td>
									<td><input type = "file" name = "lostimage" accept = ".jpg, .jpeg, .png"></td>
								
								</tr>
								
								<tr>
								
									<td>User Phone contact information</td>
									<td><input type = "text" size = "25" name = "phoneusercontact" value = "555-555-5555"></td>
								
								</tr>
								
								<tr>
								
									<td>user Email contact information</td>
									<td><input type = "text" size = "25" name = "emailusercontact" value = "youremial@email.com"></td>
								
								</tr>
								
								<tr>
								
									<td>Done</td>
									<td><input type = "submit" value = "enter"></td>
								
								</tr>
							
							</table>
						
						</form>
					
					</main>
					
					<footer>
					
					
					
					</footer>
				
				</body>

			<html>
			
		');
		
	
	}

?>