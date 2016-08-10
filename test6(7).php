<style type="text/css">
	input{
		margin-top: 5px;
	}
	table{
		border: 1px solid #000;
		margin: 0 auto;
		width: 500px;
	}
	table td{
		border: 1px solid #000;
	}
</style>
<?php
	if(isset($_GET['sub'])){
		$rows = $_GET['irows'];
		$cols = $_GET['icols'];
		$color = "";
		echo "<table>";
		for($i=0; $i<$rows; $i++){
			if($i % 2 == 0){
				$color = "red";
			}else{
				$color = "yellow";
			}
			echo "<tr bgColor=$color onmouseover='changeColor(this)' onmouseout='recoverColor(this)'>";
			for($j=0; $j<$cols; $j++){
				echo "<td>$i</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<meta charset="utf-8">
<form action="test6(7).php" method="get">
	请输入行：<input type="text" name="irows" />
	<br />
	请输入列：<input type="text" name="icols" / >
	<br />
	<input type="submit" name="sub" value="生成列表" />
	<input type="submit" name="res" value="重置列表" />
</form>
<script>
	var baseColor = '';
	function changeColor(obj){
		baseColor = obj.bgColor;
		obj.bgColor = 'blue';
	}
	function recoverColor(obj){
		obj.bgColor = baseColor;
	}
</script>