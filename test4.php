<?php
	$filestr = file_get_contents("test.txt");
	echo $filestr;
?>
<meta charset="utf-8" />
<form action="index.php" method="post">
	<input type="submit" value="我不同意" name="disagree_sub"/>
</form>
<form action="next.php" method="post">
	<input type="submit" value="同意注册" name="agree_sub" />
</form>