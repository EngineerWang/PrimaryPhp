<?php
	include "conn.php";
	if($_GET['blogid']){
		$blogid = $_GET['blogid'];
		$sql = "update article set hids=hids+1 where blogid='$blogid'";
		$query = mysqli_query($link, $sql);
		if($query){
			$sql = "select * from article,user where article.authorid=user.userid and blogid='$blogid'";
			$query = mysqli_query($link, $sql);
			$rs = mysqli_fetch_array($query);
		}
	}
?>
<a href="index.php">返回主页</a><br />
<h2>标题：<?php echo $rs['title'];?></h2> <a href="edi.php?blogid=<?php echo $rs['blogid'];?>">编辑</a> | <a href="del.php?blogid=<?php echo $rs['blogid'];?>">删除</a>
<a href="send.php?authorid=<?php echo $rs['authorid'];?>">发送邮件</a>
<p>访问量：<?php echo $rs['hids'];?></p>
<p>发表时间：<?php echo $rs['time'];?></p>
<p>内容：<?php echo $rs['content'];?></p>
<p>类型：<?php echo $rs['type'];?></p>
<p>作者：<?php echo $rs['name']?></p>
<hr />
<form aciton="view.php" method="post">
	<input type="hidden" name="hid" value="<?php echo $rs['blogid'];?>"/>
	<textarea rows='10' cols="20" name="pcon"></textarea>
	<input type="submit" name="comment" value="评论" />
</form>
<?php
	if(isset($_POST['comment'])){
		$comment = $_POST['pcon'];
		$id = $_COOKIE['userid'];
		$blogid = $_POST['hid'];
		$sql = "insert into comment(plid, pbid, puid, pcon, ptime) values(null, '$blogid', '$id', '$comment', now())";
		$query = mysqli_query($link, $sql);
		if($query){
			echo "<script>alert('评论成功!');location.href='view.php?blogid=".$blogid."'</script>";
		}else{
			echo "<script>alert('评论失败!');location.href='view.php'</script>";
		}
	}
?>
<?php
	$sql = "select * from comment,user where comment.puid=user.userid and pbid='$blogid'";
	$query = mysqli_query($link, $sql);
	while($rs = mysqli_fetch_array($query)){
?>
<p><?php echo $rs['pcon'];?></p>
<p>评论者：<?php echo $rs['name'];?></p>
<p>评论时间：<?php echo $rs['ptime'];?></p>
<hr />
<?php
	}
?>