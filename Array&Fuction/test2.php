<style>
	input{
		margin-bottom: 5px;
	}
</style>
<?php
	$dateGate = array(
		'2016.08.01'=>'eating',
		'2016.08.02'=>'sleeping',
		'2016.08.03'=>'coding'
	);
	if(isset($_POST['query'])){
		$date = $_POST['date'];
		$flag = true;
		foreach($dateGate as $k=>$v){
			if($k == $date){
				echo "<script>alert("."'".$k." : ".$v."'".")</script>";
				$flag = false;
			}
		}
		if($flag){
			echo "<script>alert('无备忘')</script>";
		}
	}
?>
<meta charset="UTF-8">
<h3>单击查询当前日程</h3>
<p>输入查询日期：</p>
<form action="test2.php" method="post">
	<input type="text" name="date" />
	<br />
	<input type="submit" name="query" value="查询" style="margin-right: 10px"/>
	<input type="reset" value="重置" />
</form>
