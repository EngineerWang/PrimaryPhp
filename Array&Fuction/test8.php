<style>
	#contain{
		width: 550px;
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
		width: 500px;
		background-color:#fff;
		margin:10px auto;
	}
	tr{
		background-color: #ccc;
	}
	input{
		width: 60px;
		height: 30px;
		background-color: #E3F0EF;
		border: 1px solid #ccc;
	}
</style>
<div id="contain">
	<h3 id="title">根据商品上市年份排序</h3>
	<p id="second-title">根据商品上市年份排序</p>
	<?php
		$arr = array(
			array(3236, '阿里斯·梅里特', '美国', '1985年07月24日', 6, 12.92),
			array(3246, '杰森·理查森', '美国', '1986年04月04日', 4, 13.04),
			array(2182, '汉斯勒·帕切门特', '牙买加', '1990年06月17日', 7, 13.12),
			array(1804, '劳伦斯·克拉克', '英国', '1990年03月12日', 2, 13.39),
			array(1125, '瑞恩·布莱斯怀特', '巴巴多斯', '1988年06月06日', 8, 13.4),
			array(1477, '奥兰多·奥尔特加', '古巴', '1991年07月29日', 9, 13.43),
		);
		$color = array('red', 'yellow', 'blue', 'green', 'purple', 'orange');
		echo "<table>";
		echo "<tr>";
		echo "<td>排名</td>";
		echo "<td>号码</td>";
		echo "<td>姓名</td>";
		echo "<td>国际</td>";
		echo "<td>生日</td>";
		echo "<td>跑道</td>";
		echo "<td>成绩</td>";
		echo "</tr>";
		foreach($arr as $k=>$a){
			echo "<tr style=background-color:".$color[$k].";>";
			echo "<td>".($k+1)."</td>";
			foreach($a as $v){
				echo "<td>".$v."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	?>
</div>