<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h1>HI</h1>

<?php

	//echo inserts - print can mess formatting
	echo("Hello php");
	//return boolean if printed
	print("<br>hello amigos<br>salut<br>Howdy<br>");
	
	//variables always start with $ must initate 
	//$ doesnt have specific variable type
	$output = 0;
	$fname = "Jim";

	//iteration
	//for loop
	echo("For loop<br>");
	for($cntr = 0; $cntr < 20; $cntr++){
		
		//the dot concatinates
		echo($cntr."<br>");
		
	}
	
	$cntr = 0;
	
	echo("<br><hr><br>");
	
	//while loop
	echo("While loop<br>");
	while($cntr < 10)
	{
		
		echo($cntr." - while<br>");
		$cntr++;
		
	}
	
	echo("<br><hr><br>");
	
	//If statements
	echo("If<br>");
	
	$xx = 13;
	if($xx < 10){
		
		echo($xx."The Value is less than 10");
		
	}
	elseif($xx < 15){
		
		echo($xx."The Value is less than 15");
		
	}
	else{
	
		echo($xx."The Value is Greater than 14");
	
	}
	
	
?>

</body>

</html>