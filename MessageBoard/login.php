<style>
	form{
		text-align:center;
	}
	input{
		margin-bottom: 10px;
	}
</style>
<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "select * from user where name='$username' and pass='$password'";
		$query = mysqli_query($link, $sql);
		
		if($rs = mysqli_fetch_array($query)){
			setcookie('username', $rs['name']);
			setcookie('userid', $rs['userid']);
			echo "<script>alert('登录成功!');location.href='index.php'</script>";
		}else{
			echo "<script>alert('密码错误或用户名不存在!');location.href='index.php'</script>";
		}
	}
?>
<form action="login.php" method="post">
	用户名：<input type="text" name="username" /><br />
	密&nbsp;码：<input type="password" name="password" /><br />
	<input type="submit" name="sub" value="登录" />
</form>