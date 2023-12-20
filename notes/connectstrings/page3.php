<?php

	require('dbconnect.php');

?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Data Base</title>
		
		<?php
			
			if(isset($_POST) && $_POST['deleteCarId'] > 0 && !empty($_POST['deleteCarId'])){
				
				$deleteID = $_POST['deleteCarId'];
				
				$pdo->exec('DELETE FROM tbl_car WHERE Car_Id = '.$deleteID);
				
				echo("<br>if test<br>");
				
			}
		
		?>
	
	</head>

	<body>
	
		<div id = "div1">
		
			<h1>car Inventory</h1>
			
			<table border = "1">
			
				<tr>
				
					<td>First Name</td>
					<td>Last Name</td>
					<td>Make</td>
					<td>Model</td>
					<td>Year</td>
					<td>Color</td>
					<td>Car_Id</td>
				
				</tr>
			
				<?php
				
					$sql = "SELECT * FROM tbl_car";
					
					$ds = $pdo->query($sql);
					
					foreach($ds as $row){
						
						echo('<tr>');
							
							echo('
							
								<td>'.$row['OwnerFN'].'</td>
								<td>'.$row['OwnerLN'].'</td>
								<td>'.$row['Make'].'</td>
								<td>'.$row['Model'].'</td>
								<td>'.$row['CarYear'].'</td>
								<td>'.$row['Color'].'</td>
								<td>'.$row['Car_Id'].'</td>
							
							');
						
						echo('<tr>');
						
					}
					
				
				?>
				
			</table>
			
			<br><a href = "default.php"><button type = "button">Home</button></a><br>
		
		</div>
		
		<div id = "div2">
		
			<h1>Delete a Record</h1>
			<form method = "POST" action = "page3.php">
				
				Please enter a car_id to Delete:&nbsp;&nbsp;
				
				<input type = "number" name = "deleteCarId" width = "20">
				<input type = "hidden" name = "deleteCar" value = "222">
				<input type = "submit" value = "Delete Car">
			
			</form>
			
		</div>
	
	</body>
	
</html>