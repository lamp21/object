@extends('home.layout.index')
<style>
  #sp{
    display:none;
  }
</style>
@section('content')
<article>
  <div class="whitebg about">
    <div>
		<h1 class="text-center" style="text-align:center;color:gray;">精彩文章推荐</h1>
    </div>
    <h2 class="gd_title">推荐文章</h2>
    <ul class="xinlu">
      @foreach($articles as $k=>$v)
        <li>
          <a href="/">
            <i>
              <img src="{{ $v->wd_img }}"></i>
            <p>{{ $v->title }}</p>
            <span id="sp">{{ $v->content }}</span></a>
        </li>
        @endforeach
      </ul>
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