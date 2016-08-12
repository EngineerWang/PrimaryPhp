<style>
	#contain{
		width: 550px;
		background-color: #03FCEA;
		margin: 0 auto;
		text-align: center;
		padding-bottom: 20px;
	}
	#title{
		height: 30px;
		background-color: #ccc;
		color: #fff;
		text-align: center;
		line-height: 30px;
	}
	table{
		text-align: center;
		width: 500px;
		background-color:#ccc;
		margin:10px auto;
	}
	tr{
		background-color: #fff;
	}
	input{
		margin-bottom: 5px;
	}
	form{
		border-bottom: 1px solid #ccc;
	}
	td{
		color: purple;
		font-weight: bold;
	}
</style>
<div id="contain">
	<h3 id="title">删除并返回数组中的最后一条信息</h3>
	<form action="test9.php" method="post">
		名称：<input type="text" name="name" />
		<br />
		年龄：<input type="text" name="age" />
		<br />
		<input type="submit" value="提交" name="sub" />
	</form>
	<table>
		<?php
			Session_start();
			if(isset($_POST['sub'])){
				$name = $_POST['name'];
				$age = $_POST['age'];
				$_SESSION[$name.rand()] = array($name, $age);
				/*array_push($_SESSION, array($name, $age));*/
				putOut();
			}
			if(isset($_POST['del'])){
				array_pop($_SESSION);
				putOut();
			}
			function putOut(){
				$i = 1;
				echo "<table>";
				echo "<tr style='background-color: #ccc'>";
				echo "<td>编号</td>";
				echo "<td>姓名</td>";
				echo "<td>年龄</td>";
				echo "</tr>";
				foreach($_SESSION as $a){
					echo "<tr>";
					echo "<td>".($i++)."</td>";
					foreach($a as $v){
						echo "<td>".$v."</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</table>
	<form action="test9.php" method="post">
		<input type="submit" name="del" value="删除" />
	</form>
</div>