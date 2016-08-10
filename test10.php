<?php
	$row = 5;
	/*
	for($i=1; $i<=$row; $i++){
			for($j=1; $j<=($row - $i); $j++){
				echo "&nbsp;";
			}
			for($j=0; $j<(2*$i - 1); $j++){
				echo '*';
			}
			for($j=1; $j<=($row - $i); $j++){
				echo "&nbsp;";
			}
			echo '<br />';
		}*/
	for($i=0; $i<$row; $i++){
		for($j=0; $j<($row-$i-1); $j++){
			echo "&nbsp;";
		}
		if($i == 0){
			echo "*";
			echo "<br />";
			continue;
		}else if($i == ($row - 1)){
			for($j=0; $j<(2*$i + 1); $j++){
				echo "*";
			}
			echo "<br />";
			continue;
		}else{
			echo "*";
			for($j=0; $j<(2*$i - 1); $j++){
				echo "&nbsp;";
			}		
			echo "*";
		}
		/*
		for($j=0; $j<($row-$i-1); $j++){
					echo "&nbsp;";
				}*/
		
		echo "<br />";
	}
?>