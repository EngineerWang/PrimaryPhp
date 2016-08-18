<style>
	a{
		color: blue;
		font-weight: bold;
	}
	.title{
		text-decoration: none;
		color: #000;
	}
	#logout{
		margin-left: 10px;
	}
	#head{
		display: inline-block;
		width: 80px;
		height: 80px;
		border: 1px solid blue;
		text-align: center;
	}
	#head img{
		width: 80px;
		height: 80px;
	}
	span{
		color: blue;
		font-weight: bold;
	}
	ul{
		list-style: none;
		margin: 0;
		padding: 0;
		margin-top:15px;
	}
	ul li{
		float: left;
		margin-right: 20px;
	}
	ul li a{
		color: orange;
	}
	#type{
		color: orange;
		font-weight: bold;
	}
</style>
<meta charset="utf-8">
<form action='index.php' method='get'>
	<input type='text' name='sercon'/>
	<input type='submit' name='search' value='搜索' />
</form>
<a href="add.php">发表文章</a>&nbsp;<span><?php
	include "conn.php";
	if($_COOKIE['username']){
		$userid = $_COOKIE['userid'];
		$sql = "select * from user where userid='$userid'";
		$query = mysqli_query($link, $sql);
		$rs = mysqli_fetch_array($query);
		if($rs['head']){
			echo "<a href='upload.php' id='head'><img src='".$rs['head']."'/></a>";
		}else{
			echo "<a href='upload.php' id='head'>请上传头像</a>";
		}
		echo $_COOKIE['username']."已登录";
		echo "<a href='logout.php' id='logout'>注销</a>";
		echo "<p><a href='center.php'>用户中心</a></p>";
	}else{
		echo "<a href='login.php'>游客</a>";
	}
?></span>
<a href="reg.php">注册</a>
<ul>
	<li><a href="index.php?">全部</a></li>
	<li><a href="index.php?type=情感">情感</a></li>
	<li><a href="index.php?type=生活">生活</a></li>
	<li><a href="index.php?type=娱乐">娱乐</a></li>
	<li><a href="index.php?type=旅游">旅游</a></li>
	<li><form action="index.php" method="get" id="type">
		类型搜索：<input type="text" name="type"/>
		<input type="submit" name="search_type" value="搜索" />
	</form></li>
</ul><br />
<?php
	$e = 1;
	if(isset($_GET['search'])){
		$sercon = $_GET['sercon'];
		if($sercon){
			$e = "title like '%".$sercon."%'";
		}else{
			$e = 1;
		}
	}
	if(isset($_GET['type']) || isset($_GET['search_type'])){
		$type = $_GET['type'];
		$e = "type like '%".$type."%'";
	}
	$sql = "select * from article,user where authorid=userid and $e order by blogid desc";
	$query = mysqli_query($link, $sql);
	while($rs = mysqli_fetch_array($query)){
		
?>
<h2><a href="view.php?blogid=<?php echo $rs['blogid'];?>" class="title">标题：<?php echo $rs['title'];?></a></h2> <a href="edi.php?blogid=<?php echo $rs['blogid'];?>">编辑</a> | <a href="del.php?blogid=<?php echo $rs['blogid'];?>">删除</a>
<p>访问量：<?php echo $rs['hids'];?></p>
<p>发表时间：<?php echo $rs['time']?></p>
<p>内容：<?php echo iconv_substr($rs['content'],0,4)."..."?></p>
<p>类型：<?php echo $rs['type'];?></p>
<p>作者：<?php echo $rs['name']?></p>
<hr />
<?php
	}
?>