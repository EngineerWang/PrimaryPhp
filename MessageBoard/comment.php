<style>
	p a{
		font-weight: bold;
		color: blue;
	}
	#back{
		color: orange;
	}
</style>
<a href="center.php" id="back">返回用户中心</a>
<?php
	include "conn.php";
	if($_COOKIE['userid']){
		$userid = $_COOKIE['userid'];
		$sql = "select * from article,comment where article.blogid=comment.pbid and puid='$userid'";
		$query = mysqli_query($link, $sql);
		while($rs = mysqli_fetch_array($query)){
?>
<p><a href="view.php?blogid=<?php echo $rs['blogid']?>"><?php echo "文章标题：".$rs['title'];?></a></p>
<p><?php echo "评论内容：".$rs['pcon'];?></p>
<p><?php echo "评论时间：".$rs['ptime']?></p>
<hr />
<?php
		}
	}
?>