<style>
	a{
		color: blue;
		font-weight: bold;
	}
	.title{
		text-decoration: none;
		color: #000;
	}
	#back{
		color: orange;
	}
</style>
<a href="center.php" id="back">返回用户中心</a>
<?php
	include "conn.php";
	if(isset($_COOKIE['userid'])){
		$userid = $_COOKIE['userid'];
		$sql = "select * from article where authorid='$userid' order by blogid desc";
		$query = mysqli_query($link, $sql);
		while($rs = mysqli_fetch_array($query)){
?>
<h2><a href="view.php?blogid=<?php echo $rs['blogid'];?>" class="title">标题：<?php echo $rs['title'];?></a></h2> <a href="edi.php?blogid=<?php echo $rs['blogid'];?>">编辑</a> | <a href="del.php?blogid=<?php echo $rs['blogid'];?>">删除</a>
<p>访问量：<?php echo $rs['hids'];?></p>
<p>发表时间：<?php echo $rs['time']?></p>
<p>内容：<?php echo iconv_substr($rs['content'],0,4)."..."?></p>
<p>类型：<?php echo $rs['type'];?>&nbsp;|&nbsp;<a href="type.php?blogid=<?php echo $rs['blogid'];?>">修改类型</a></p>
<hr />
<?php
		}
	}
?>