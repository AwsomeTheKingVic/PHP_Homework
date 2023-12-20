<!--- form4.php -->
<!DOCTYPE html>
<html>

	<head>

		<title>Form4</title>

	</head>

	<body>
			
		<h1>Form 4</h1>
		
		<?php
			if(!isset($_POST['studentName']) || empty($_POST['studentName'])){
			
				echo('
				
				<form action = "form4.php" method = "POST">
					
					<table border = "1">
					
						<tr>
						
							<td>Name</td>
							<!--- allows for user input -->
							<td><input type = "text" name = "studentName" id = "studentName" value = "Bubba"></td>
						
						</tr>
						
						<tr>
						
							<td>Major</td>

							<td><input type = "text" name = "studentMajor" id = "studentMajor" value = "Brewer"></td>
						
						</tr>
						
						<tr>
						
							<!--- sends user input -->
							<td></td>
							<td><input type = "submit" value = "Click me"></td>
						
						</tr>
					
					</table>
				
				</form>
				
				');
			}
			else{
				
				echo("<br>Hello ".$_POST['studentName']."<br>");
				echo("<br>Your Major is ".$_POST['studentMajor']."<br>");
				
			}
		?>
		
	</body>
		
</html>