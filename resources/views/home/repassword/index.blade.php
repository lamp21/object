@extends('home.layout.index')
<style type="text/css">
	#img{
		/*cursor: pointer;*/
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
		    				<img src="{{ $value->uname_img }}" id="img" title="点击更换头像">
		    			</label>
			    	</i>
			    <h3>{{ $value->nick_name }}</h3>
			    <p>{{ $value->personal_label }}</p>
		   </div>
		<h2 class="gd_title">修改密码</h2>
		<div class="container" style="width: 800px;">
		<form class="form-horizontal" action="/home/repassword" method="post" >
			{{ csrf_field() }}
		  <div class="form-group">
		    <label for="nick_name" class="col-sm-2 control-label">原始密码</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="upass" name="upass" placeholder="原始密码">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="nick_name" class="col-sm-2 control-label">新密码</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="" name="" placeholder="新密码">
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
@endsection