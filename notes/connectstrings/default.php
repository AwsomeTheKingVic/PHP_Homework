<?php
// default.php

//require - all or nothing - no good with errors
//include - will try to run if there is an error
require('dbconnect.php');

//educational purposes / development purposes
echo($dbstatus."<br><hr><br>");

	if(!isset($_POST['OwnerFN'])){
		
		echo('
		
			<form method="POST" action="default.php">

				<table border = "1">
				
					<tr>

						<td>First Name</td>
						<td><input type = "text" width = "20" name = "OwnerFN" required value = "John"></td>
					
					</tr>
					<tr>
					
						<td>Last Name</td>
						<td><input type = "text" width = "20" name = "OwnerLN" value = "Doe"></td>
					
					</tr>
					<tr>
					
						<td>Make</td>
						<td><input type = "text" width = "20" name = "Make" required value = "Ford"></td>
					
					</tr>
					<tr>
					
						<td>Model</td>
						<td><input type = "text" width = "20" name = "Model" required value = "F150"></td>
					
					</tr>
					<tr>
					
						<td>Car Year</td>
						<td><input type = "text" width = "20" name = "CarYear" required value = "1970"></td>
					
					</tr>
					<tr>
					
						<td>Color</td>
						<td><input type = "text" width = "20" name = "Color" required value = "Red"></td>
					
					</tr>
					<tr>
					
						<td>Done</td>
						<td><input type = "submit" value = "Enter"></td>
					
					</tr>
				
				</table>

			</form>
		
		');
		
	}
	else{
		
		echo("To Be Continued <br>");
		
		print_r($_POST);
		
		echo("<br><hr><br>");
		
		try{
			
			//step 1 - create sql statment
			$sql_Insert = "INSERT INTO tbl_car ".
							"(OwnerFN, OwnerLN, Make, Model, CarYear, Color) ".
							"VALUES(:OwnerFN, :OwnerLN, :Make, :Model, :CarYear, :Color)";
							
			//step 2 - prepare our sql statment
			//this will box our information at the ":" placeholder
			$sql_Insert = $pdo->prepare($sql_Insert);
			
			//step 3 - sanitize the information
			//use filter_var
			$OwnerFN = filter_var($_POST['OwnerFN'],FILTER_SANITIZE_STRING);
			$OwnerLN = filter_var($_POST['OwnerLN'],FILTER_SANITIZE_STRING);
			$Make = filter_var($_POST['Make'],FILTER_SANITIZE_STRING);
			$Model = filter_var($_POST['Model'],FILTER_SANITIZE_STRING);
			$CarYear = filter_var($_POST['CarYear'],FILTER_SANITIZE_STRING);
			$Color = filter_var($_POST['Color'],FILTER_SANITIZE_STRING);
			
			//step 4 - bind our placeholder to our clean variables
			$sql_Insert -> bindparam(":OwnerFN",$OwnerFN);
			$sql_Insert -> bindparam(":OwnerLN",$OwnerLN);
			$sql_Insert -> bindparam(":Make",$Make);
			$sql_Insert -> bindparam(":Model",$Model);
			$sql_Insert -> bindparam(":CarYear",$CarYear);
			$sql_Insert -> bindparam(":Color",$Color);
			
			//step 5 - execute the sql statment
			$sql_Insert->execute();
			
			echo("<br> ### Input was Successful ### <br><hr><br>");
			
			//----------------------------------------------------------------
			
			$sql_SelectLastCar = "SELECT * ".
								"FROM tbl_Car ".
								"Where Car_ID = (SELECT MAX(car_ID) " . 
												"FROM tbl_car)";
												
			//run the query
			$dataSet = $pdo->query($sql_SelectLastCar);
			
			//loop the columns
			foreach($dataSet as $row){
				
				echo($row['OwnerFN']." ".$row['OwnerLN']."<br>");
				echo($row['Make']." ".$row['Model']." ".$row['CarYear']."<br>");
				echo($row['Color']." ".$row['Car_Id']."<br>");
				
			}
			
			//----------------------------------------------------------------
			
			unset($_POST);
		
		}
		catch(PDOExcept $eio){
			
			echo("*** Input Error <br>". $eio);
			
		}
		
		//add button
		echo('<a href = "default.php"><button type = "button">Add another car</button></a>');
		
	}
	
?>

<br><a href = "page3.php"><button type = "button">Display data table</button></a><br>