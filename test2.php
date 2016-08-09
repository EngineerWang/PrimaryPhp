<?php
	/*
	echo "<table border='1' align='center'>";
			for($i = 1; $i<=9; $i++){
				echo "<tr>";
					for($j = 1; $j<=$i; $j++){
						echo "<td>";
						echo $i." * ".$j." = ".$i * $j." ";
						echo "</td>";
					}
				echo "</tr>";
			}
		echo "</table>"*/
	/*
	echo "<table border='1' align='center'>";
			for($i = 9; $i>=1; $i--){
				echo "<tr>";
				for($j = 1; $j<= $i; $j++){
					echo "<td>";
					echo $i." * ".$j." = ".$i * $j." ";
					echo "</td>";
				}
				echo "</tr>";
			}
		echo "</table>";*/
	/*
	echo "<table border='1' align='center'>";
				for($i = 9; $i>=1; $i--){
					echo "<tr>";
					for($t = 9 - $i; $t>0; $t--){
						echo "<td>";
						echo "";
						echo "</td>";
					}
					for($j = 1; $j<= $i; $j++){
						echo "<td>";
						echo $i." * ".$j." = ".$i * $j." ";
						echo "</td>";
					}
					echo "</tr>";
				}
		echo "</table>";*/
	echo "<table border='1' align='center'>";
			for($i = 1; $i<=9; $i++){
				echo "<tr>";
				for($t = 9 - $i; $t>0; $t--){
					echo "<td>";
					echo "</td>";
				}
				for($j = 1; $j<= $i; $j++){
					echo "<td>";
					echo $i." * ".$j." = ".$i * $j." ";
					echo "</td>";
				}
				echo "</tr>";
			}
	echo "</table>";
?>