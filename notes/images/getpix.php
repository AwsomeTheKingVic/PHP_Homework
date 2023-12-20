<!DOCTYPE html>
<html>

	<head>
	
		<title>showpix</title>
		
		<?php
		
			//db connection
			require('dbconnect.php');
			
			//sql statement
			$sql = 'SELECT * FROM tabel1';
			
			//getting the recods
			$rs = $pdo->query($sql);
		
		?>
	
	</head>
	
	<body>
	
		<div class = "content">
		
			<?php
			
				while($row = $rs->fetch()){
					
					echo('Dog Name: '.$row['dogname'].'<br>');
					
					try{
						
						echo("image type ".$row['imagetype']);
						
						//build image string
						echo('
						
							<img src = "data: '.$row['imagetype'].";".'base64,'.$row['dogimage'].'"><br><hr><br>
						
						');
						
					}catch(Exception $e){
						
						echo("Error: ".$e->getMessage);
						
					}
					
				}
			
			?>
			
			<a href = "doggyinput.php">Input Dog</a>&nbsp&nbsp&nbsp
			<a href = "getpix.php">Show pictures</a>
			
		</div>
	
	</body>

</html>