@extends('home.layout.index')
<style type="text/css">
	#img{
		cursor: pointer;
		width: 100%;
    	border-radius: 50%;
	}
</style>
@section('content')
	<article>
		  <div class="whitebg about">
		    <div class="ab_box">
			    	<i class="avatar_pic">	
		    			<label for="img_thumb">
		    				<img src="/img/1.jpeg" id="img" title="点击更换头像">
		    			</label>
		    			<form action="" id="infoLogoForm"  enctype="multipart/form-data"> 
		    				{{ csrf_field() }}
		    				<input type="file" onchange="uploadImg()" id="img_thumb" name="img_thumb" style="display: none"/>
		    			</form>
			    	</i>
			    <h3>{{ $value->nick_name }}</h3>
			    <p>{{ $value->personal_label }}</p>
		   </div>
		<h2 class="gd_title">完善信息</h2>
		<div class="container" style="width: 800px;">
		<form class="form-horizontal" action="/home/about" method="post" >
			{{ csrf_field() }}
			<input type="hidden" name="uname_img" id="uname_img">
		  <div class="form-group">
		    <label for="nick_name" class="col-sm-2 control-label">昵称</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nick_name" name="nick_name" placeholder="输入4～10位">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="sex" class="col-sm-2 control-label">性别</label>
		    <div class="col-sm-10">
			    <input type="radio" name="sex" value="0" checked>&nbsp;男
			    <input type="radio" name="sex" value="1">&nbsp;女
			</div>
		  </div>
		  <div class="form-group">
		    <label for="work" class="col-sm-2 control-label">职业</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="work" name="work" placeholder="职业">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="real_name" class="col-sm-2 control-label">真实姓名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="real_name" name="real_name" placeholder="真实姓名">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="location" class="col-sm-2 control-label">所在地</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="location" name="location" placeholder="所在省份市区，例：广东广州">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="personal_label" class="col-sm-2 control-label">个性签名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="personal_label" name="personal_label" placeholder="个性签名">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">e-mail</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="email" name="email" placeholder="邮箱">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="QQ" class="col-sm-2 control-label">QQ</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="QQ" name="QQ" placeholder="QQ">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="chat" class="col-sm-2 control-label">微信</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="chat" name="chat" placeholder="微信">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="description" class="col-sm-2 control-label">个人标签</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="description" name="description" placeholder="例：技术宅、幽默搞笑、乐观、文艺青年...">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" id="but" class="btn btn-success">提交</button>
		    </div>
		  </div>
		</form>
		</div>
		    <h2 class="gd_title">加入我们</h2>
		    <ul class="qq_join">
		      <li>
		        <section><img src="/home_public/images/qq1.png">
		          <p>网页设计交流吧①</p>
		          <p>QQ群号：280998807</p>
		        </section>
		      </li>
		      <li>
		        <section><img src="/home_public/images/qq2.png">
		          <p>网页设计交流吧②</p>
		          <p>QQ群号：291195645</p>
		        </section>
		      </li>
		      <li>
		        <section><img src="/home_public/images/joinwx.png">
		          <p>关注官方<b>微信</b>公众号</p>
		          <p>掌握最新的模板信息！</p>
		        </section>
		      </li>
		      <li>
		        <section><img src="/home_public/images/joinwxqun.png">
		          <p>网页设计交流<b>微信群</b></p>
		          <p>目前只接受群主拉进群</p>
		        </section>
		      </li>
		    </ul>
		  </div>
	</article>
	<script type="text/javascript">
    	function uploadImg(){
    		var path = $('#img_thumb').val();
    		var fileSize = $('#img_thumb')[0].files[0].size; //单位b

    		
    		//判断上传文件的后缀名是否符合
            var exc = path.substr(path.lastIndexOf('.') + 1);
            if (exc != 'jpg' && exc != 'gif' && exc != 'png' && exc != 'jpeg') {
                alert("请选择正确的gif,png,jpg,jpeg格式!");
                return false;
            }

            //图片大小验证
	    	if(fileSize > 204800){
                 alert('请上传大小小于200k的图片');
                 return false;
                }
		
    		$.ajax({
				url: "/home/about/upload",
				type: 'POST',
				data: new FormData($('#infoLogoForm')[0]), // 内置对象 创建表单 
				processData:false, //不限定格式
				sync : false,
				contentType:false, //不进行特定格式编码
				dataType:"text",
				success : function(data){
				//成功 修改头像路径
					//修改图片
					$('#img').attr('src',data);
					//给form赋值
					$('#uname_img').val(data);
				}
			});
    	}

    	//非空验证
		$('#but').click(function () {
			var nick_name = $('#nick_name').val();
			var work = $('#work').val();
	        var real_name = $('#real_name').val();
	        var location = $('#location').val();
	        var personal_label = $('#personal_label').val();
	        var email = $('#email').val();
	        var QQ = $('#QQ').val();
	        var chat = $('#chat').val();
	        var description = $('#description').val();
	        /*if(nick_name == ''){
	        	alert('昵称不能为空');
	        	return false;
	        }else if(work == ''){
	        	alert('职业不能为空');
	        	return false;
	        }else if(real_name == ''){
	        	alert('真实姓名不能为空');
	        	return false;
	        }else if(location == ''){
	        	alert('所在地不能为空');
	        	return false;
	        }else if(personal_label == ''){
	        	alert('个性签名不能为空');
	        	return false;
	        }else if(email == ''){
	        	alert('邮箱不能为空');
	        	return false;
	        }else if(QQ == ''){
	        	alert('QQ不能为空');
	        	return false;
	        }else if(chat == ''){
	        	alert('微信不能为空');
	        	return false;
	        }else if(description == ''){
	        	alert('个人标签不能为空');
	        	return false;
	        }*/

			var QQ_grep = /^[1-9][0-9]{8,10}$/;
	   		//验证手机号
			if(!QQ_grep.test(QQ)){
				alert('请输入正确的QQ号！');
				return false;
			}
			
	    });
    </script>
@endsection