@extends('home.layout.index')
<style type="text/css">
	#add_a{
	font-size: 20px;
	}
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
		    				<img src="{{ $value->uname_img ? $value->uname_img : '/img/1.jpeg'}}" id="img" title="点击更换头像">
		    			</label>
		    			<form action="/home/about/{{ $value->id }}" id="infoLogoForm"  enctype="multipart/form-data"> 
		    				{{ csrf_field() }}
		    				<input type="file" onchange="uploadImg()" id="img_thumb" name="img_thumb" style="display: none"/>
		    			</form>
			    	</i>
			    <h3>{{ $value->nick_name }}</h3>
			    <p>{{ $value->personal_label }}</p>
		   </div>
		<h2 class="gd_title">修改信息</h2>
		<div class="container" style="width: 800px;">
		<form class="form-horizontal" action="/home/about/{{ $value->id }}" method="post" >
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<input type="hidden" name="uname_img" id="uname_img">
		  <div class="form-group">
		    <label for="nick_name" class="col-sm-2 control-label">昵称</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="nick_name" name="nick_name" placeholder="昵称" value="{{ $value->nick_name }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="sex" class="col-sm-2 control-label">性别</label>&nbsp;&nbsp;&nbsp;
		    <div class="col-sm-10">
		    	@if($value->sex == 0)
			    <input type="radio" name="sex" value="0" checked>&nbsp;男&nbsp;&nbsp;&nbsp;
			    <input type="radio" name="sex" value="1">&nbsp;女&nbsp;&nbsp;&nbsp;
			    @else
			    <input type="radio" name="sex" value="0">&nbsp;男&nbsp;&nbsp;&nbsp;
			    <input type="radio" name="sex" value="1" checked>&nbsp;女&nbsp;&nbsp;&nbsp;
			    @endif
			</div>
		  </div>
		  <div class="form-group">
		    <label for="work" class="col-sm-2 control-label">职业</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="work" name="work" value="{{ $value->work }}" placeholder="职业">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="phone" class="col-sm-2 control-label">手机号</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="phone" name="phone" placeholder="手机号" value="{{ session('userinfo')->phone }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="real_name" class="col-sm-2 control-label">真实姓名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="real_name" name="real_name" placeholder="真实姓名" value="{{ $value->real_name }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="location" class="col-sm-2 control-label">所在地</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="location" name="location" placeholder="所在省份市区，例：广东广州" value="{{ $value->location }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="personal_label" class="col-sm-2 control-label">个性签名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="personal_label" name="personal_label" placeholder="个性签名" value="{{ $value->personal_label }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="email" class="col-sm-2 control-label">e-mail</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" id="email" name="email" placeholder="邮箱" value="{{ $value->email }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="QQ" class="col-sm-2 control-label">QQ</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="QQ" name="QQ" placeholder="QQ" value="{{ $value->QQ }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="chat" class="col-sm-2 control-label">微信</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="chat" name="chat" value="{{ $value->chat }}" placeholder="微信">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="description" class="col-sm-2 control-label">个人标签</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="description" name="description" placeholder="例：技术宅、幽默搞笑、乐观、文艺青年..." value="{{ $value->description }}">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-success">提交</button>
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
    </script>
@endsection