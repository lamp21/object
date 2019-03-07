<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页-Homie action Blog</title>
<meta name="keywords" content="blog" />
<meta name="description" content="blog" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/home_public/css/base.css" rel="stylesheet">
<link href="/home_public/css/m.css" rel="stylesheet">
<script src="/home_public/js/jquery-1.8.3.min.js" ></script>
<script src="/home_public/js/comm.js"></script>
<link href="/home_public/css/bootstrap.css" rel="stylesheet">
<script src="/home_public/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="/home_public/css/bootstrap.css">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<style>
/*.kf {
    position: fixed;
    right: 20px;
    top: 30%;
    color: #fff;
    z-index: 999;
    background: #212121;
    border: #1c2327 3px solid;
    width: 175px;
    border-radius: 3px;
    text-align: center;
}

.kf h2 span {
    
    background: url(/home_public/images/close.png) no-repeat;
    width: 25px;
    height: 25px;
    float: right;
}*/

/*h2 {
    display: block;
    font-size: 15px;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
*/
/*.kfdh {
    border-top: 1px solid #222222;
    border-bottom: 1px solid #222222;
    margin: 10px 0;
}*/

/*.kfnum img {
    margin: 10px auto 0;
}

img {
    border: 0;
    display: block;
    width:160px;
    height:96px;
}
*/
.zhuanti li { float: left; width: 32.6%; border-bottom: #eee 1px solid; border-left: #eee 1px solid; overflow: hidden; padding: 25px; -moz-transition: all .5s ease; -webkit-transition: all .5s ease; transition: all .5s ease; }
.card p { font-size: 15px; padding: 0 0 0 20px; line-height: 25px; text-shadow: 0px 1px 2px rgba(0,0,0,.5); color: #d0d2d4; -webkit-animation: animations2 5s ease-in-out 5s; -moz-animation: animations2 5s ease-in-out 5s; -o-animation: animations2 5s ease-in-out 5s; -ms-animation: animations2 5s ease-in-out 5s; animation: animations2 5s ease-in-out 5s; }
* {
    margin: 0;
    padding: 0;
}

div {
    display: block; 
}
body {
    /*font: 15px "Microsoft YaHei", Arial, Helvetica, sans-serif;*/
    color: #333;
    background: #E9EAED;
    line-height: 1.5;
    overflow-x: hidden;
}

a.qqservice_list_link {
    width: 90%;
    display: block;
    text-align: center;
    margin: auto;
    padding: 5px 0;
    border-radius: 5px;
    color: #fff;
    background: linear-gradient(to right, #2e74e5 0%, #00c1de 100%);
}

a {
    text-decoration: none;
    color: #333;
}

/*p { 
    font-size: 10px;
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;

}
 
.aaa a{
    display: inline;
    float: left;
    padding: 0 20px;
    color:cyan;
    font-size: 18px;
    list-style: none;
    text-decoration: none;
    line-height: 50px;
}

}*/
  
</style>
</head>
<body>
<!--top begin-->
<header id="header">
   <div class="navbox">
    <h2 id="mnavh"><span class="navicon"></span></h2>
    <div class="logo"><a href="">Homie action Blog</a></div>
    <nav>
      <ul id="starlist" style="font-size: 18px;">
        <li><a href="/home/index">首页</a></li>
          
              <li class="menu"><a href="list2.html" onclick="return false;">文章分类</a>
                @foreach($cates_data as $k=>$v)
                  <ul class="sub">   
                      @foreach($v['sub'] as $kk=>$vv)     
                        <li><a href="/8">{{ $vv->cname }}</a>
                            <ul>
                              @foreach($vv['sub'] as $kkk=>$vvv)     
                              <li><a href="/8">{{ $vvv->cname }}</a></li>
                              @endforeach
                            </ul>
                        </li>
                      @endforeach
                  </ul>
              </li>
          @endforeach
          <li><a href="/home/wonderful/">推荐文章</a></li>
          <li><a href="/home/article/create"><b style="color: yellow;">+&nbsp;发布文章</b></a></li>
          <li><a href="/home/about">关于我</a></li>
          <li><a href="/home/login">登录</a></li>
          <li><a href="">注册</a></li>
        </div>
      </ul>
    </nav>
    <div class="searchico"></div>
  </div>
   <!--  <div class="kf">
      <h2><span id="closed" class="searchclose"></span>客服在线</h2>
      <ul>
        <li><a href="http://wpa.qq.com/msgrd?v=3&amp;uin=476847113&amp;site=qq&amp;menu=yes" target="_blank" class="qqservice_list_link">QQ客服</a></li>
      </ul>
      <ul class="kfdh">
        <p class="kftext">客服微信扫码</p>
        <p class="kfnum"><img src="https://www.yangqq.com/skin/jxhx/images/wx.png"></p>
      </ul>
      <p class="kftext">服务时间</p>
      <p class="kftime">周一至周日 9:00-21:00</p>
    </div>   --> 
</header>
<!-- 内容开始 -->
<div>
@section('content')

@show
</div>
<!-- 内容结束 -->
<footer>
  <div class="box">
    <div class="wxbox">
      <ul>
        <li><img src="/home_public/images/wxgzh.jpg"><span>微信公众号</span></li>
        <li><img src="/home_public/images/wx.png"><span>我的微信</span></li>
      </ul>
    </div>
    <div class="endnav">
      <p><b>站点声明：</b></p>
      <p>1、本站个人博客模板，均为杨青青本人设计，个人可以使用，但是未经许可不得用于任何商业目的。</p>
      <p>2、所有文章未经授权禁止转载、摘编、复制或建立镜像，如有违反，追究法律责任。举报邮箱：<a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=HHh9cn95b3F1cHVye1xtbTJ-c3E" target="_blank">dacesmiling@qq.com</a></p>
      <p>Copyright © <a href="http://www.yangqq.com" target="_blank">www.yangqq.com</a> All Rights Reserved. 备案号：<a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a></p>
    </div>
  </div>
  <a href="#">
  <div class="top"></div>
  </a> </footer>
</body>
</html>