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
  <div class="whitebg">
    <h2 class="htitle"><span class="hnav"><a href="/home/link/create" target="_blank">申请链接</a></span>优秀个人博客</h2>
    <ul class="site_tj site_yx">
      @foreach($link_list as $key=>$v)
      <li><a href="{{$v->link_adr}}" target="_blank" title="{{$v->link_name}}">{{$v->link_name}}</a></li>
     @endforeach
    </ul>
  </div>
</article>
 @endsection