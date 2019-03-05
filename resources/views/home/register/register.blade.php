

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0"> 
	<title>注册界面</title>
    <link href="/home_public/css/default.css" rel="stylesheet" type="text/css" />
	<!--必要样式-->
    <link href="/home_public/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="/home_public/css/demo.css" rel="stylesheet" type="text/css" />
    <link href="/home_public/css/loaders.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class='login' style="position: absolute;height: 350px;">
		<div class="content">
		  <div class='login_title' style="height: 40px;">
		    <center style="position: absolute;top: 50PX;left: 110PX;"><h1 style="font-size: 30px;width: 58px;bottom: 10px;">注&nbsp;&nbsp;册</h1></center>
		  </div>
		  <div class='login_fields'>
		  	<form action="/home/login" method="post">
		  		{{ csrf_field() }}
		  		<div class='login_fields__user'>
			      <div class='icon'>
			        <img alt="" src='/home_public/images/img/user_icon_copy.png'>
			      </div>
			      <input name="uname" placeholder='用户名' maxlength="11" type='text' autocomplete="on" value=""/>
			        <div class='validation'>
			          <img alt="" src='/home_public/images/img/tick.png'>
			        </div>
			    </div>
			    <div class='login_fields__user'>
			      <div class='icon'>
			        <img alt="" src='/home_public/images/img/user_icon_copy.png'>
			      </div>
			      <input name="phone" placeholder='手机号' maxlength="11" type='text' autocomplete="on" value=""/>
			        <div class='validation'>
			          <img alt="" src='/home_public/images/img/tick.png'>
			        </div>
			    </div>
			    <div class='login_fields__password'>
			      <div class='icon'>
			        <img alt="" src='/home_public/images/img/lock_icon_copy.png'>
			      </div>
			      <input name="upass" placeholder='请输入6~12位有效密码' type='password'>
			      <div class='validation'>
			        <img alt="" src='/home_public/images/img/tick.png'>
			      </div>
			    </div>
			    <div class='login_fields__password'>
			      <div class='icon'>
			        <img alt="" src='/home_public/images/img/lock_icon_copy.png'>
			      </div>
			      <input name="repassword" placeholder='请输入6~12位有效密码' type='password'>
			      <div class='validation'>
			        <img alt="" src='/home_public/images/img/tick.png'>
			      </div>
			    </div>
			    <div class='login_fields__password'>
			      <div class='icon'>
			        <img alt="" src='/home_public/images/img/key.png'>
			      </div>
			      <input name="code" placeholder='验证码' maxlength="4" type='text' name="ValidateNum" autocomplete="off">
			      <div class='validation' style="opacity: 1; right: -5px;top: -3px;">
		          <canvas class="J_codeimg" id="myCanvas" onclick="Code();">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
			      </div>
			    </div>
			    <div class='login_fields__submit' style="float:left;left: 31px;top: 30px;">
			    <input type="submit" class="btn btn-success" value="注册" style="width:250px;top: 100px;" />
			    </div>
			  </form>
			</div>
		  <div class='success'>
		  </div>
		</div>
		  <div class='disclaimer'>
		    <p style="font-size: 18px;margin: 10px;float: left;">Homie action&nbsp;&nbsp;&nbsp;<a href="/home/index" style="color:lightblue;">首页</a>
		    	&nbsp;&nbsp;&nbsp;<a href="/home/index/login" style="color:lightblue;">登录</a></p>
		  </div>
		</div>
		<div class='authent'>
		  <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
	        <div class="loader-inner ball-clip-rotate-multiple">
	            <div></div>
	            <div></div>
	            <div></div>
	        </div>
	        </div>
		  <p>认证中...</p>
		</div>
	</div>
	<div class="OverWindows"></div>
	
    <link href="/home_public/layui/css/layui.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="/home_public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/home_public/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src='js/stopExecutionOnTimeout.js?t=1'></script>
    <script type="text/javascript" src="/home_public/layui/layui.js"></script>
    <script type="text/javascript" src="/home_public/js/Particleground.js"></script>
    <script type="text/javascript" src="/home_public/js/Treatment.js"></script>
    <script type="text/javascript" src="/home_public/js/jquery.mockjax.js"></script>
	<script type="text/javascript">
		var canGetCookie = 0;//是否支持存储Cookie 0 不支持 1 支持
		var ajaxmockjax = 1;//是否启用虚拟Ajax的请求响 0 不启用  1 启用
		//默认账号密码
		
		var truephone = "";
		var trueupass = "";
		
		var CodeVal = 0;
	    Code();
	    function Code() {
			if(canGetCookie == 1){
				createCode("AdminCode");
				var AdminCode = getCookieValue("AdminCode");
				showCheck(AdminCode);
			}else{
				showCheck(createCode(""));
			}
	    }
	    function showCheck(a) {
			CodeVal = a;
	        var c = document.getElementById("myCanvas");
	        var ctx = c.getContext("2d");
	        ctx.clearRect(0, 0, 1000, 1000);
	        ctx.font = "80px 'Hiragino Sans GB'";
	        ctx.fillStyle = "#E8DFE8";
	        ctx.fillText(a, 0, 100);
	    }
	    $(document).keypress(function (e) {
	        // 回车键事件  
	        if (e.which == 13) {
	            $('input[type="submit"]').click();
	        }
	    });
	    //粒子背景特效
	    $('body').particleground({
	        dotColor: '#E8DFE8',
	        lineColor: '#133b88'
	    });
	    $('input[type="uname"]').focus(function () {
	        $(this).prev().animate({ 'opacity': '1' }, 200);
	    });
	    $('input[name="upass"]').focus(function () {
	        $(this).attr('type', 'password');
	    });
	    $('input[type="phone"]').focus(function () {
	        $(this).prev().animate({ 'opacity': '1' }, 200);
	    });
	    $('input[type="phone"],input[type="password"]').blur(function () {
	        $(this).prev().animate({ 'opacity': '.5' }, 200);
	    });
	    $('input[name="phone"],input[name="upass"],input[name="uname"],input[name="repassword"]').keyup(function () {
	        var Len = $(this).val().length;
	        if (!$(this).val() == '' && Len >= 5) {
	            $(this).next().animate({
	                'opacity': '1',
	                'right': '30'
	            }, 200);
	        } else {
	            $(this).next().animate({
	                'opacity': '0',
	                'right': '20'
	            }, 200);
	        }
	    })
	    var open = 0;
	    layui.use('layer', function () {
			// var msgalert = '默认账号:' + truelogin + '<br/> 默认密码:' + truepwd;
   //  		var index = layer.alert(msgalert, { icon: 6, time: 4000, offset: 't', closeBtn: 0, title: '友情提示', btn: [], anim: 2, shade: 0 });  
			// layer.style(index, {
			// 	color: '#777'
			// }); 
	        //非空验证
	        $('input[type="submit"]').click(function () {
	            var uname = $('input[name="uname"]').val();
	            var phone = $('input[name="phone"]').val();
	            var upass = $('input[name="upass"]').val();
	            var code = $('input[name="code"]').val();
	           /* 验证格式是否正确
	            var uname_grep = /^[a-zA-Z]{1}[\w]{7,15}$/;
	            var phone_grep = /^1{1}[3456789]{1}[0-9]{9}$/;
	            var upass_grep = /^1{1}[3-9][\d]{9}$/;
	            var repassword_grep = /^1{1}[3-9][\d]{9}$/;
	            if(!uname_grep.test(uname)){
					ErroAlert('请输入正确的昵称');
					return false;
				}else if(!phone_grep.test(phone)){
					ErroAlert('请输入正确的手机号格式');
					return false;
				}else if(!upass_grep.test(upass)){
					ErroAlert('请输入6~12位密码');
					return false;
				}else if(!repassword_grep.test(repassword)){
					ErroAlert('请输入6~12位密码');
					return false;
				};*/

				//空值验证
	            if (uname == '') {
	                ErroAlert('请输入昵称');
	            } else if (phone == '') {
	                ErroAlert('请输入手机号');
	            }else if (upass == '') {
	                ErroAlert('请输入密码');
	            } else if (code == '' || code.length != 4) {
	                ErroAlert('输入验证码');
	            } else {
	                //认证中..
	                fullscreen();
	                $('.login').addClass('test'); //倾斜特效
	                setTimeout(function () {
	                    $('.login').addClass('testtwo'); //平移特效
	                }, 300);
	                setTimeout(function () {
	                    $('.authent').show().animate({ right: -320 }, {
	                        easing: 'easeOutQuint',
	                        duration: 600,
	                        queue: false
	                    });
	                    $('.authent').animate({ opacity: 1 }, {
	                        duration: 200,
	                        queue: false
	                    }).addClass('visible');
	                }, 500);

	                //登录
	                var JsonData = {uname: uname, phone: phone, upass: upass, code: code };
					//此处做为ajax内部判断
					// console.log(JsonData);
					var url = "";
					if(JsonData.code.toUpperCase() == CodeVal.toUpperCase()){
						url = "Ajax/Login";
					}else{
						url = "Ajax/LoginFalse";
					}
					
					
	                AjaxPost(url, JsonData,
	                                function () {
	                                    //ajax加载中
	                                },
	                                function (data) {
	                                    //ajax返回 
	                                    //认证完成
	                                    setTimeout(function () {
	                                        $('.authent').show().animate({ right: 90 }, {
	                                            easing: 'easeOutQuint',
	                                            duration: 600,
	                                            queue: false
	                                        });
	                                        $('.authent').animate({ opacity: 0 }, {
	                                            duration: 200,
	                                            queue: false
	                                        }).addClass('visible');
	                                        $('.login').removeClass('testtwo'); //平移特效
	                                    }, 2000);
	                                    setTimeout(function () {
	                                        $('.authent').hide();
	                                        $('.login').removeClass('test');
	                                        if (data.Status == 'ok') {
	                                            //登录成功
	                                            $('.login div').fadeOut(100);
	                                            $('.success').fadeIn(1000);
	                                            $('.success').html(data.Text);
												//跳转操作
												
	                                        } else {
	                                            AjaxErro(data);
	                                        }
	                                    }, 2400);
	                                })
	            }
	        })
	    })
	    var fullscreen = function () {
	        elem = document.body;
	        if (elem.webkitRequestFullScreen) {
	            elem.webkitRequestFullScreen();
	        } else if (elem.mozRequestFullScreen) {
	            elem.mozRequestFullScreen();
	        } else if (elem.requestFullScreen) {
	            elem.requestFullscreen();
	        } else {
	            //浏览器不支持全屏API或已被禁用  
	        }
	    }  
		if(ajaxmockjax == 1){
			$.mockjax({  
				url: 'Ajax/Login',  
				status: 200,  
				responseTime: 50,          
				responseText: {"Status":"ok","Text":"登录成功<br /><br />欢迎回来"}  
			}); 
			$.mockjax({  
				url: 'Ajax/LoginFalse',  
				status: 200,  
				responseTime: 50,          
				responseText: {"Status":"Erro","Erro":"手机号或密码或验证码有误"}
			});   
		}
    </script>

</body>
</html>
