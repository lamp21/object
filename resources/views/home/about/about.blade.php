@extends('home.layout.index')

@section('content')
	<article>
	  <div class="whitebg about">
	    <div class="ab_box"> <i class="avatar_pic"><a href=""><img src="/home_public/images/avatar.jpg"></a></i>
	      <h3>测试用户</h3>
	      <p>个性签名栏。。。。</p>
	    </div>
	    <h2 class="gd_title">基本信息</h2>
	    <div class="container" style="width: 800px;">
		<div>
		  <table>
		      <tbody>
		      <tr>
		        <th>登录名：</th>
		        <td>测试</td>
		        <!-- <td><a href="" style="color:blue;">修改密码</a></td> -->
		      </tr>
		      <tr>
		        <th>昵称：</th>
		        <td>测试</td>
		      </tr><br>
		      <tr>
		        <th>性别：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>职业：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>真实姓名：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>所在地：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>个性签名：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>邮箱：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>QQ：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>微信：</th>
		        <td>测试</td>
		      </tr>
		      <tr>
		        <th>个人标签：</th>
		        <td>测试</td>
		      </tr>
		  </tbody>
		</table>
		</div>
	</div>
	<span class="ly_button"><a href="http://www.yangqq.com/e/tool/gbook/?bid=1" target="_blank">修改资料</a></span>
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