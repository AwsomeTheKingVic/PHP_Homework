<?php

	$myVar = 42;
	
	$arrayName = array("1984", 1101, $myVar);

	echo($arrayName[0]. "<br>");
	echo($arrayName[1]. "<br>");
	echo($arrayName[2]. "<br>");
	
	//check to see if it is an array
	if(is_array($arrayName)){
		
		echo('$arrayName is an array');
		
	}
	else{
		
		echo('$arrayName is not an array');
		
	}
	
	echo("<br><hr><br>");
	
	//key value
	$car_array = array("ford" => "F150", "scion" => "XB", "vw" => "Bug", "chevy" => "Tahoe");
	
	echo($car_array['ford']."<br>");
	
	$acar = $car_array['chevy'];
	
	echo($acar.'<br>');
	
	echo("<br><hr><br>");
	
	//tables
	$flowershop = array(
	
		"Rose" => 5.00,
		"Daisy" => 4.00,
		"Orchids" => 10.0,
		"Mums" => 3.0
	
	);
	
	$flowerTotal = 0;
	
	echo('<table border = "2" cellpadding = "5">');
	
	echo('<tr>
		  <td><b>Flowers<b></td>
		  <td><b>Prices<b></td>
		  </tr>');
	
	foreach($flowershop as $flower => $price){
		
		echo("<tr><td>$flower</td><td>$$price</td></tr>");
		//echo('<tr><td>'.$flower.'</td><td>$'.$price.'</td></tr>');
		
		$flowerTotal = $flowerTotal + $price;
		
	}

	echo("<tr><td></td><td>$flowerTotal</td></tr>");
	
	echo('</table>');
	
	echo("<br><hr><br>");
	
	//sorting
	$flowers = array('rose','daisy','orchid','tulip','mum');
	
	foreach($flowers as $aflower){
		
		echo($aflower.'<br>');
		
	}
	
	sort($flowers);
	
	echo("<br><hr><br>");
	
	for($i = 0; $i < count($flowers); $i++){
		
		echo($flowers[$i].'<br>');
		
	}
	
	echo("<br><hr><br>");
	
	asort($flowershop);
	
	foreach($flowershop as $key => $value)
		echo("$key costs $ $value<br>");
		
	echo("<br><hr><br>");
	
	ksort($flowershop);
	
	foreach($flowershop as $key => $value)
		echo("$key costs $ $value<br>");
	
	echo("<br><hr><br>");
	
	$shop = array(
	
		array("roses", 2.0, 150,),
		array("daisies", 1.0, 300,),
		array("orchids", 5.0, 200,),
		array("mums", .75, 500,),
	
	);
	
	echo('orchids QTY = '.$shop[2][2].'<br>');
	
	echo("<br><hr><br>");
	
	echo('<ol>');
	
		for($row = 0; $row < 4; $row++){
			
			echo("<li><strong>Row Number is $row</strong>");
			echo("<ul>");
			
			for($col = 0; $col < 3; $col++){
				
				echo("<li>".$shop[$row][$col]."<li>");
				
			}
			
			echo("</ul>");
			echo("</li>");
			
		}
	
	echo('</ol>');
	
	echo("<br><hr><br>");
	
	$nums = array(42,3,54,9,88,6,33);
	
	sort($nums);
	
	echo($nums.'<br><br>');
	
	print($nums.'<br><br>');
	
	//quickly view arrays
	var_dump($nums);
	
	echo("<br><br>");
	
	//removes element just shows stored
	print_r($nums);
	
	rsort($nums);
	
	echo("<br><br>");
	
	print_r($nums);
	
?>