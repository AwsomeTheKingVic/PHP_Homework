<?php

require('dbconnect.php');

/*if we are signed in or not to allow people to use this*/
if(!isset($_SESSION['LoginStatus']) || $_SESSION['LoginStatus'] == false){

	header('location:index.html');

}

/*Will only run if given a id*/
if(isset($_POST['id']) && !empty($_POST['id'])){
	
	$sql = "DELETE FROM tbl_lost WHERE lost_id = ".$_POST['id'];
	
	$pdo -> query($sql);
	
}

?>

<a href = "index.html"><button>Home</button></a>

<form method = "POST" action = "admindelete.php">

	<table border = "5">
	
		<tr>
		
			<td>input id number</td>
			<td><input type = "number" name = "id" value = "id number"></td>
			<td><input type = "submit" values = "Delete" name = "submit"></td>
		
		</tr>
	
	</table>

</form>