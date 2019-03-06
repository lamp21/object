@extends('home.layout.index')

@section('content')
<article>
	<form>
    <div class="whitebg about">
    <div>
      <h1 class="text-center" style="text-align:center;color:gray;">发表贴文</h1>
    </div>
      <div class="ab_box"> <i class="avatar_pic"><a href=""><img src="/home_public/images/avatar.jpg"></a></i>
      <h3>测试用户</h3>
      <p>个性签名栏。。。。</p>
    </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">标题</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="标题">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">关键字</label>
	    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="关键字">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputFile">内容</label>
	  	<!-- 加载编辑器的容器 -->
	    <script id="container" name="content" type="text/plain">
	        
	    </script>
	    <!-- 配置文件 -->
	    <script type="text/javascript" src="/home_public/text/ueditor.config.js"></script>
	    <!-- 编辑器源码文件 -->
	    <script type="text/javascript" src="/home_public/text/ueditor.all.js"></script>
	    <!-- 实例化编辑器 -->
	    <script type="text/javascript">
	        var ue = UE.getEditor('container');
	    </script>
	    
	  </div>
	  <button type="submit" class="btn btn-info">发表贴文</button>
	</form>
</div>
    <h2 class="gd_title">我的博客</h2>
    <ul class="myblog">
      <li><b>创建时间</b>
        <p>2011年01月12日</p>
        <p><a href="http://www.yangqq.com" target="_blank" class="buttons">主页</a></p>
      </li>
      <li><b>主题模板</b>
        <p><a href="http://www.yangqq.com" target="_blank">《今夕何夕》</a></p>
        <p><a href="/" class="buttons">下载</a></p>
      </li>
      <li><b>网站程序</b>
        <p>帝国CMS7.5</p>
        <p><a href="http://www.yangqq.com" target="_blank" class="buttons">下载</a></p>
      </li>
      <li><b>服务器商</b>
        <p>阿里云服务器</p>
        <a href="/" class="buttons">1888代金券领取</a></li>
      <li><b>免费空间</b>
        <p><a href="http://www.4562.com/?u=3CE3E8" target="_blank">金牛云服</a></p>
        <a href="/" class="buttons">国内主机免费领</a></li>
    </ul>
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
</article>
@endsection