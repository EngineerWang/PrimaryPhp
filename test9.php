<?php
	/*
	for($i=1; $i<=9; $i++){
			for($j=1; $j<=$i; $j++){
				if($j % 3 == 0){
					continue;
				}
				echo $i." * ".$j." = ".($i * $j)." ";
			}
			echo "<br />";
		}*/
	/*
	for($i=1; $i<=9; $i++){
			for($j=1; $j<=$i; $j++){
				if($j > 2){
					break;
				}
				echo $i." * ".$j." = ".($i * $j)." ";
			}
			echo "<br />";
		}*/
	for($i=1; $i<=9; $i++){
		if($i > 3){
			break;
		}
		for($j=1; $j<=$i; $j++){
			if($j > 2){
				break;
			}
			echo $i." * ".$j." = ".($i * $j)." ";
		}
		echo "<br />";
	}
?>