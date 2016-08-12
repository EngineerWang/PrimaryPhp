<style>
	#contain{
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
	#sub{
		height: 40px;
		font-size: 14px;
		background-color: #03FCEA;
		border: 0;
	}
	table{
		text-align: center;
		width: 300px;
		background-color:#ccc;
	}
	tr{
		background-color: #03FCEA;
	}
</style>
<?php?>
<div id="contain">
	<h3 id="title">查看服务器信息</h3>
	<form action="test6.php" method="post">
		<input type="submit" value="显示当前脚本运行信息" id="sub" name="sub"/>
	</form>
	<?php
		if(isset($_POST['sub'])){
			echo "<table>";
				foreach($_SERVER as $k=>$v){
					echo "<tr>";
					echo "<td>".$k."</td>";
					echo "<td colspan='5'>".$v."</td>";
					echo "</tr>";
				}
			date_default_timezone_set('prc');
			$date = date('Y-m-d');
			$time = date('h:i:s');
			echo "<tr>";
			echo "<td>RUNTIME</td>";
			echo "<td colspan='5'>".$date." ".$time."</td>";
			echo "</tr>";
			echo "</table>";
		}			
	?>
</div>
