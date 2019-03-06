@extends('home.layout.index')

@section('content')
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>关于我单页-Homie action Blog</title>
<meta name="keywords" content="blog" />
<meta name="description" content="blog" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/home_public/css/base.css" rel="stylesheet">
<link href="/home_public/css/m.css" rel="stylesheet">
<link href="/home_public/css/bootstrap.css" rel="stylesheet">
<script src="/home_public/js/jquery-1.8.3.min.js" ></script>
<script src="/home_public/js/comm.js"></script>
<script src="/home_public/js/bootstrap.js"></script>
<!--[if lt IE 9]>
<script src="/home_public/js/modernizr.js"></script>
<![endif]-->
<style>
textarea{
 resize:none;
}
</style>
</head>

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
  <div class="whitebg about">
    <div class="ab_box"> <i class="avatar_pic"><a href=""><img  src="/home_public/images/avatar.jpg" style="height:100px;"></a></i>
    <h3>测试用户</h3>
    <p>个性签名栏。。。。</p>
  </div>
<h2 class="gd_title">广告链接</h2>
<div>
<form class="form-horizontal" action="/home/advert" method="post" enctype="multipart/form-data"> 
  {{ csrf_field() }} 
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">网站图片</label>
    <div class="col-sm-10">
      <input type="file" id="inputEmail3" placeholder="网站图片" name="pic">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="网址 http://" value="http://" name="url">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">内容</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="广告内容" name="content">
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
        <section><img  src="/home_public/images/qq1.png">
          <p>网页设计交流吧①</p>
          <p>QQ群号：280998807</p>
        </section>
      </li>
      <li>
        <section><img  src="/home_public/images/qq2.png">
          <p>网页设计交流吧②</p>
          <p>QQ群号：291195645</p>
        </section>
      </li>
      <li>
        <section><img  src="/home_public/images/joinwx.png">
          <p>关注官方<b>微信</b>公众号</p>
          <p>掌握最新的模板信息！</p>
        </section>
      </li>
      <li>
        <section><img  src="/home_public/images/joinwxqun.png">
          <p>网页设计交流<b>微信群</b></p>
          <p>目前只接受群主拉进群</p>
        </section>
      </li>
    </ul>
  </div>
</article>
@endsection