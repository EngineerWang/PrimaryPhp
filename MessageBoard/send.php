<meta charset="utf-8">
<style>
	form{
		text-align: center;
	}
	input{
		margin-bottom: 10px;
	}
	textarea{
		margin-bottom: 10px;
	}
	span{
		vertical-align: top;
	}
	a{
		font-weight: bold;
		color: blue;
	}
	#back{
		color: orange;
	}
</style>
<p><a href="index.php" id="back">返回主页</a></p>
<?php
	include "conn.php";
	if(isset($_GET['authorid'])){
		$rid = $_GET['authorid'];
		$sql = "select * from user where userid='$rid'";
		$query = mysqli_query($link, $sql);
		$rs = mysqli_fetch_array($query);
	}
	if(isset($_POST['sub'])){
		$content = $_POST['content'];
		$rname = $_POST['receiver'];
		$sql = "select * from user where name='$rname'";
		$query = mysqli_query($link, $sql);
		$rs = mysqli_fetch_array($query);
		if(!$rs){
			echo "<script>alert('收件人不存在!');location.href='send.php'</script>";
		}
		$sql = "insert into message(mid, sid, rid, mcon, mtime) values(null,'".$_COOKIE['userid']."','".$rs['userid']."', '$content', now())";
		$query = mysqli_query($link, $sql);
		if($query){
			echo "<script>alert('发送成功!');location.href='index.php'</script>";
		}else{
			echo "<script>alert('发送失败');location.href='index.php'</script>";
		}
	}
?>
<form action="send.php" method="post">
	<!-- <input type="hidden" name="hid" value="<?php echo $rs['userid'];?>" /> -->
	收件人：<input type="text" name="receiver" value="<?php echo $rs['name']?>"/><br />
	<p>发件人：<?php echo $_COOKIE['username'];?></p>
	<span>内&nbsp;容：</span><textarea rows='20' cols='40' name="content"></textarea><br />
	<input type="submit" name="sub" value="发送" />
</form>

