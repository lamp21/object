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
	</style>
</head>
<body>
	<div>
		<h1 class="text-center">注册</h1>
			<div class="container" style="width: 400px;height: auto;">
			<form action="insert.php" method="post">
			  <div class="form-group">
			    <label for="phone" style="color: white;">手机号</label>
			    <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1" style="color: white;">密码</label>
			    <input type="password" class="form-control"name="upass" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="form-group" style="width: 258px;display: inline-block;">
			    <label for="code" style="color: white;">验证码</label>
			    <input type="text" class="form-control" name="code" id="code" placeholder="code">
			  </div>
			 	<input type="button" onclick="sendPhone(this);" id="sendBtn" value="获取验证码" class="btn btn-success">
			  <button type="submit" class="btn btn-info form-control">注册</button>
			</form>		
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	function editCon(){
		var t = 5;
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

	function sendPhone(obj){
		// // 接收手机号
		var phone = $('#phone').val();
		// 定义正则检查手机号是否格式正确
		var phone_grep = /^1{1}[345678]{1}[0-9]{9}$/;
		//验证手机号
		if(!phone_grep.test(phone)){
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