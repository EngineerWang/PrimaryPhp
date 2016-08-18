<style>
	a{
		font-weight: bold;
		color: blue;
	}
	#back{
		color: orange;
	}
</style>
<p><a href="center.php" id="back">返回用户中心</a></p>
<a href="send.php">写邮件</a>
<a href="mail.php?flag=rid">收件箱</a>
<a href="mail.php?flag=sid">发件箱</a>
<?php
	include "conn.php";
	$flag = 'rid';
	$name = 'sid';
	if(isset($_GET['flag'])){
		$flag = $_GET['flag'];
	}
	if($flag == 'sid'){
		$name = 'rid';
	}
	$sql = "select * from message,user where message.$name=user.userid and $flag='".$_COOKIE['userid']."'";
	$query = mysqli_query($link, $sql);
	while($rs = mysqli_fetch_array($query)){
?>
	<p><?php 
		if($flag == 'sid'){
			echo "收件人：".$rs['name'];
		}else{
			echo "发件人：".$rs['name'];
		}
	?></p>
	<p><?php echo "内&nbsp;容：".$rs['mcon']?></p>
	<hr />
<?php
	}
?>
