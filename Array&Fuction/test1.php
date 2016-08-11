
<meta charset="utf-8">
<p>检测文件后缀名</p>
<form action="test1.php" method="post">
	<input type="file" value="选择文件" name="strfile" style="margin-bottom: 5px"/>
	<br />
	<input type="submit" value="检测" name="sub"/>
	<p><?php
		if(isset($_POST['sub'])){
			$strFile = $_POST['strfile'];
			$arr = explode('.', $strFile);
			$postfix = $arr[count($arr)-1];
			echo "上传文件的扩展名为：".$postfix;
		}
?></p>
</form>
