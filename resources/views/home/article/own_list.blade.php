 @extends('home.layout.index')

@section('content')
<article> 
  <!--lbox begin-->
  @foreach($userinfo as $k=>$v)
  <div class="lbox">
    <div class="whitebg lanmu"> <i class="avatar_pic"><img src="{{ $v->uname_img ? $v->uname_img : '/img/1.jpeg'}}"></i>
      <h1>{{session('userinfo')->uname}}</h1>
      <p>{{$v->personal_label}}</p>
    </div>
    @endforeach
    <div class="zhuanti whitebg">
      <h2 class="htitle"><span class="hnav"></span>我的发布</h2>
      <ul>
        @foreach($word_res as $k=>$v)
        <li> 
          @if($v->art_status ==1)
          <i class="ztpic">
            <a href="/home/article/{{$v->id}}" target="_blank"><img src="/home_public/images/title_lose.jpg"></a>
          </i> 
          @elseif($v->art_status ==2)
          <i class="ztpic">
            <a href="/home/article/{{$v->id}}" target="_blank"><img src="/home_public/images/title_agree.jpg"></a>
          </i> 
          @endif
          <b>{{$v->art_title}}</b>
          <span style="width: 300px !important;float: left !important;overflow: hidden !important;text-overflow: ellipsis !important;"abbr title="{!!$v->art_content!!}">
            {!!$v->art_content!!}
          </span>
          <a href="/home/article/{{$v->id}}" target="_blank" class="readmore">文章预览</a><br>
          <div class="text-center"> 
          <a href="/home/article/{{ $v->id }}/edit" target="_blank" class="btn btn-info">修改</a> 
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <form action="/home/article/{{$v->id}}" method="post" style="display: inline-block;">
              {{ csrf_field() }}
              {{ method_field('DELETE')}}
              <input type="submit" onclick="return confirm('确定要删除吗?');" value="删除" class="btn btn-danger">
          </form>
          </div>
        </li>
        @endforeach
      </ul>
    </div>

    <!--bloglist end--> 
  </div>
  <div class="rbox">
    <div class="whitebg paihang">
      <h2 class="htitle">点击排行</h2>
      <section class="topnews imgscale"><a href="/"><img src="/home_public/images/h1.jpg"><span>6条网页设计配色原则,让你秒变配色高手</span></a></section>
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
      <section class="topnews imgscale"><a href="/"><img src="/home_public/images/h2.jpg"><span>6条网页设计配色原则,让你秒变配色高手</span></a></section>
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
      </ul>
    </div>
  </div>
</article>
@endsection