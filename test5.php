<?php
	if(isset($_GET['sub'])){
		$score = $_GET['score'];
		if(is_numeric($score) && ($score >=0 && $score <= 100)){
			if($score >= 80 && $score <= 100){
				echo "<script>alert('您的成绩为优秀!')</script>";
			}else if($score >= 60 && $score < 80){
				echo "<script>alert('您的成绩为合格!')</script>";
			}else{
				echo "<script>alert('您的成绩不合格!')</script>";
			}
		}else if($score == ""){
			echo "<script>alert('请输入分数!')</script>";
		}else{
			echo "<script>alert('输入分数非法!')</script>";
		}
	}
	if(isset($_GET['res'])){
		$score = "";
	}
?>
<meta charset="utf-8"/>
<h2>输入分数查询成绩</h2>
<form action="test5.php" method="get">
	<input type="text" name="score" style="margin-bottom:5px" value=<?php echo $score; ?>>
	<br />
	<input type="submit" name="sub" value="提交查询"/>
	<input type="submit" name="res" value="重置分数"/>
</form>