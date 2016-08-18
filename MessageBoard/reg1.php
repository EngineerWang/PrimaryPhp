<meta charset="utf-8">
<style>
	input{
		margin-bottom: 10px;
	}
	form{
		text-align: center;
	}
</style>
<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$pass1 = $_POST['pass1'];
		if($pass == $pass1){
			$sql = "select * from article where name='$username'";
			$query = mysqli_query($link, $sql);
			$rs = mysqli_fetch_array($query);
			if($rs){
				echo "<script>alert('用户名已存在!请重新输入!');location.href='reg.php'</script>";
			}else{
				$arr = array('&','>', '.', ' ', '<', '%');
				foreach($arr as $v){
					for($i=0; $i<strlen($username); $i++){
						if($v == $username[$i]){
							echo "<script>alert('用户名存在非法字符!请重新输入!');location.href='reg.php'</script>";
						}
					}
				}
				$sql = "insert into user(userid, pass, name) values(null, '$pass', '$username')";
				$query = mysqli_query($link, $sql);
				if($query){
					echo "<script>alert('注册成功!');location.href='index.php'</script>";
				}else{
					echo "<script>alert('注册失败!');location.href='index.php'</script>";
				}
			}
		}else{
			echo "<script>alert('两次密码输入不符!请重新输入!');location.href='reg.php'</script>";
		}
	}
?>
<form action="reg.php" method="post">
	用户名：<input type="text" name="username" /><br />
	密&nbsp;码：<input type="password" name="pass" /><br />
	确认密码：<input type="password" name="pass1" /><br />
	<input type="submit" name="sub" value="注册" />
</form>
