<?php

	session_start();
	
	print_r($_POST);
	
	echo('<br><hr><br>');

?>
<html>

	<head>
	
		<title>Files</title>
		
		<style>
		
			#contect{
				
				width: 80%;
				margin: auto;
				
			}
		
		</style>
	
	</head>

	<body>
	
		<div id = "content">
		
			<h1>File / Directory Management</h1>
			
			<?php
			
				//===================================
				
				if(isset($_POST['submit'])){
					
					//chdir($thedirectory);
					//change
					$thedirectory = "files/";
					
					if($_POST['submit'] == 'Delete'){
						
						//copy tje contents for the post array to a normal array
						// $_POST cannot be iterated
						$myArray = array_values($_POST);
						
						print_r($myArray);
						
						for($c = 0; $c < count($myArray)-1;$c++)
						{
							// unlink is delete
							unlink($myArray[$c]);
						}
						
						echo('<br><hr><br>');
						
					}else if($_POST['submit'] == 'upload'){
						
						$target_file = $thedirectory.basename($_FILES['fileToupload']['name']);
						
						if(move_uploaded_file($_FILES['fileToupload']['name'], $target_file)){
							
							echo('<script>alert("File upload successfull")</script>');
							
						}else{
							
							echo('<script>alert("File upload failed")</script>');
							
						}
						
					}
					else if($_POST['submit'] == 'Make Directory'){
						
						//mkdir(); is the command to make directory
						mkdir($thedirectory.$_POST['makedir']);
						
					}else if($_POST['submit'] == 'Delete Directory'){
						
						//rmdir(); is the command to remove directory
						rmdir($thedirectory.$_POST['deldir']);
						
					}
					
				}
				
				// set the directory name
				$thedirectory = "files/";
				
				// set the focus of php to that Directory
				chdir($thedirectory);
				
				// read the files as array using glob
				// Note: glob must have a search criteria
				$thefiles = glob('*.*');
				
				echo('<br>');
				
				echo('
				<form method = "POST" action = "default.php">
				
					<table border = "5">
					
						<tr>
						
							<td colspan = "2"><h1>Delete FIles</h1></td>
						
						</tr>
						
					');
					
					for($c = 0; $c < count($thefiles); $c++){
						
						echo('<tr><td>');
						
							echo('<input type = "checkbox" name = "xfilename'.$c.'" value = "'.$thefiles[$c].'"></td><td>'.$thefiles[$c]);
						
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
			
			<!-- Add file -->
			<br>
			<br>
			<h1>Add Files</h1>
			<form method = "POST" action = "default.php" enctype = "multipart/form-data">
			
				<input type = "hidden" name = "MAX_FILE_SIZE" Value = 1000000>
				<input type = "file" name = "fileToupload"> <br>
				<input type = "submit" value = "upload" name = "submit">
			
			</form>
			
			<!-- add/delete Directories -->
			<br>
			<br>
			<h1> make Directory</h1>
			<form method = "POST" action = "default.php" enctype = "multipart/form-data">
			
				<input type = "text" name = "makedir" id= "makedir" ><br>
				<input type = "submit" value = "Make Directory" name = "submit">
			
			</form>
			
			<h1> delete Directory</h1>
			<form method = "POST" action = "default.php" enctype = "multipart/form-data">
			
				<input type = "text" name = "deldir" id= "deldir" ><br>
				<input type = "submit" value = "Delete Directory" name = "submit">
			
			</form>
			
			<?php
				
				//change directory command is chdir('../..') put the path in singles;
				// current directory
				$cd = getcwd();
				
				//scann all of the file names and directory names
				//into a variable
				$thecontents = scandir($cd);
				
				foreach($thecontents as $value){
					
					echo($value."<br>");
					
				}
			
			?>
			
			<br><br><br><br><br>
			
		</div>
	
	</body>

</html>