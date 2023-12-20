<a href = "index.php"><button type = "button">Home</button></a>
<a href = "allinfo.php"><button type = "button">view full list</button></a>
<a href = "clear.php"><button type = "button">Clear</button></a>

<?php
	
	error_reporting(0);
	
	require('dbfunclibrary.php');
	
	pdoDeleteID();
	
	pdoPrintList();
	
?>

<form method = "POST" action = "allinfo.php">

	<h1>Delete Hobby</h1>
				
	Please enter a Hobby_id to Delete:<br>
	
	<input type = "number" name = "deleteHobbyID" value = "0" width = "20">
	<input type = "hidden" name = "deleteHobby" value = "222">
	<input type = "submit" value = "Delete_Hobby">

</form>