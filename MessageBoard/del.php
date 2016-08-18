<?php
	include "conn.php";
	if($_COOKIE['userid']){
		$blogid = $_GET['blogid'];
		$sql = "select * from article where blogid=$blogid";
		$query = mysqli_query($link, $sql);
		$rs = mysqli_fetch_array($query);
		if($rs['authorid'] == $_COOKIE['userid']){
			$sql = "delete from article where blogid=$blogid";
			$query = mysqli_query($link, $sql);
			$sql = "delete from comment where pbid=$blogid";
			$query = mysqli_query($link, $sql);
			if($query){
				echo "<script>alert('删除成功!');location.href='index.php';</script>";
			}else{
				echo "<script>alert('删除失败!');location.href='index.php';</script>";
			}
		}else{
			echo "<script>alert('您不是此文章的作者!无法对此文章进行操作!');location.href='index.php'</script>";
		}
	}else{
		echo "<script>alert('请先登录!');location.href='index.php'</script>";
	}
?>