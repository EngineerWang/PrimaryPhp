<style>
	input,textarea{
		margin-bottom: 5px;
	}
	span{
		vertical-align: top;
	}
	form{
		text-align: center;
	}
	#sub{
		margin-top:15px;
	}
</style>
<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$title = $_POST['title'];
		$content = $_POST['content'];
		$type = $_POST['type'];
		foreach($type as $v){
			$str .= $v;
		}
		$sql = "insert into article(blogid, title, content, time,authorid, type) values (null, '$title', '$content', now(), ".$_COOKIE['userid'].", '$str')";
		$query = mysqli_query($link, $sql);
		if($query){
			echo "<script>alert('发表文章成功!');location.href='index.php';</script>";
		}else{
			echo "<script>alert('发表文章失败!');location.href='index.php';</script>";
		}
	}
?>
<form action="add.php" method="post">
	标题：<input type="text" name="title" /><br />
	<span>内容：</span><textarea rows='15' cols='30' name="content"></textarea><br />
	<h4>请选择文章的类型</h4>
	情感：<input type="checkbox" name="type[]" value="情感" />
	生活：<input type="checkbox" name="type[]" value="生活"/>
	娱乐：<input type="checkbox" name="type[]" value="娱乐" />
	旅游：<input type="checkbox" name="type[]" value="旅游" />
	其它：<input type="text" name="type[]" />
	<br /><input type="submit" name="sub" value="发表" id="sub"/>
</form>
