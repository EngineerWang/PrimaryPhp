<?php
	$i = 0;
	$result = array();
	while(count($result) < 5){
		$arr[$i] = rand(0, 9);
		$result = array_unique($arr);
		$i++;
	}
	foreach($result as $v){
		echo $v." ";
	}
?>