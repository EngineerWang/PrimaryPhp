<style>
	input{
		margin-bottom: 10px;
	}
	#back{
		color: orange;
		font-weight: bold;
	}
	form{
		margin-top: 20px;
	}
</style>
<a id="back" href="index.php">返回主页</a>
<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="sfile" /><br />
	<input type="submit" name="sub" value="上传"/>
</form>
<?php
	include "conn.php";
	if($_POST['sub']){
		$sfile = $_FILES['sfile'];
		$tmp_name = $sfile['tmp_name'];
		$postfix = $sfile['name'];
		$postfix = explode('.', $postfix);
		$postfix = $postfix[count($postfix)-1];
		for($i=0; $i<10; $i++){
			$newstr .= rand(0,9);
		}
		$newstr = "./upload/".$newstr.".".$postfix;
		$userid = $_COOKIE['userid'];
		$sql = "update user set head='$newstr' where userid='".$_COOKIE['userid']."'";
		$query = mysqli_query($link, $sql);
		$rs = move_uploaded_file($tmp_name, $newstr);
		if($rs && $query){
			echo "<script>alert('上传成功!');location.href='index.php'</script>";
		}else{
			echo "<script>alert('上传失败!');location.href='index.php'</script>";
		}
	}
?>
