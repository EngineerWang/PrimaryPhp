<?php
	if($_COOKIE['username']){
		setcookie('username', null);
		setcookie('userid', null);
		echo "<script>alert('注销成功!');location.href='index.php'</script>";
	}
?>