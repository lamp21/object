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
    <label class="col-sm-2 control-label">图片</label>
    <div class="col-sm-10" style="width:600px;">
        <input type="file" placeholder="广告图片" name="pic" id="file1" onchange="change('pic1','file1')">
        <br>
        <img src="" id="pic1" alt="" style="width:100px;">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="网址 http:// https:// ftp://"name="url">
    </div>
  </div>
  
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">广告内容</label>
    <div class="col-sm-10">
        <textarea class="form-control" placeholder="广告内容" name="content"></textarea>
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
<script>
  //使用IE条件注释来判断是否IE6，通过判断userAgent不一定准确
  if (document.all) document.write('<!--[if lte IE 6]><script type="text/javascript">window.ie6= true<\/script><![endif]-->');
  // var ie6 = /msie 6/i.test(navigator.userAgent);//不推荐，有些系统的ie6 userAgent会是IE7或者IE8
  function change(picId,fileId) {
      var pic = document.getElementById(picId);
      var file = document.getElementById(fileId);
      if(window.FileReader){//chrome,firefox7+,opera,IE10+
         oFReader = new FileReader();
         oFReader.readAsDataURL(file.files[0]);
         oFReader.onload = function (oFREvent) {pic.src = oFREvent.target.result;};        
      }
      else if (document.all) {//IE9-//IE使用滤镜，实际测试IE6设置src为物理路径发布网站通过http协议访问时还是没有办法加载图片
          file.select();
          file.blur();//要添加这句，要不会报拒绝访问错误（IE9或者用ie9+默认ie8-都会报错，实际的IE8-不会报错）
          var reallocalpath = document.selection.createRange().text//IE下获取实际的本地文件路径
          //if (window.ie6) pic.src = reallocalpath; //IE6浏览器设置img的src为本地路径可以直接显示图片
          //else { //非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现，IE10浏览器不支持滤镜，需要用FileReader来实现，所以注意判断FileReader先
              pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
              pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';//设置img的src为base64编码的透明图片，要不会显示红xx
         // }
      }
      else if (file.files) {//firefox6-
          if (file.files.item(0)) {
              url = file.files.item(0).getAsDataURL();
              pic.src = url;
          }
      }
  }
</script>
@endsection