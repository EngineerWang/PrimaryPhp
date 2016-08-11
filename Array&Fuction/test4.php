<style type="text/css">
	form{
		text-align: center;
	}
	input{
		margin-bottom: 5px;
	}
</style>
<form action="test4.php" method="post">
	<h3>请输入标题内容和日期</h3>
	新闻标题：<input type="text" name="title" />
	<br />
	新闻内容：<input type="text" name="content" />
	<br />
	新闻日期：<input type="text" name="date" />
	<br />
	<input type="submit" name="sub" value="提交" />
	<p><strong>转换字符串结果：</strong><?php
	if(isset($_POST['sub'])){
		$title = $_POST['title'];
		$content = $_POST['content'];
		$date = $_POST['date'];
		$arr = array();
		array_push($arr, $title, $content, $date);
		$str = implode('，', $arr);
		echo $str;
	}
?></p>
</form>