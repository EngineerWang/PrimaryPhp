<?php
	/*
	for($i=1; $i<=9; $i++){
			for($j=1; $j<=$i; $j++){
				echo $i." * ".$j." = ".$i * $j." ";
			}
			echo "<br />";
		}*/
	/*
	$i = 1;
		while($i <= 9){
			$j = 1;
			while($j <= $i){
				echo $i." * ".$j." = ".$i * $j." ";
				$j++;
			}
			echo "<br />";
			$i++;
		}*/
	$i = 1;
	do{
		$j = 1;
		do{
			echo $i." * ".$j." = ".$i * $j." ";
			$j++;
		}while($j <= $i);
		$i++;
		echo "<br />";
	}while($i <= 9);
?>
