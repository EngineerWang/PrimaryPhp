<style>
	#contain{
		width: 500px;
		height: 300px;
		background-color: #03FCEA;
		margin: 0 auto;
		text-align: center;
	}
	#title{
		height: 30px;
		background-color: #ccc;
		color: #fff;
		text-align: center;
		line-height: 30px;
	}
	#second-title{
		height: 40px;
		font-size: 14px;
		background-color: #03FCEA;
		border: 0;
	}
	table{
		text-align: center;
		width: 300px;
		background-color:#ccc;
		margin:10px auto;
	}
	tr{
		background-color: #fff;
	}
	input{
		width: 60px;
		height: 30px;
		background-color: #E3F0EF;
		border: 1px solid #ccc;
	}
</style>
<?php?>
<div id="contain">
	<h3 id="title">根据商品上市年份排序</h3>
	<p id="second-title">根据商品上市年份排序</p>
	<?php
		$arr = array('2012 Macbook Pro','2009 iMac','2011 Macbook Air','2007 iPad1');
		if(isset($_POST['reverse'])){
			sortFun($arr);
		}
		function sortFun($arr){
			rsort($arr, SORT_NUMERIC);
			$i = 1;
			echo "<table>";
			echo "<tr style='background-color: #E3F0EF;'>";
			echo "<td>商品顺序</td>";
			echo "<td colspan='2'>商品名称</td>";
			echo "</tr>";
			foreach($arr as $v){
				echo "<tr>";
				echo "<td>".$i++."</td>";
				echo "<td colspan='2'>".$v."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		if(isset($_POST['upright'])){
			sort($arr, SORT_NUMERIC);
			$i = 1;
			echo "<table>";
			echo "<tr style='background-color: #E3F0EF;'>";
			echo "<td>商品顺序</td>";
			echo "<td colspan='2'>商品名称</td>";
			echo "</tr>";
			foreach($arr as $v){
				echo "<tr>";
				echo "<td>".$i++."</td>";
				echo "<td colspan='2'>".$v."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}			
	?>
	<form action="test7.php" method="post">
		<input type="submit" value="正序" name="upright" id="upright"/>
		<input type="submit" value="反序" name="reverse" />
	</form>
</div>