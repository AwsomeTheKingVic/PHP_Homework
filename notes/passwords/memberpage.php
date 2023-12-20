<?php
session_start();

// *** MAKE SURE TO DO THIS STEP
// *** TO PREVENT UNAUTHORISED ACCESS

if(!isset($_SESSION['LoginStatus']) || $_SESSION['LoginStatus'] == false){
	
	header('Location:index.html');
	
}

?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Home</title>
	
	</head>
	
	<body>
		
		<div class="content">
		
			<h1>Memebers Only</h1>
			<p>you are on the members only page</p>
			<p><a href = "index.html">Home</p>
			<br>
			<a href = "logout.php"><button>Logout</button></a>
			
		</div>
	
	</body>

</html>