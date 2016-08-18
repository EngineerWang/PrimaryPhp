<style>
	input,textarea{
		margin-bottom: 5px;
	}
	span{
		vertical-align: top;
	}
	form{
		text-align: center;
	}
</style>
<?php
	include "conn.php";
	$blogid = $_GET['blogid'];
	if($_COOKIE['userid']){
		if($_GET['blogid']){
			$blogid = $_GET['blogid'];
			$sql = "select * from article where blogid=$blogid";
			$query = mysqli_query($link, $sql);
			$rs = mysqli_fetch_array($query);
			if($rs['authorid'] != $_COOKIE['userid']){
				echo "<script>alert('您不是此文章的作者!无法对此文章进行操作!');location.href='index.php'</script>";
			}
		}
	}else{
		echo "<script>alert('请先登录!');location.href='index.php'</script>";
	}
	if(isset($_POST['sub'])){
			if($_COOKIE['userid']){
			$hid = $_POST['hid'];
			$sql = "select * from article where blogid=$hid";
			$query = mysqli_query($link, $sql);
			$rs = mysqli_fetch_array($query);
			if($rs['authorid'] == $_COOKIE['userid']){
				$title = $_POST['title'];
				$content = $_POST['content'];
				$sql = "update article set title='$title',content='$content' where blogid='$hid'";
				$query = mysqli_query($link, $sql);
				if($query){
					echo "<script>alert('修改成功!');location.href='index.php';</script>";
				}else{
					echo "<script>alert('修改失败!');location.href='index.php';</script>";
				}
			}else{
				echo "<script>alert('您不是此文章的作者!无法对此文章进行操作!');location.href='index.php'</script>";
			}
		}else{
			echo "<script>alert('请先登录!');location.href='index.php'</script>";
		}
	}
	
?>
<form action="edi.php" method="post">
	<input type="hidden" name="hid" value="<?php echo $blogid;?>" />
	标题：<input type="text" name="title" /><br />
	<span>内容：</span><textarea rows='15' cols='30' name="content"></textarea><br />
	<input type="submit" name="sub" value="提交" id="sub"/>
</form>