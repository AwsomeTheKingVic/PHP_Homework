<?php
	
	require('dbconnect.php');
	
	if(!isset($_SESSION['LoginStatus']) || $_SESSION['LoginStatus'] == false){
	
		header('location:index.html');
	
	}
	
	if(isset($_POST['imagename']) && !empty($_POST['imagename'])){
		
		$thefilename = $_FILES['userimage']['tmp_name'];
		$imagesize = filesize($thefilename);
		$imagetype = mime_content_type($thefilename);
		
		$image = base64_encode(file_get_contents($_FILES['userimage']['tmp_name']));
		
		$sql = "INSERT INTO tbl_image(imagename, userimage, imagetype, imagesize, user_id) 
				VALUES(:imagename, :userimage, :imagetype, :imagesize, :user_id)";
				
		$sql = $pdo -> prepare($sql);
		
		$imagename = filter_var($_POST['imagename'],FILTER_SANITIZE_STRING);
		
		$sql -> bindparam(":imagename", $imagename);
		
		$sql -> bindparam(":userimage", $image, PDO::PARAM_LOB);
		
		$sql -> bindparam(":imagetype", $imagetype);
		$sql -> bindparam(":imagesize", $imagesize);
		$sql -> bindparam(":user_id", $_SESSION['user_id']);
		
		try{
			
			$upcheck = $sql -> execute();
			
		}catch(PDOException $e){
			
			echo("Failed: ".$e -> getMessage());
			
			$upcheck = false;
			
		}
		
		if($upcheck){
			
			echo('
			
				<br>file uploaded correctly<br>
				<br>
				<br>
				<br>
				<a href = "inputimages.php"><button>Input Images</button></a>
				<a href = "showimages.php"><button>Show Images</button></a>
				<a href = "index.html"><button>Home</button></a>
				<a href = "logout.php"><button>Logout</button></a>
			
			');
			
		}else{
			
			echo('<br>**************************** File UPLOAD FAILED *********************
			
				<a href = "inputimages.php"><button>Input Images</button></a>
				<a href = "showimages.php"><button>Show Images</button></a>
				<a href = "index.html"><button>Home</button></a>
				<a href = "logout.php"><button>Logout</button></a>
				
			');
			
		}
		
	}else{
		
		echo('

			<!DOCTYPE html>
			<html>

				<head>
				
					<title>Input Images</title>
				
				</head>
				<body>
				
					<div class = "content">
					
						<form method = "POST" action = "inputimages.php" enctype = "multipart/form-data">
						
							<table border = "5">
							
								<tr>
								
									<td>Image Name</td>
									
									<td><input type = "text" size = "25" name = "imagename" value = "bubba"></td>
								
								</tr>
								
								<tr>
								
									<td>Picture File</td>
									
									<td><input type = "file" name = "userimage" accept = ".jpg, .jpeg, .png"></td>
								
								</tr>
								
								<tr>
								
									<td>Finnished</td>
									
									<td><input type = "submit" value = "enter"></td>
								
								</tr>
							
							</table>
						
						</form>
						
						<br>
						<hr>
						
						<a href = "inputimages.php"><button>Input Images</button></a>
						<a href = "showimages.php"><button>Show Images</button></a>
						<a href = "index.html"><button>Home</button></a>
						<a href = "logout.php"><button>Logout</button></a>
					
					</div>
				
				</body>

			</html>
				
		');
		
	}

?>