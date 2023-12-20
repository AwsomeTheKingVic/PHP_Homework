<!DOCTYPE html>
<html>
	
	<head>
	
		<style>
		
			#div1{
				
				background-color:lightgreen;
				
				width:75%;
				
				margin-left: auto;
				margin-right: auto;
				
			}
		
		</style>
	
	</head>
	
	<body>
	
		<?php
		
			//database connection
			function newDB(){
				
				//returns database object
				return new PDO('mysql:host=127.0.0.1;dbname=wp_cars','root','');
				
			}
			
			function pdoInsert(){
				
				//opens new databaseconnection
				$pdo = newDB();
				
				//instatntiate variable
				$ownerFN = "Bubba";
				$ownerLN = "Smith";
				$make = "Scion";
				$model = "XB";
				$carYear = rand(2000,2012);
				$color = "blue";
				
				try{
					
					//sql statement
					$sql_stmt = "INSERT INTO tbl_car(OwnerFN,OwnerLN,Make,Model,CarYear,Color) 
					values (?,?,?,?,?,?)";
					
					//prepare
					$pdo = $pdo->prepare($sql_stmt);
					
					//bind parameters
					$pdo->bindparam(1,$ownerFN);
					$pdo->bindparam(2,$ownerLN);
					$pdo->bindparam(3,$make);
					$pdo->bindparam(4,$model);
					$pdo->bindparam(5,$carYear);
					$pdo->bindparam(6,$color);
					
					//generate some database
					//normally where you assign $_POST variable
					//which has been sanitized to variable
					
					//for this example auto generate some database
					
					$numRecs = rand(5,11);
					
					for($i = 0; $i < $numRecs; $i++){
						
						$arn = rand(0,1000);
						
						//$ownerFN = filter_var($_POST['ownerFN'],FILTER_SANITIZE_STRING);
						$ownerFN = "Bubba".$arn;
						$ownerLN = "Smith".$arn;
						$make = "Ford".$arn;
						$model = "Mach E".$arn;
						$carYear = rand(2000,2024);;
						$Color = "red";
						
						//since the variables are already bound
						//we can just call execute
						
						$pdo->execute();
						
					}
					
				}catch(PDOException $epdo){
					
					echo($pdo->getMessage());
					
				}
				
				//always closse our connection
				$pdo = null;
			
			}
			
			function printCarTable(){
				
				//create a database connection
				$pdo = newDB();
				
				echo('
				
				<div id = "div1">
				
					<h1>Car Table</h1>
				
					<table border = "1">
						
						<tr>
						
							<td>OwnerFN</td>
							<td>OwnerLN</td>
							<td>Make</td>
							<td>Model</td>
							<td>CarYear</td>
							<td>Color</td>
							<td>Car ID</td>
						
						</tr>
				
				'); 
				
				//setup our sql
				$sql = "SELECT * FROM tbl_car";
					
				//executing the sql - bring down the data
				$dataSet = $pdo->query($sql);
				
				//iterate through each dataset row
				foreach($dataSet as $row){
					
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
					
					echo('</tr>');
					
				}
				
				echo('</table></div>');
				
				//close the db connection
				$pdo = null;
				
			}
			
			function clearDB(){
				
				try{
					
					//create database
					$pdo = newDB();
					
					$pdo->exec("TRUNCATE TABLE tbl_car");
					
				}
				catch(PDOException $epdo){
					
					echo("Error<br>".$epdo->getMessage());
					
				}
				
				//closing the connection
				$pdo = null;
				
			}
		
			clearDB();
			pdoInsert();
			printCarTable();
		
		?>
	
	</body>

</html>