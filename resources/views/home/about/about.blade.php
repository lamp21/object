@extends('home.layout.index')
<style type="text/css">
	#add_a{
	font-size: 20px;
	}
</style>
@section('content')
	<article>
	  <div class="whitebg about">
	    <div class="ab_box">
	    	<i class="avatar_pic">
	    		<img src="{{ $value->uname_img }}">
	    	</i>
	      <h3>{{ $value->nick_name or ''}}</h3>
	      <p>个性签名:<br>{{ $value->personal_label or ''}}</p>
	    </div>
	    <h2 class="gd_title">基本信息</h2>
	    <div class="container" style="width: 800px;">
		<div>
		  <table class="table">
		      <tbody>
		      <tr>
		        <td id="add_a">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称</td>
		        <td>{{ $value->nick_name or ''}}</td>
		      </tr><br>
		      <tr>
		        <td id="add_a">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</td>
		        <td>
		        	@switch($value->sex)
						@case(0 or '')
							男
						@break
						@case(1 or '')
							女
						@break
						@case(2 or '')
							保密
						@break
		        	@endswitch
		        </td>
		      </tr>
		      <tr>
		        <td id="add_a">职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业</td>
		        <td>{{ $value->work or ''}}</td>
		      </tr>
		      <tr>
		        <td id="add_a">真实姓名</td>
		        <td>{{ $value->real_name or ''}}</td>
		      </tr>
		      <tr>
		        <td id="add_a">所&nbsp;&nbsp;在&nbsp;&nbsp;地</td>
		        <td>{{ $value->location or ''}}</td>
		      </tr>
		      <tr>
		        <td id="add_a">个性签名</td>
		        <td>{{ $value->personal_label or ''}}</td>
		      </tr>
		      <tr>
		        <td id="add_a">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱</td>
		        <td>{{ $value->email or ''}}</td>
		      </tr>
		      <tr>
		        <td id="add_a">Q&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Q</td>
		        <td>{{ $value->QQ or ''}}</td>
		      </tr>
		      <tr>
		        <td id="add_a">微&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;信</td>
		        <td>{{ $value->chat or ''}}</td>
		      </tr>
		      <tr>
		        <td id="add_a">个人标签</td>
		        <td>{{ $value->description or ''}}</td>
		      </tr>
		  </tbody>
		</table>
		</div>
	</div>
	<span class="ly_button"><a href="/home/about/create">完善资料</a></span><br>
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