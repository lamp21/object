<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="/register/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="/register/bootstrap/js/jquery.js"></script>
	<script type="text/javascript" src="/register/bootstrap/js/bootstrap.js"></script>
	<style type="text/css">
		body{
			background: url(/register/images/1.jpeg);
			font-size: 15px;
		}
		.container{
			width: 400px;height: 430px;
			border: 1px lightblue solid;
			border-radius: 20px;
			margin: auto;
			padding: 18px;
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<div>
		<div class="container">
			<h1 class="text-center" style="color: white;font-size: 35px;">登录</h1>
			<form action="/home/dologin" method="post" style="margin: 3px;padding: 5px;margin-top: 20px;">
				{{ csrf_field() }}
			  <div class="form-group">
			    <label for="phone" style="color: white;">手机号</label>
			    <input type="text" class="form-control" name="phone" id="phone" placeholder="手机号" autocomplete="on" value="">
			  </div>
			  <div class="form-group">
			    <label for="upass" style="color: white;">密码</label>
			    <input type="password" class="form-control" name="upass" id="upass" placeholder="密码">
			  </div>
			  <button type="submit" id="btn" onclick="login()" class="btn btn-info form-control" style="margin-top: 15px;">登录</button>
			</form>
			<div style="float:left;margin: 5px 95px;padding: 20px;">
				<a href="/home/register" style="font-size: 25px;color: ">注册</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/home/index" style="font-size: 25px;">首页</a>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	function login(){
		// // 接收手机号
		var phone = $('#phone').val();
		// var upass = $('#upass').val();
		// 定义正则检查手机号是否格式正确
		var phone_grep = /^1{1}[345678]{1}[0-9]{9}$/;
		// var upass_grep = /^[\w]{6,18}$/;
		//验证手机号
		if(!phone_grep.test(phone)){
			alert('请输入正确的手机号格式！');
			return false;
		}
		//验证密码
		// if(!upass_grep.test(upass)){
			// alert('请输入正确的密码！');
			// return false;
		// }		
	}		    
</script>