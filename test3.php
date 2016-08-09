<?php
	if(isset($_GET['sub'])){
		$num1 = $_GET['num1'];
		$num2 = $_GET['num2'];
		$ysf = $_GET['ysf'];
		$sum = 0;
			if(is_numeric($num1) && is_numeric($num2)){
				switch($ysf){
				case '+':
					$sum = $num1 + $num2;
					break;
				case '-':
					$sum = $num1 - $num2;
					break;
				case '*':
					$sum = $num1 * $num2;
					break;
				case '/':
					if($num2 == 0){
						$sum = "除数不能为0";
						break;
					}
					$sum = $num1 / $num2;
					break;
				case '%':
					$sum = $num1 % $num2;
					break;
				defalut:
					echo "error";
					break;
			}
		}else{
			$sum = "输入数字非法";
		}
	}
?>
<caption><h2 align='center'>计算器</h2></caption>
	<form aciton="test3.php" method="get">
		<table border='1' align='center'>
			<tr>
				<td><input type='text' name='num1' value=<?php echo $_GET['num1']!=null?$_GET['num1']:'';?>></td>
				<td>
					<select name='ysf'>
						<option value="+" <?php echo $_GET['ysf']=="+"?"selected":'';?>>+</option>
						<option value="-" <?php echo $_GET['ysf']=="-"?"selected":'';?>>-</option>
						<option value="*" <?php echo $_GET['ysf']=="*"?"selected":'';?>>x</option>
						<option value="/" <?php echo $_GET['ysf']=="/"?"selected":'';?>>/</option>
						<option value="%" <?php echo $_GET['ysf']=="%"?"selected":'';?>>%</option>
					</select>
				</td>
				<td><input type='text' name='num2'/ value=<?php echo $_GET['num2']!=null?$_GET['num2']:'';?>></td>
				<td>
					<input type='submit' name='sub' value='计算' />
				</td>
			</tr>
			<?php
				if(isset($_GET['sub'])){
					echo "<tr>";
					if(is_numeric($sum)){
						$sum = "结果为：".$num1." ".$ysf." ".$num2." = ".$sum;
					}
					echo "<td colspan='4'>$sum</td>";
					echo "</tr>";
				}
			?>
		</table>
	</form>