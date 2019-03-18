@extends('home.layout.index')

@section('content')
<!-- 头部开始 -->
<div class="searchbox">
  <div class="search">
    <form action="" method="post" name="searchform" id="searchform">
      <input name="search" id="keyboard" class="input_text" value="{{ $request['search'] or ''}}" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
      <input name="show" value="title" type="hidden">
      <input name="tempid" value="1" type="hidden">
      <input name="tbname" value="news" type="hidden">
      <input class="input_submit" value="搜索" type="submit">
    </form>
  </div>
  <div class="searchclose"></div>
</div>

<!--top end-->
<article> 
  <!--lbox begin-->
  <div class="lbox">
    <!--banbox begin-->
    <div class="banbox">
      <div class="banner">
        <div id="banner" class="fader">
          @foreach($default as $k=>$v)
          <li class="slide" ><a href="/home/wordphoto/{{$v->id}}" target="_blank"><img src="{{$v->pic}}"></a></li>
          @endforeach
          <div class="fader_controls">
            <div class="page prev" data-target="prev"></div>
            <div class="page next" data-target="next"></div>
            <ul class="pager_list">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--banbox end--> 
    <!--headline begin-->
    <div class="headline">
      <ul>
        <li>
          <a href="/" title="为什么说10月24日是程序员的节日？">
            <img src="/home_public/images/h1.jpg" alt="为什么说10月24日是程序员的节日？">
            <span>为什么说10月24日是程序员的节日？</span>
          </a>
        </li>
        <li><a href="/" title="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的"><img src="/home_public/images/h2.jpg" alt="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</span></a></li>
      </ul>
    </div>

    <!--headline end-->
    <div class="clearblank"></div>
    <div class="tab_box whitebg">
      <div class="tab_buttons">
        <ul>
          <li class="newscurrent">个人博客</li>
          <!-- <li>工作日记</li>
          <li>心路历程</li>
          <li>我的博客</li>
          <li>前端技术</li> -->
        </ul>
      </div>
      <div class="newstab">
        <div class="newsitem">
          <div class="newspic">
            <ul>
              <li><a href="/"><img src="/home_public/images/2.jpg"><span>个人博客，属于我的小世界！</span></a></li>
              <li><a href="/"><img src="/home_public/images/4.jpg"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的</span></a></li>
            </ul>
          </div>
          <ul class="newslist">

            <li>
              <i></i>
              <a href="/">个人博客，属于我的小世界！</a>
              <p>个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。</p>
            </li>
          </ul>
        </div>
        <div class="newsitem">
          <div class="newspic">
            <ul>
              <li><a href="/"><img src="/home_public/images/3.jpg"><span>个人博客，属于我的小世界！</span></a></li>
              <li><a href="/"><img src="/home_public/images/1.jpg"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的</span></a></li>
            </ul>
          </div>
        </div>
        <div class="newsitem">
          <div class="newspic">
            <ul>
              <li><a href="/"><img src="/home_public/images/2.jpg"><span>个人博客，属于我的小世界！</span></a></li>
              <li><a href="/"><img src="/home_public/images/3.jpg"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的</span></a></li>
            </ul>
          </div>
          
        </div>
        <div class="newsitem" >
          <div class="newspic">
            <ul>
              <li><a href="/"><img src="/home_public/images/3.jpg"><span>个人博客，属于我的小世界！</span></a></li>
              <li><a href="/"><img src="/home_public/images/4.jpg"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的</span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--tab_box end-->
    <div class="zhuanti whitebg">
      <h2 class="htitle">精彩专题</h2>
      <ul>
        @foreach($show as $k=>$v)
        @if($v->status == 2)
      <li>
        <i class="ztpic">
          <a href=" >id}}" target="_blank">
            <img src="{{$v->wd_img}}"></a >
        </i>
        <b>{{$v->title}}</b>
        <span id="sp" style="width: 300px !important;float: left !important;overflow: hidden !important;text-overflow: ellipsis !important;"abbr title="{!!$v->content!!}">
              {!!$v->content!!}
          </abbr>
        </span>
        <a href="/home/wonderful/{{$v->id}}" target="_blank" class="readmore">文章阅读</a >
      </li>
      @endif
      @endforeach
    </ul>
    </div>
    <div class="ad whitebg"> <img src="/home_public/images/longad.jpg"> </div>
    <div class="whitebg bloglist">
      <h2 class="htitle">文章列表</h2>
      <ul> 
      @foreach($article_res as $k=>$v)
      @if($v->display == 0)
        <li>
          <h3 class="blogtitle">暂无数据</h3>
        </li>
      @else
        <li>
          <h3 class="blogtitle">
            <a href="/home/article/{{$v->id}}" target="_blank">{{$v->art_title}}</a>
          </h3>
          <p class="blogtext">
            {!!$v->art_content!!}
          </p>
          <p class="bloginfo">
           
            <i class="avatar"><img src="{{$value->uname_img}}"></i>
            <span>{{$value->uname}}</span>
            
            <span>{{$v->art_time}}</span>
            <span>【<a href="/">原创模板</a>】</span>
          </p>
          <a href="/home/article/{{$v->id}}" class="viewmore">阅读更多</a> </li>
        @endif
        @endforeach
      </ul>
    </div>
    <!--bloglist end--> 
  </div>
  <div class="rbox">
    <div class="card"> 
      <h2>联系我们</h2>
      <p>团队：兄弟出征</p>
      <p>职业：编程小白</p>
      <p>现居：广州</p>
      <p>Email：dancesmiling@qq.com</p>
      <ul class="linkmore">
        <li><a href="http://www.yangqq.com" target="_blank" class="iconfont icon-zhuye" title="网站地址"></a></li>
        <li><a href="http://mail.qq.com/cgi-bin/qm_share" target="_blank" class="iconfont icon-youxiang" title="我的邮箱"></a></li>
        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=2213312318&site=qq&menu=yes" target="_blank" class="iconfont icon---" title="QQ联系我"></a></li>
        <li id="weixin"><a href="#" target="_blank" class="iconfont icon-weixin" title="关注我的微信"></a><i><img src="/home_public/images/wx.png"></i></li>
      </ul>
    </div>
    <div class="whitebg notice">
      <h2 class="htitle">网站公告</h2>
      <ul>
        @foreach($data_announcement as $key=>$val)
          <li><a href="/home/index/{{ $val->id }}">{{ $val->announcement_title }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="whitebg paihang">
      <h2 class="htitle">点击排行</h2>
      <section class="topnews imgscale"><a href="/"><img src="/home_public/images/h1.jpg"><span>6条文章,让你秒变发布文章高手</span></a></section>
      <ul>
        @foreach($wonderful_data as $k=>$v)
      <li>
        <i class="ztpic">
          <a href=" >id}}" target="_blank">
        </i>
        <b>{{$v->title}}</b>
        <span id="sp" style="width: 300px !important;float: left !important;overflow: hidden !important;text-overflow: ellipsis !important;"abbr title="{!!$v->content!!}">
              {!!$v->content!!}
          </abbr>
        </span>
        <a href="/home/wonderful/{{$v->id}}" target="_blank" class="readmore">文章阅读</a >
      </li>
      @endforeach
    </ul>
    </div>
    <div class="whitebg tuijian">
      <h2 class="htitle"><span class="sqlink"><a href="/home/advert">申请广告</a></span>站长推荐</h2>
      <section class="topnews imgscale"><a href="/"><img src="/home_public/images/h2.jpg"><span>6条网址,让你秒变网站高手</span></a></section>
      <ul>
        @foreach($data_advert as $k=>$v)
        <li>
          <a href="{{ $v->url }}"><i><img src="{{ asset('/img') }}{{'/'.$v->pic}}"></i>
            <p>{{ $v->content }}</p>
          </a>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="ad whitebg imgscale">
      <ul>
        <a href="/"><img src="/home_public/images/ad.jpg"></a>
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
    <!-- <div class="whitebg tongji">
      <h2 class="htitle">站点信息</h2>
      <ul>
        <li><b>建站时间</b>：2018-10-24</li>
        <li><b>网站程序</b>：帝国CMS7.5</li>
        <li><b>主题模板</b>：<a href="http://www.yangqq.com" target="_blank">《今夕何夕》</a></li>
        <li><b>文章统计</b>：299条</li>
        <li><b>文章评论</b>：490条</li>
        <li><b>统计数据</b>：<a href="/">百度统计</a></li>
        <li><b>微信公众号</b>：扫描二维码，关注我们</li>
        <img src="/home_public/images/wxgzh.jpg" class="tongji_gzh">
      </ul>
    </div> -->
    <div class="links whitebg">
      <h2 class="htitle">
        <span class="sqlink">
          <a href="/home/link/create">申请链接</a>
        </span>
          <a href="/home/link/">友情链接</a>
      </h2>
      <ul>
        <li><a href="/home/link/" target="_blank">站长推荐</a></li>
      </ul>
    </div>
  </div>
</article>
@endsection