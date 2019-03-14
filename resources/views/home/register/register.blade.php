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
			width: 400px;height: 550px;
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
			<h1 class="text-center" style="color: white;font-size: 35px;">注册</h1>
			<form action="/home/register" method="post" style="margin: 3px;padding: 5px;margin-top: 20px;">
				{{ csrf_field() }}
			  <div class="form-group">
			    <label for="uname" style="color: white;">用户名</label>
			    <input type="text" class="form-control" name="uname" id="uname" placeholder="用户名" autocomplete="on" value="{{ old('uname')}}">
			  </div>
			  <div class="form-group">
			    <label for="phone" style="color: white;">手机号</label>
			    <input type="text" class="form-control" name="phone" id="phone" placeholder="手机号" autocomplete="on" value="{{ old('phone')}}">
			  </div>
			  <div class="form-group">
			    <label for="upass" style="color: white;">密码</label>
			    <input type="password" class="form-control" name="upass" id="upass" placeholder="请输入6～18位密码">
			  </div>
			  <div class="form-group" style="width: 229px;display: inline-block;">
			    <label for="code" style="color: white;">验证码</label>
			    <input type="text" class="form-control" name="code" id="code" placeholder="验证码">
			  </div>
			 	<input type="button" onclick="sendPhone(this);" id="sendBtn" value="获取验证码" class="btn btn-success">
			  <button type="submit" id="btn" class="btn btn-info form-control" style="margin-top: 15px;">注册</button>
			</form>
			<div style="float:left;margin: 5px 95px;padding: 20px;">
				<a href="/home/login" style="font-size: 25px;color: ">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/home/index" style="font-size: 25px;">首页</a>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	function editCon(){
		var t = 60;
		var time =null;
		if(time == null){
			time = setInterval(function(){
			t--;
			//修改当前button和内容
			$('#sendBtn').val('重新发送('+t+'s)');
			if(t <1){
				// 清除定时器
				clearInterval(time);
				time = null;
				$('#sendBtn').val('获取验证码');
				// 设置button状态
				$('#sendBtn').attr('disabled',false);
				}
			},1000);
		}
	}
		//非空验证
		$('#btn').click(function () {
			var uname = $('#uname').val();
			var phone = $('#phone').val();
	        var upass = $('#upass').val();
	        var code = $('#code').val();
	        if(uname == ''){
	        	alert('用户名不能为空');
	        	return false;
	        }else if(phone == ''){
	        	alert('手机号不能为空');
	        	return false;
	        }else if(upass == ''){
	        	alert('密码不能为空');
	        	return false;
	        }else if(code == '' || code.length != 4){
	        	alert('验证码不能为空');
	        	return false;
	        }
	    });

	function sendPhone(obj){
		// // 接收手机号
		var phone = $('#phone').val();
		var upass = $('#upass').val();
		// 定义正则检查手机号是否格式正确
		var phone_grep = /^1{1}[345678]{1}[0-9]{9}$/;
		var upass_grep = /^[\w]{6,18}$/;
		//验证手机号
		if(!phone_grep.test(phone)){
			alert('请输入正确的手机号格式！');
			return false;
		}
		//验证密码
		if(!upass_grep.test(upass)){
			alert('请输入正确的密码格式！');
			return false;
		}
		// 将js对象转化成jquery对象
		var object = $(obj);
		//设置button状态
		object.attr('disabled',true);
		// 获取当前的按钮上的文字
		var text = object.val();
		// console.log(text);
		
		//发送ajax请求
		if(text == '获取验证码'){
				// 发送ajax 请求后台 
				$.get('/home/register/sendPhone',{'phone':phone},function(data){
					// console.log(data);
					if(data.code == 0){
						editCon();
					}else{
						alert(data.msg);
					}
				},'json');	
			}else{
				return false;
		}
	}		    
</script>