@extends('home.layout.index')

@section('content')
 
<article> 
  <!--lbox begin-->
  <div class="lbox">
    <div class="content_box whitebg">
      <h2 class="htitle">
        <span class="con_nav">您现在的位置是：<a href="/home/index">网站首页</a>><a href="javascript:return false;">我的发布</a></span>我的发布
      </h2>
      @foreach($wordres as $k=>$v)
      <h1 class="con_tilte">{{$v->art_title}}</h1>
      <p class="bloginfo">
        <i class="avatar"><img src="/home_public/images/avatar.jpg"></i>
        <span><b style="color: black;">转载于:</b>{{session('userinfo')->uname}}</span>
        <span>{{$v->art_time}}</span>
        <span>109990人已围观</span>
      </p>
      <p class="con_info">
        <b>分类：</b><i>{{$v->cate_uid}}</i>
      </p>
      <div class="con_text">
        {!!$v->art_content!!}
        @endforeach
        <div class="nextinfo">
          <p>上一篇：<a href="/download/f/886.html">html5 个人博客模板《蓝色畅想》</a></p>
          <p>下一篇：<a href="/download/f/907.html">个人博客模板《tree》-响应式个人网站模板</a></p>
        </div>
      </div>
    </div>
    <div class="whitebg">
      <h2 class="htitle">相关文章</h2>
      <ul class="otherlink">
        <li><a href="/download/div/2018-04-22/815.html" title="html5个人博客模板《黑色格调》">html5个人博客模板《黑色格调》</a></li>
        <li><a href="/download/div/2018-04-18/814.html" title="html5个人博客模板主题《清雅》">html5个人博客模板主题《清雅》</a></li>
        <li><a href="/download/div/2018-03-18/807.html" title="html5个人博客模板《绅士》">html5个人博客模板《绅士》</a></li>
        <li><a href="/download/div/2018-02-22/798.html" title="html5时尚个人博客模板-技术门户型">html5时尚个人博客模板-技术门户型</a></li>
        <li><a href="/download/div/2017-09-08/789.html" title="html5个人博客模板主题《心蓝时间轴》">html5个人博客模板主题《心蓝时间轴》</a></li>
        <li><a href="/download/div/2017-07-16/785.html" title="古典个人博客模板《江南墨卷》">古典个人博客模板《江南墨卷》</a></li>
        <li><a href="/download/div/2017-07-13/783.html" title="古典风格-个人博客模板">古典风格-个人博客模板</a></li>
        <li><a href="/download/div/2015-06-28/748.html" title="个人博客《草根寻梦》—手机版模板">个人博客《草根寻梦》—手机版模板</a></li>
        <li><a href="/download/div/2015-04-10/746.html" title="【活动作品】柠檬绿兔小白个人博客模板">【活动作品】柠檬绿兔小白个人博客模板</a></li>
        <li><a href="/jstt/bj/2015-01-09/740.html" title="【匆匆那些年】总结个人博客经历的这四年…">【匆匆那些年】总结个人博客经历的这四年…</a></li>
      </ul>
    </div>

    <div class="whitebg gbook">
      <h2 class="htitle">文章评论</h2>
      <ul>
        <li>
        <div class="comment">
        <div class="comment-level"></div>
        <div class="comment-text-area">
          @foreach($wordres as $k=>$v)
          <form action="/home/message/{{$v->id}}">
          <div>
            <textarea class="text-area text-area-input" name="message">请输入评论内容......</textarea>
          </div>
          <div class="text-area-bottom "><input type="submit" value="发送评论" class="btn btn-info">
        </div>
        </form>
         @endforeach
        </div>
        </div>
        
        <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
          <h3 class="text=control text-info">网友评论</h3>
        </li>
      </ul>
    </div>
  </div>
  <!--lbox end-->
  <div class="rbox">
    <div class="whitebg paihang">
      <h2 class="htitle">点击排行</h2>
      <section class="topnews imgscale"><a href="/"><img src="images/h1.jpg"><span>6条网页设计配色原则,让你秒变配色高手</span></a></section>
      <ul>
        <li><i></i><a href="/">十条设计原则教你学会如何设计网页布局!</a></li>
        <li><i></i><a href="/">用js+css3来写一个手机栏目导航</a></li>
        <li><i></i><a href="/">6条网页设计配色原则,让你秒变配色高手</a></li>
        <li><i></i><a href="/">三步实现滚动条触动css动画效果</a></li>
        <li><i></i><a href="/">个人博客，属于我的小世界！</a></li>
        <li><i></i><a href="/">安静地做一个爱设计的女子</a></li>
        <li><i></i><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a></li>
        <li><i></i><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a></li>
      </ul>
    </div>
    <div class="whitebg tuijian">
      <h2 class="htitle">本栏推荐</h2>
      <section class="topnews imgscale"><a href="/"><img src="images/h2.jpg"><span>6条网页设计配色原则,让你秒变配色高手</span></a></section>
      <ul>
        <li><a href="/"><i><img src="/home_public/images/text01.jpg"></i>
          <p>十条设计原则教你学会如何设计网页布局!</p>
          </a></li>
        <li><a href="/"><i><img src="/home_public/images/text02.jpg"></i>
          <p>用js+css3来写一个手机栏目导航</p>
          </a></li>
        <li><a href="/"><i><img src="/home_public/images/text03.jpg"></i>
          <p>6条网页设计配色原则,让你秒变配色高手</p>
          </a></li>
        <li><a href="/"><i><img src="/home_public/images/text04.jpg"></i>
          <p>三步实现滚动条触动css动画效果</p>
          </a></li>
        <li><a href="/"><i><img src="/home_public/images/text05.jpg"></i>
          <p>个人博客，属于我的小世界！</p>
          </a></li>
        <li><a href="/"><i><img src="/home_public/images/text06.jpg"></i>
          <p>安静地做一个爱设计的女子</p>
          </a></li>
        <li><a href="/"><i><img src="/home_public/images/text07.jpg"></i>
          <p>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</p>
          </a></li>
      </ul>
    </div>
    <div class="ad whitebg imgscale">
      <ul>
        <a href="/"><img src="/home_public/images/ad.jpg"></a>
      </ul>
    </div>
    <div class="whitebg cloud">
      <h2 class="htitle">标签云</h2>
      <ul>
        <a href="" target="_blank">个人博客模板</a> <a href="" target="_blank">css动画</a> <a href="" target="_blank">布局</a> <a href="" target="_blank">今夕何夕</a> <a href="" target="_blank">SEO</a> <a href="" target="_blank">女程序员</a> <a href="" target="_blank">小世界</a> <a href="" target="_blank">个人博客</a> <a href="" target="_blank">网页设计</a>
      </ul>
    </div>
    <div class="whitebg wenzi">
      <h2 class="htitle">猜你喜欢</h2>
      <ul>
        <li><a href="/">十条设计原则教你学会如何设计网页布局!</a></li>
        <li><a href="/">用js+css3来写一个手机栏目导航</a></li>
        <li><a href="/">6条网页设计配色原则,让你秒变配色高手</a></li>
        <li><a href="/">三步实现滚动条触动css动画效果</a></li>
        <li><a href="/">个人博客，属于我的小世界！</a></li>
        <li><a href="/">安静地做一个爱设计的女子</a></li>
        <li><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a></li>
        <li><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a></li>
      </ul>
    </div>
    <div class="ad whitebg imgscale">
      <ul>
        <a href="/"><img src="/home_public/images/ad02.jpg"></a>
      </ul>
    </div>
    <div class="whitebg tongji">
      <h2 class="htitle">站点信息</h2>
      <ul>
        <li><b>建站时间</b>：2018-10-24</li>
        <li><b>网站程序</b>：帝国cms</li>
        <li><b>主题模板</b>：<a href="http://www.yangqq.com" target="_blank">《今夕何夕》</a></li>
        <li><b>文章统计</b>：299条</li>
        <li><b>文章评论</b>：490条</li>
        <li><b>统计数据</b>：<a href="/">百度统计</a></li>
        <li><b>微信公众号</b>：扫描二维码，关注我们</li>
        <img src="images/wxgzh.jpg" class="tongji_gzh">
      </ul>
    </div>
  </div>
</article>
@endsection