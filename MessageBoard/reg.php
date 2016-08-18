<meta charset="utf-8">
<style>
	input{
		margin-bottom: 10px;
		margin-right: 20px;
	}
	.postfix{
		color: red;
	}
</style>
<?php
?>
<form action="yanzhen.php?>" method="post">
	<input type="hidden" name="hid" id="hid" />
	用户名：<input type="text" name="username" id="username"/><br />
	密&nbsp;码：<input type="password" name="pass" id="pass"/><br />
	确认密码：<input type="password" name="pass1" id="pass1"/><br />
	<input type="submit" name="sub" value="注册" id="sub"/>
</form>
<script src="jquery-1.12.4.min.js"></script>
<script>
	$(function(){
		var $username = $('#username');
		var $pass = $('#pass');
		var $pass1 = $('#pass1');
		var $hid = $('#hid');
		$hid.val('false');
		$username.on('blur', function(){
			$.get('yanzhen.php', 'uname=' + this.value, function(data){
				if(data == 'default'){
					$('#sp').remove();
					$username.after('<span id="sp" class="postfix">用户名已存在</span>');
					$hid.val('false');
				}else if(data == 'error'){
					$('#sp').remove();
					$username.after('<span id="sp" class="postfix">用户名存在非法字符</span>');
					$hid.val('false');
				}else{
					$('#sp').remove();
					$hid.val('true');
				}
			}, 'text');
		});
		$pass.on('blur', function(){
			$.get('yanzhen.php', 'pass=' + this.value, function(data){
				if(data == 'error'){
					$('#pa').remove();
					$pass.after('<span id="pa" class="postfix">密码必须为6~12个字符</span>');
					$hid.val('false');
				}else{
					$('#pa').remove();
					$hid.val('true');
				}
			}, 'text');
		});
		$pass1.on('blur', function(){
			var str = '{"pass":"'+ $pass.val() + '","pass1":"'+ this.value +'"}';
			var oPass = $.parseJSON(str);
			$.post('yanzhen.php', 'pass1=' + $pass.val() + '&pass2=' + this.value, function(data){
				if(data == 'error'){
					$('#re').remove();
					$pass1.after('<span id="re" class="postfix">两次密码不同</span>');
					$hid.val('false');
				}else{
					$('#re').remove();
					$hid.val('true');
				}
			}, 'text');
		});
	});
</script>
