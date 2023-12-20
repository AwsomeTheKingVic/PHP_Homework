<?php
	
	//allows for new DB entry
	function newDB(){
				
		return new PDO('mysql:host=127.0.0.1;dbname=hobbies','root','');
				
	}
	
	//allows you to insert information into the database
	function pdoInsert(){
		
		try{
			
			$pdo = newDB();
			
			$sql_stmt = "INSERT INTO tbl_hobbyinfo(GameName,GameType,HoursPlayed,GamePrice)
			values(:GameName, :GameType, :HoursPlayed, :GamePrice)";
			
			$sql_stmt = $pdo->prepare($sql_stmt);
			
			$GameName = filter_var($_POST['GameName'],FILTER_SANITIZE_STRING);
			$GameType = filter_var($_POST['GameType'],FILTER_SANITIZE_STRING);
			$HoursPlayed = filter_var($_POST['HoursPlayed'],FILTER_SANITIZE_STRING);
			$GamePrice = filter_var($_POST['GamePrice'],FILTER_SANITIZE_STRING);
			
			$sql_stmt -> bindparam(":GameName", $GameName);
			$sql_stmt -> bindparam(":GameType", $GameType);
			$sql_stmt -> bindparam(":HoursPlayed", $HoursPlayed);
			$sql_stmt -> bindparam(":GamePrice", $GamePrice);
			
			$sql_stmt -> execute();

			unset($_POST);
		
		}
		catch(PDOExcept $eio){
			
			echo($eio);
			
		}
		
		$pdo = null;
		
	}
	
	//prints the last entry of the database
	function pdoPrintLast(){
		
		$pdo = newDB();
		
		$sql_selectlasthobbie = "SELECT * ".
								"FROM tbl_hobbyinfo ".
								"WHERE Hobby_ID = (SELECT MAX(Hobby_ID) ".
													"FROM tbl_hobbyinfo)";
														
		$lastdataset = $pdo -> query($sql_selectlasthobbie);
		
		echo('<h2>Newest Entry</h2>');
		
		echo(' <table border = "5">
		
					<tr>
					
						<td>GameName</td>
						<td>GameType</td>
						<td>HoursPlayed</td>
						<td>GamePrice</td>
						<td>Hobby_ID</td>
					
					</tr>
					
			');
		
		foreach($lastdataset as $row){
			
			echo('<tr>');
			
			echo('
			
				<td>'.$row['GameName'].'</td>
				<td>'.$row['GameType'].'</td>
				<td>'.$row['HoursPlayed'].'</td>
				<td>'.$row['GamePrice'].'</td>
				<td>'.$row['Hobby_ID'].'</td>
			
			');
			
			echo('</tr>');
		}

		echo('</table>');
		echo('<br><hr><br>');
		
		$pdo = null;
		
	}
	
	//prints the whole list of databases
	function pdoPrintList(){
		
		$pdo = newDB();
		
		$sql_selectallhobbieinfo = "SELECT * FROM tbl_hobbyinfo";
		
		$alldataset = $pdo -> query($sql_selectallhobbieinfo);
		
		echo('<h2>Total List</h2>');
		
		echo(' <table border = "5">
			
					<tr>
					
						<td>GameName</td>
						<td>GameType</td>
						<td>HoursPlayed</td>
						<td>GamePrice</td>
						<td>Hobby_ID</td>
					
					</tr>
						
				');
		
		foreach($alldataset as $row){
			
			echo('<tr>');
				
				echo('
				
					<td>'.$row['GameName'].'</td>
					<td>'.$row['GameType'].'</td>
					<td>'.$row['HoursPlayed'].'</td>
					<td>'.$row['GamePrice'].'</td>
					<td>'.$row['Hobby_ID'].'</td>
				
				');
				
			echo('</tr>');
			
		}
		
		echo('</table>');
		echo('<br><hr><br>');
		
		$pdo = null;
		
	}
	
	//allows to delete from a specific location
	function pdoDeleteID(){
		
		$pdo = newDB();
		
		if(isset($_POST) && $_POST['deleteHobbyID'] > 0 && !empty($_POST['deleteHobbyID'])){
				
			$deleteID = $_POST['deleteHobbyID'];
			
			$pdo->exec('DELETE FROM tbl_hobbyinfo WHERE Hobby_ID = '.$deleteID);
			
			echo("<br>Deleted<br>");
				
		}
		
		$pdo = null;
		
	} 
	
	function clearDB(){
		
		try{
					
			$pdo = newDB();
			
			$pdo->exec("TRUNCATE TABLE tbl_hobbyinfo");
			
		}
		catch(PDOException $epdo){
			
			echo("Error<br>".$epdo->getMessage());
			
		}
		
		$pdo = null;
		
	}

?>