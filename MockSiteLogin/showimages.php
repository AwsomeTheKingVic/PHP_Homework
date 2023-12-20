<?php

	require('dbconnect.php');
	
	if(!isset($_SESSION['LoginStatus']) || $_SESSION['LoginStatus'] == false){
	
		header('location:index.html');
	
	}

?>

<!DOCTYPE html>
<html>

	<head>
	
		<title>Show Images</title>
		
		<?php
			
			$sql = 'SELECT * from tbl_image where user_id ='.$_SESSION['user_id'];
			
			$rs = $pdo -> query($sql);
		
		?>
	
	</head>
	
	<body>
	
		<div class = "content">
		
			<?php
			
				while($row = $rs -> fetch()){
					
					echo('Image Name: '.$row['imagename'].'<br>');
					
					try{
						
						echo("Image type ".$row['imagetype']);
						
						echo('
						
							<img src = "data:'.$row['imagetype'].';base64,'.$row['userimage'].'"><br><br><br>
						
						');
						
					}catch(Exception $e){
						
						echo("Error: ".$e -> getMessage);
						
					}
					
				}
			
			?>
		
			<a href = "inputimages.php"><button>Input Images</button></a>
			<a href = "showimages.php"><button>Show Images</button></a>
			<a href = "index.html"><button>Home</button></a>
			<a href = "logout.php"><button>Logout</button></a>
		
		</div>
	
	</body>

</html>