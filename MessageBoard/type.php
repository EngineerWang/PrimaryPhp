<style>
	#sub{
		margin-top: 20px;
	}
</style>
<?php
	include "conn.php";
	if(isset($_GET['blogid'])){
		$blogid = $_GET['blogid'];
		$sql = "select * from article where blogid='$blogid'";
		$query = mysqli_query($link, $sql);
		$rs = mysqli_fetch_array($query);
	}
?>
<h2 class='title'>标题：<?php echo $rs['title'];?></h2>
<p>访问量：<?php echo $rs['hids'];?></p>
<p>发表时间：<?php echo $rs['time']?></p>
<p>内容：<?php echo iconv_substr($rs['content'],0,4)."..."?></p>
<p>类型：<?php echo $rs['type'];?></p>
<hr />
<form action="type.php" method="post">
	<input type="hidden" name="hid" value="<?php echo $rs['blogid']?>" />
	<h4>请选择文章的类型</h4>
	情感：<input type="checkbox" name="type[]" value="情感" />
	生活：<input type="checkbox" name="type[]" value="生活"/>
	娱乐：<input type="checkbox" name="type[]" value="娱乐" />
	旅游：<input type="checkbox" name="type[]" value="旅游" />
	其它：<input type="text" name="type[]" />
	<br /><input type="submit" name="sub" value="确认" id="sub"/>
</form>
<?php
	if(isset($_POST['sub'])){
		$hid = $_POST['hid'];
		$type = $_POST['type'];
		foreach($type as $v){
			$str .= $v;
		}
		$sql = "update article set type='$str' where blogid='$hid'";
		$query = mysqli_query($link, $sql);
		if($query){
			echo "<script>alert('修改成功!');location.href='article.php';</script>";
		}else{
			echo "<script>alert('修改成功!');location.href='article.php';</script>";
		}
	}
?>