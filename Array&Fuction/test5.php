<style>
	#contain{
		width: 400px;
		height: 300px;
		background-color: #03FCEA;
		margin: 0 auto;
		text-align: center;
	}
	#title{
		height: 30px;
		background-color: #ccc;
		color: #fff;
		text-align: center;
		line-height: 30px;
	}
	#sub{
		width: 250px;
		height: 40px;
		font-size: 14px;
		border:1px solid red;
		background-color: #03FCEA;
	}
	#content{
		width: 300px;
		height: 180px;
		border: 1px solid red;
		margin: 10px auto;
		color: blue;
	}
</style>
<?php?>
<div id="contain">
	<h3 id="title">福利彩票号码自动生成器</h3>
	<form action="test5.php" method="post">
		<input type="submit" value="单击生成新的号码" id="sub" name="sub"/>
	</form>
	<div id="content">
		<?php
			$arr = array(
				'第一注'=>array(),
				'第二注'=>array(),
				'第三注'=>array(),
				'第四注'=>array(),
				'第五注'=>array()
			);
			if(isset($_POST['sub'])){
				foreach($arr as $k=>$a){
					for($i=0; $i<7; $i++){
						$a[$i] = mt_rand(0, 24);
					}
					$arr[$k] = $a;
				}
				foreach($arr as $k=>$a){
				echo "<p>".$k." : ";
				foreach($a as $v){
					echo $v." ";
				}
				echo "</p>";
			}
			}
			
			
		?>
	</div>
</div>
