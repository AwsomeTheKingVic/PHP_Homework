<!--- form2a.php -->
<!DOCTYPE html>
<html>

	<head>

		<title>Form1a</title>

	</head>

	<body>
			
		<h1>results from form 1</h1>
			
		<?php
		
			echo("var_dump<br>");
			var_dump($_GET);
			
			echo("<br><hr><br>");
			
			echo("Print_r<br>");
			print_r($_GET);
		
			echo("<br><hr><br>");
			
			echo("<br>Hello ".$_GET['studentName']."<br>");
			echo("<br>Your Major is ".$_GET['studentMajor']."<br>");
			
		?>
			
	</body>
		
</html>