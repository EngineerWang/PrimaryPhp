<style type="text/css">
	#div{
		width: 200px;
		height: 200px;
		background-image: url(test11.jpg);
		background-repeat: no-repeat;
		margin: 0 auto;
	}
</style>
<?php
	
?>
<meta charset="utf-8">
<div id="div" style="background-position:<?php
	if(isset($_POST['sub'])){
		$player = $_POST['player'];
		if($player == "0"){
			echo "0 0";
		}else if($player == '2'){
			echo "-100px -200px";
		}else{
			echo "-250px 0";
		}
	}
?>"></div>
<form action="test11.php" method="post">
	你出拳
	<select name="player">
		<option value="0" <?php echo $player=="0"?"selected":"";?>>拳头</option>
		<option value="2" <?php echo $player=="2"?"selected":"";?>>剪刀</option>
		<option value="1" <?php echo $player=="1"?"selected":"";?>>布</option>
	</select>
	<input type="submit" name="sub" value="提交" />
</form>
<div>computer出的是<?php
		if(isset($_POST['sub'])){
			$computer = rand(0, 2);
			if($computer == 0){
				echo "拳头";
			}else if($computer == 1){
				echo "布";
			}else if($computer == 2){
				echo "剪刀";
			}else{
				echo "error";
			}
			echo "<br />";
			$player = (int)$player;
			if($player==2 && $computer==0){
				echo "你输了";
			}else if($player==0 && $computer==2){
				echo "你赢了";
			}else if($player < $computer){
				echo "你输了";
			}else if($player == $computer){
				echo "平局";
			}else{
				echo "你获胜";  
			}
		}
	?></div>

