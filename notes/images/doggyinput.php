<?php

require('dbconnect.php');

if(isset($_POST['dogname']) && !empty($_POST['dogname'])){
	
	//get the file
	$theFileName = $_FILES['dogimage']['tmp_name'];
	$size= filesize($theFileName);
	$imagetype = mime_content_type($theFileName);
	
	//Encode the file as base64
	//base64 is a common form of handling data and it is used
	//to ensure that the handling of bits accorss the network
	//are correct.
	$image = base64_encode(file_get_contents($_FILES['dogimage']['tmp_name']));
	
	//-----------------------------------------------------------------------
	
	//sql statement
	$sql = "INSERT INTO tabel1(dogname, dogbreed, dogimage, imagetype, imagesize)
					VALUES(:dogname, :dogbreed, :dogimage, :imagetype, :imagesize)";
	
	//prepare
	$sql = $pdo -> prepare($sql);
		
	//sanitize
	$dogname = filter_var($_POST['dogname'],FILTER_SANITIZE_STRING);
	$dogbreed = filter_var($_POST['dogbreed'],FILTER_SANITIZE_STRING);
	
	//bind
	$sql -> bindparam(":dogname", $dogname);
	$sql -> bindparam(":dogbreed", $dogbreed);
	
	//note that we are specifying a long blob
	$sql -> bindparam(":dogimage", $image, PDO::PARAM_LOB);
	
	//
	$sql -> bindparam(":imagetype", $imagetype);
	$sql -> bindparam(":imagesize", $size);
	
	try{
		
		$upcheck = $sql->execute();
		
	}
	catch(PDOException $e){
		
		echo("Failed: ".$e->getMessage());
		
		$upcheck = false;
		
	}
	
	if($upcheck){
		
		echo('<br>file uploaded correctly<br>
			<br>
			<br>
			<br>
			<a href = "doggyinput.php">Input Dog</a>&nbsp&nbsp&nbsp
			<a href = "getpix.php">Show pictures</a>
			
		');
		
	}else{
		
		echo("<br>****************** FILE UPLOAD FAILED ******************");
		
	}
	
}else{

	echo('

		<!DOCTYPE html>
		<html>

			<head>
			
				<title>Doggy Input</title>
			
			</head>
			<body>
			
				<div class = "content">
				
					<form action = "doggyinput.php" method = "POST" enctype = "multipart/form-data">
					
						<table border = "5">
						
							<tr>
							
								<td>Dog Name</td>
								
								<td><input type = "text" size = "25" name = "dogname" value = "barky"></td>
							
							</tr>
							
							<tr>
							
								<td>Dog Breed</td>
								
								<td><input type = "text" size = "25" name = "dogbreed" value = "mutt"></td>
							
							</tr>
							
							<tr>
							
								<td>Picture File</td>
								
								<td><input type = "file" name = "dogimage" accept = ".jpg, .jpeg, .png"></td>
							
							</tr>
							
							<tr>
							
								<td>Finnished</td>
								
								<td><input type = "submit" value = "enter"></td>
							
							</tr>
						
						</table>
					
					</form>
					
					<br>
					<hr>
					
					<a href = "doggyinput.php">Input Dog</a>&nbsp&nbsp&nbsp
					<a href = "getpix.php">Show pictures</a>
				
				</div>
			
			</body>

		</html>
			
	');
	
}

?>