<?php
	include "conn.php";
	if($_GET['uname']){
		$uname = $_GET['uname'];
		$sql = "select * from user where name='$uname'";
		$query = mysqli_query($link, $sql);
		$rs = mysqli_fetch_array($query);
		$arr = array('&','>', '.', ' ', '<', '%');
		foreach($arr as $v){
			for($i=0; $i<strlen($uname); $i++){
				if($v == $uname[$i]){
					echo "error";
				}
			}
		}
		if($rs){
			echo 'default';
		}else{
			echo 'success';

		}
	}
	if($_GET['pass']){
		$pass = $_GET['pass'];
		if(strlen($pass)<6 || strlen($pass)>12){
			echo 'error';
		}else{
			echo 'success';
		}
	}
	if($_POST['pass1']){
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		if($pass1 == $pass2){
			echo 'success';
		}else{
			echo 'error';
		}
	}
	if($_POST['sub']){
		$flag = $_POST['hid'];
		if($flag == 'true'){
			$username = $_POST['username'];
			$pass = $_POST['pass'];
			$sql = "insert into user(userid, pass, name) values(null, '$pass', '$username')";
			$query = mysqli_query($link, $sql);
			if($query){
				echo "<script>alert('注册成功!');location.href='index.php'</script>";
			}else{
				echo "<script>alert('注册失败!');location.href='index.php'</script>";
			}
		}else{
			echo "<script>alert('注册失败111!');location.href='index.php'</script>";
		}
	}
	
?>