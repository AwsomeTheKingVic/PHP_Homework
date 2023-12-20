<!--- form3.php -->
<!DOCTYPE html>
<html>

	<head>

		<title>form3</title>

	</head>

	<body>
			
		<h1>Form 3</h1>
		
		<!--- sends the information to the action and the runs with the method -->
		<form action = "form3.php" method = "POST">
			
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
		
		<?php
		
			echo("var_dump<br>");
			var_dump($_POST);
			
			echo("<br><hr><br>");
			
			echo("Print_r<br>");
			print_r($_POST);
		
			echo("<br><hr><br>");
			
			echo("<h3>isset</h3>");
			
			if(isset($_POST['studentName'])){
			
				echo("<br>Hello ".$_POST['studentName']."<br>");
				echo("<br>Your Major is ".$_POST['studentMajor']."<br>");
						
			}
			
			echo("<h3>empty</h3>");
			
			if(!empty($_POST['studentName']) || !empty($_POST['studentMajor'])){
			
				echo("<br>Hello ".$_POST['studentName']."<br>");
				echo("<br>Your Major is ".$_POST['studentMajor']."<br>");
						
			}
		
		?>
			
	</body>
		
</html>