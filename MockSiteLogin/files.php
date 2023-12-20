<?php


session_start();

if(!isset($_SESSION['LoginStatus']) || $_SESSION['LoginStatus'] == false){

	header('location:index.html');

}

echo('<br><hr><br>');


?>

<!DOCTYPE html>
<html>

	<head>
	</head>
	
	<body>
	
		<div class = "content">
		
			<h1>File Manager</h1>
			
			<?php
			
				if(isset($_POST['submit'])){
					
					$thedirectory = "userfiles/";
					
					if($_POST['submit'] == 'Delete'){
						
						$myArray = array_values($_POST);
						
						print_r($myArray);
						
						for($c = 0; $c < count($myArray) - 1; $c++){
							
							echo($myArray[$c]);
							unlink($thedirectory.$myArray[$c]);
							
						}
						
						echo('<br><hr><br>');
						
					}else if($_POST['submit'] == 'upload'){
						
						$target_file = $thedirectory.basename($_FILES['fileToUpload']['name']);
						
						if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
							
							echo('<script>alert("File upload successfull")</script>');
							
						}else{
							
							echo('<script>alert("File upload failed")</script>');
							
						}
						
					}else if($_POST['submit'] == 'Make Directory'){
						
						mkdir($thedirectory.$_POST['makedir']);
						
					}else if($_POST['submit'] == 'Delete Directory'){
						
						rmdir($thedirectory.$_POST['deldir']);
						
					}
					
				}
				
				$thedirectory = "userfiles/";
				
				chdir($thedirectory);
				
				$thefiles = glob('*.*');
				
				echo('<br>');
				
				echo('
				
				<form method = "POST" action = "files.php">
				
					<table border = "5">
					
						<tr>
						
							<td colspan = "2"><h1>Delete Files</h1></td>
						
						</tr>
						
				');
				
				for($c = 0; $c < count($thefiles); $c++){
					
					echo('<tr><td>');
					
						echo('<input type = "checkbox" name  = "xfilename'.$c.'" value = "'.$thefiles[$c].'"></td><td>'.$thefiles[$c]);
					
					echo('</tr></td>');
					
				}
				
				echo('
				
					<tr><td colspan = "2">
					
					<input type = "submit" value = "Delete" name = "submit">
					
					</td></tr>
					
					</table>
				
				</form>
				
				');
			
			?>
			
			<br>
			<br>
			<h1>Add Files</h1>
			<form method = "POST" action = "files.php" enctype = "multipart/form-data">
			
				<input type = "hidden" name = "MAX_FILE_SIZE" value = 1000000>
				<input type = "file" name = "fileToUpload" id = "fileToUpload"><br>
				<input type = "submit" name = "submit" value = "upload">
			
			</form>
			
			<br>
			<br>
			<h1>Make directory</h1>
			<form method = "POST" action = "files.php" enctype = "multipart/form-data">
			
				<input type = "text" name = "makedir" id = "makedir"> <br>
				<input type = "submit" name = "submit" value = "Make Directory">
			
			</form>
			
			<h1>Delete directory</h1>
			<form method = "POST" action = "files.php" enctype = "multipart/form-data">
			
				<input type = "text" name = "deldir" id = "deldir"> <br>
				<input type = "submit" name = "submit" value = "Delete Directory">
			
			</form>
			
			<?php
			
				$cd = getcwd();
				
				$thecontents = scandir($cd);
				
				foreach($thecontents as $value){
					
					echo($value."<br>");
					
				}
			
			?>
			
			<a href = "index.html"><button>Home</button></a>
			<a href = "logout.php"><button>Logout</button></a>
		
		</div>
	
	</body>
	
</html>