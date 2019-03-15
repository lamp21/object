@extends('home.layout.index')

@section('content')
<div class="searchbox">
  <div class="search">
    <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
      <input name="keyboard" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
      <input name="show" value="title" type="hidden">
      <input name="tempid" value="1" type="hidden">
      <input name="tbname" value="news" type="hidden">
      <input name="Submit" class="input_submit" value="搜索" type="submit">
    </form>
  </div>
  <div class="searchclose"></div>
</div>
<!--top end-->
<article>
  <!-- 显示错误信息 -->
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
    @endif  
<h2 class="gd_title">友情链接</h2>
<div>
<form class="form-horizontal" method="post" action="/home/link">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="link_name" class="col-sm-2 control-label">网站名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="link_name" placeholder="网站名称" name="link_name">
    </div>
  </div>
  <div class="form-group">
    <label for="link_adr" class="col-sm-2 control-label">网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="link_adr" placeholder="例：http://www.xxxxx.cn http://www.xxxxx.com" value="http://" name="link_adr">
    </div>
  </div>
  <div class="form-group">
    <label for="link_email" class="col-sm-2 control-label">电子邮箱</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="link_email" placeholder="电子邮箱" value="" name="link_email">
    </div>
  </div>
  <div class="form-group">
    <label for="link_des" class="col-sm-2 control-label">网站介绍</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" value="" name="link_des" id="link_des"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">提交申请</button>
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