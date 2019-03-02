@extends('home.layout.index')

@section('content')
<!-- 头部开始 -->
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
  <!--lbox begin-->
  <div class="lbox"> 
    <!--banbox begin-->
    <div class="banbox">
      <div class="banner">
        <div id="banner" class="fader">
          <li class="slide" ><a href="/" target="_blank"><img src="/home_public/images/1.jpg"></a></li>
          <li class="slide" ><a href="/" target="_blank"><img src="/home_public/images/2.jpg"></a></li>
          <li class="slide" ><a href="/" target="_blank"><img src="/home_public/images/3.jpg"></a></li>
          <li class="slide" ><a href="/" target="_blank"><img src="/home_public/images/4.jpg"></a></li>
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
        <li><a href="/" title="为什么说10月24日是程序员的节日？"><img src="/home_public/images/h1.jpg" alt="为什么说10月24日是程序员的节日？"><span>为什么说10月24日是程序员的节日？</span></a></li>
        <li><a href="/" title="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的"><img src="/home_public/images/h2.jpg" alt="个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</span></a></li>
      </ul>
    </div>

    <!--headline end-->
    <div class="clearblank"></div>
    <div class="tab_box whitebg">
      <div class="tab_buttons">
        <ul>
          <li class="newscurrent">个人博客</li>
          <li>工作日记</li>
          <li>心路历程</li>
          <li>我的博客</li>
          <li>前端技术</li>
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
            <li>
              <i></i>
              <a href="/">安静地做一个爱设计的女子</a>

            <li><i></i><a href="/">个人博客，属于我的小世界！</a>
              <p>个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。</p>
            </li>
            <li><i></i><a href="/">安静地做一个爱设计的女子</a>

              <p>自从入了这行，很多人跟我说可以做网络教程，我也有考虑，但最终没有实现，因为我觉得在这个教程泛滥的时代，直接做一套免费的原创个人博客模板更为实在。</p>
            </li>
            <li><i></i><a href="/">我是怎么评价自己的？</a>
              <p>为了挨打轻一些，问我哪里来的，我瞎说了一个说那个谁家的，结果，打得更凶。最后事情还原了真相，我妈说，你要说说奶奶家的，都不会打你了。从此以后，我知道撒谎是会付出更惨痛的代价的，我不再撒谎，也不喜欢爱撒谎的人。</p>
            </li>

            <li>
              <i></i>
              <a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>

            <li><i></i><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>
              <p>不管你是学前端的还是后端的，作为一个程序员，做一个自己的博客，那是必然的。咱们的圈子就这么大，想让更多的人了解你，看看你的技术多牛逼，扔一个博客地址就行了</p>
            </li>
            <li><i></i><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a>
              <p>帝国cms的留言板系统很简单，用户名，邮箱，电话，没有头像显示，如果要增加头像选择，而又不增加表或者字段的情况下，选择改用其中一个字段，比如电话这个，修改一下即可</p>
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
          <ul class="newslist">
            <li><i></i><a href="/">安静地做一个爱设计的女子</a>
              <p>自从入了这行，很多人跟我说可以做网络教程，我也有考虑，但最终没有实现，因为我觉得在这个教程泛滥的时代，直接做一套免费的原创个人博客模板更为实在。</p>
            </li>
            <li><i></i><a href="/">我是怎么评价自己的？</a>
              <p>为了挨打轻一些，问我哪里来的，我瞎说了一个说那个谁家的，结果，打得更凶。最后事情还原了真相，我妈说，你要说说奶奶家的，都不会打你了。从此以后，我知道撒谎是会付出更惨痛的代价的，我不再撒谎，也不喜欢爱撒谎的人。</p>
            </li>
            <li><i></i><a href="/">个人博客，属于我的小世界！</a>
              <p>个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。</p>
            </li>
            <li><i></i><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>
              <p>不管你是学前端的还是后端的，作为一个程序员，做一个自己的博客，那是必然的。咱们的圈子就这么大，想让更多的人了解你，看看你的技术多牛逼，扔一个博客地址就行了</p>
            </li>
            <li><i></i><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a>
              <p>帝国cms的留言板系统很简单，用户名，邮箱，电话，没有头像显示，如果要增加头像选择，而又不增加表或者字段的情况下，选择改用其中一个字段，比如电话这个，修改一下即可</p>
            </li>
          </ul>
        </div>
        <div class="newsitem">
          <div class="newspic">
            <ul>
              <li><a href="/"><img src="/home_public/images/2.jpg"><span>个人博客，属于我的小世界！</span></a></li>
              <li><a href="/"><img src="/home_public/images/3.jpg"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的</span></a></li>
            </ul>
          </div>
          <ul class="newslist">
            <li><i></i><a href="/">我是怎么评价自己的？</a>
              <p>为了挨打轻一些，问我哪里来的，我瞎说了一个说那个谁家的，结果，打得更凶。最后事情还原了真相，我妈说，你要说说奶奶家的，都不会打你了。从此以后，我知道撒谎是会付出更惨痛的代价的，我不再撒谎，也不喜欢爱撒谎的人。</p>
            </li>
            <li><i></i><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>
              <p>不管你是学前端的还是后端的，作为一个程序员，做一个自己的博客，那是必然的。咱们的圈子就这么大，想让更多的人了解你，看看你的技术多牛逼，扔一个博客地址就行了</p>
            </li>
            <li><i></i><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a>
              <p>帝国cms的留言板系统很简单，用户名，邮箱，电话，没有头像显示，如果要增加头像选择，而又不增加表或者字段的情况下，选择改用其中一个字段，比如电话这个，修改一下即可</p>
            </li>
            <li><i></i><a href="/">个人博客，属于我的小世界！</a>
              <p>个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。</p>
            </li>
            <li><i></i><a href="/">安静地做一个爱设计的女子</a>
              <p>自从入了这行，很多人跟我说可以做网络教程，我也有考虑，但最终没有实现，因为我觉得在这个教程泛滥的时代，直接做一套免费的原创个人博客模板更为实在。</p>
            </li>
          </ul>
        </div>
        <div class="newsitem" >
          <div class="newspic">
            <ul>
              <li><a href="/"><img src="/home_public/images/3.jpg"><span>个人博客，属于我的小世界！</span></a></li>
              <li><a href="/"><img src="/home_public/images/4.jpg"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的</span></a></li>
            </ul>
          </div>
          <ul class="newslist">
            <li><i></i><a href="/">安静地做一个爱设计的女子</a>
              <p>自从入了这行，很多人跟我说可以做网络教程，我也有考虑，但最终没有实现，因为我觉得在这个教程泛滥的时代，直接做一套免费的原创个人博客模板更为实在。</p>
            </li>
            <li><i></i><a href="/">我是怎么评价自己的？</a>
              <p>为了挨打轻一些，问我哪里来的，我瞎说了一个说那个谁家的，结果，打得更凶。最后事情还原了真相，我妈说，你要说说奶奶家的，都不会打你了。从此以后，我知道撒谎是会付出更惨痛的代价的，我不再撒谎，也不喜欢爱撒谎的人。</p>
            </li>
            <li><i></i><a href="/">个人博客，属于我的小世界！</a>
              <p>个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。</p>
            </li>
            <li><i></i><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>
              <p>不管你是学前端的还是后端的，作为一个程序员，做一个自己的博客，那是必然的。咱们的圈子就这么大，想让更多的人了解你，看看你的技术多牛逼，扔一个博客地址就行了</p>
            </li>
            <li><i></i><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a>
              <p>帝国cms的留言板系统很简单，用户名，邮箱，电话，没有头像显示，如果要增加头像选择，而又不增加表或者字段的情况下，选择改用其中一个字段，比如电话这个，修改一下即可</p>
            </li>
          </ul>
        </div>
        <div class="newsitem" >
          <div class="newspic">
            <ul>
              <li><a href="/"><img src="/home_public/images/h2.jpg"><span>个人博客，属于我的小世界！</span></a></li>
              <li><a href="/"><img src="/home_public/images/h1.jpg"><span>个人网站做好了，百度不收录怎么办？来，看看他们怎么做的</span></a></li>
            </ul>
          </div>
          <ul class="newslist">
            <li><i></i><a href="/">我是怎么评价自己的？</a>
              <p>为了挨打轻一些，问我哪里来的，我瞎说了一个说那个谁家的，结果，打得更凶。最后事情还原了真相，我妈说，你要说说奶奶家的，都不会打你了。从此以后，我知道撒谎是会付出更惨痛的代价的，我不再撒谎，也不喜欢爱撒谎的人。</p>
            </li>
            <li><i></i><a href="/">个人博客，属于我的小世界！</a>
              <p>个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。</p>
            </li>
            <li><i></i><a href="/">安静地做一个爱设计的女子</a>
              <p>自从入了这行，很多人跟我说可以做网络教程，我也有考虑，但最终没有实现，因为我觉得在这个教程泛滥的时代，直接做一套免费的原创个人博客模板更为实在。</p>
            </li>
            <li><i></i><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a>
              <p>不管你是学前端的还是后端的，作为一个程序员，做一个自己的博客，那是必然的。咱们的圈子就这么大，想让更多的人了解你，看看你的技术多牛逼，扔一个博客地址就行了</p>
            </li>
            <li><i></i><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a>
              <p>帝国cms的留言板系统很简单，用户名，邮箱，电话，没有头像显示，如果要增加头像选择，而又不增加表或者字段的情况下，选择改用其中一个字段，比如电话这个，修改一下即可</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--tab_box end-->
    <div class="zhuanti whitebg">
      <h2 class="htitle"><span class="hnav"><a href="/">原创模板</a><a href="/">古典</a><a href="/">清新</a><a href="/">低调</a></span>精彩专题</h2>
      <ul>
        <li> <i class="ztpic"><a href="/" target="_blank"><img src="/home_public/images/1.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a href="" target="_blank" class="readmore">文章阅读</a> </li>
        <li> <i class="ztpic"><a href="/" target="_blank"><img src="/home_public/images/2.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a href="" target="_blank" class="readmore">文章阅读</a> </li>
        <li> <i class="ztpic"><a href="/" target="_blank"><img src="/home_public/images/3.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a href="" target="_blank" class="readmore">文章阅读</a> </li>
        <li> <i class="ztpic"><a href="/" target="_blank"><img src="/home_public/images/4.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a href="" target="_blank" class="readmore">文章阅读</a> </li>
        <li> <i class="ztpic"><a href="/" target="_blank"><img src="/home_public/images/h2.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a href="" target="_blank" class="readmore">文章阅读</a> </li>
        <li> <i class="ztpic"><a href="/" target="_blank"><img src="/home_public/images/h1.jpg"></a></i> <b>个人博客模板《今夕何夕》-响应式个人...</b><span>个人博客模板《今夕何夕》，宽屏响应式个人博客模板，采用冷色系为主，固定导航栏和侧边栏，无缝滚动图片...</span><a href="" target="_blank" class="readmore">文章阅读</a> </li>
      </ul>
    </div>
    <div class="ad whitebg"> <img src="/home_public/images/longad.jpg"> </div>
    <div class="whitebg bloglist">
      <h2 class="htitle">最新博文</h2>
      <ul>
        <!--多图模式 置顶设计-->
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank"><b>【顶】</b>别让这些闹心的套路，毁了你的网页设计!</a></h3>
          <span class="bplist"><a href="/"> <img src="/home_public/images/b02.jpg" alt=""></a> <a href="/"><img src="/home_public/images/b03.jpg" alt=""></a> <a href="/"><img src="/home_public/images/b04.jpg" alt=""> </a><a href="/"><img src="/home_public/images/b05.jpg" alt=""> </a></span>
          <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if 来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">原创模板</a>】</span></p>
        </li>
        <!--单图-->
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">【个人博客网站制作】自己不会个人博客网站制作，你会选择用什么博客程序源码？</a></h3>
          <span class="blogpic imgscale"><i><a href="/">原创模板</a></i><a href="/" title=""><img src="/home_public/images/b01.jpg" alt=""></a></span>
          <p class="blogtext">这些开源的博客程序源码，都是经过很多次版本测试的，都有固定的使用人群。我所知道的主流的博客程序有，Z-blog，Emlog，WordPress，Typecho等，免费的cms系统有，织梦cms（dedecms），phpcms，帝国cms（EmpireCMS）！... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">原创模板</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">宝宝个人博客模板-亲子博客模板-宝宝个人网站模板</a></h3>
          <span class="blogpic imgscale"><i><a href="/">最新模板</a></i><a href="/" title=""><img src="/home_public/images/b02.jpg" alt=""></a></span>
          <p class="blogtext">这是一个记录宝宝成长点滴的个人博客，用作于宝宝博客，亲子博客，都是适用的。颜色为蓝色调，头部有飘动的卡通云，采用css3动画效果，布局简单，代码精简，还有相册功能，发图片，视频，时间轴可记录重要时刻，也可记录宝宝的生长发育状况，也可以统计宝宝博客网站的所有文章... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">最新模板</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">如何快速建立自己的个人博客网站</a></h3>
          <span class="blogpic imgscale"><i><a href="/">快速建站</a></i><a href="/" title=""><img src="/home_public/images/b03.jpg" alt=""></a></span>
          <p class="blogtext">各大博客门户网站，相继关闭，做一个独立的个人博客网站，那是将来的趋势。越来越多的个人站长倾向于独立建站，有个属于自己的博客网站，那如何快速建立自己的个人博客网站呢，接下来，我就简单给大家介绍一下：以阿里云为例... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">快速建站</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">
          <span class="blogpic imgscale"><i><a href="/">设计制作</a></i><a href="/" title=""><img src="/home_public/images/b04.jpg" alt=""></a></span>
          <p class="blogtext">就拿我自己来说吧，有时候会很矛盾，设计好的作品，不把它分享出来，会觉得待在自己电脑里面实在是没有意义。干脆就发布出去吧。我也害怕收到大家不好的评论，有些评论，可能说者无意，但是对于每一个用心的站长来说，都会受很深的影响，愤怒，恼羞。... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">设计制作</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
        <!--纯文字-->
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
          <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if 来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">原创模板</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
        <!--单图-->
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">【个人博客网站制作】自己不会个人博客网站制作，你会选择用什么博客程序源码？</a></h3>
          <span class="blogpic imgscale"><i><a href="/">原创模板</a></i><a href="/" title=""><img src="/home_public/images/b01.jpg" alt=""></a></span>
          <p class="blogtext">这些开源的博客程序源码，都是经过很多次版本测试的，都有固定的使用人群。我所知道的主流的博客程序有，Z-blog，Emlog，WordPress，Typecho等，免费的cms系统有，织梦cms（dedecms），phpcms，帝国cms（EmpireCMS）！... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">原创模板</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">如何快速建立自己的个人博客网站</a></h3>
          <span class="blogpic imgscale"><i><a href="/">快速建站</a></i><a href="/" title=""><img src="/home_public/images/b03.jpg" alt=""></a></span>
          <p class="blogtext">各大博客门户网站，相继关闭，做一个独立的个人博客网站，那是将来的趋势。越来越多的个人站长倾向于独立建站，有个属于自己的博客网站，那如何快速建立自己的个人博客网站呢，接下来，我就简单给大家介绍一下：以阿里云为例... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">快速建站</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
        <li>
          <h3 class="blogtitle"><a href="/" target="_blank">【个人博客网站制作】自己不会个人博客网站制作，你会选择用什么博客程序源码？</a></h3>
          <span class="blogpic imgscale"><i><a href="/">原创模板</a></i><a href="/" title=""><img src="/home_public/images/b05.jpg" alt=""></a></span>
          <p class="blogtext">这些开源的博客程序源码，都是经过很多次版本测试的，都有固定的使用人群。我所知道的主流的博客程序有，Z-blog，Emlog，WordPress，Typecho等，免费的cms系统有，织梦cms（dedecms），phpcms，帝国cms（EmpireCMS）！... </p>
          <p class="bloginfo"><i class="avatar"><img src="/home_public/images/avatar.jpg"></i><span>杨青青</span><span>2018-10-28</span><span>【<a href="/">原创模板</a>】</span></p>
          <a href="/" class="viewmore">阅读更多</a> </li>
      </ul>
    </div>
    <!--bloglist end--> 
  </div>
  <div class="rbox">
    <div class="card">
      <h2>联系我们</h2>
    <div class="card"> 
      <h2>联系我们</h2>
      <!-- <h3 style="position:relative;top:-10px;left:100px;z-index:2;"><a href="" style="color:white;">------&nbsp;&nbsp;&nbsp;关于我们</a></h3> -->
      <p>团队：兄弟出征</p>
      <p>职业：编程小白</p>
      <p>现居：广州</p>
      <p>Email：dancesmiling@qq.com</p>
      <ul class="linkmore">
        <li><a href="http://www.yangqq.com" target="_blank" class="iconfont icon-zhuye" title="网站地址"></a></li>
        <li><a href="http://mail.qq.com/cgi-bin/qm_share" target="_blank" class="iconfont icon-youxiang" title="我的邮箱"></a></li>
        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=978952042&site=qq&menu=yes" target="_blank" class="iconfont icon---" title="QQ联系我"></a></li>
        <li id="weixin"><a href="#" target="_blank" class="iconfont icon-weixin" title="关注我的微信"></a><i><img src="/home_public/images/wx.png"></i></li>
      </ul>
    </div>
    <div class="whitebg notice">
      <h2 class="htitle">网站公告</h2>
      <ul>
        <li><a href="/">十条设计原则教你学会如何设计网页布局!</a></li>
        <li><a href="/">用js+css3来写一个手机栏目导航</a></li>
        <li><a href="/">6条网页设计配色原则,让你秒变配色高手</a></li>
        <li><a href="/">三步实现滚动条触动css动画效果</a></li>
      </ul>
    </div>
    <div class="whitebg paihang">
      <h2 class="htitle">点击排行</h2>
      <section class="topnews imgscale"><a href="/"><img src="/home_public/images/h1.jpg"><span>6条网页设计配色原则,让你秒变配色高手</span></a></section>
      <ul>
        <li><i></i><a href="/">十条设计原则教你学会如何设计网页布局!</a></li>
        <li><i></i><a href="/">用js+css3来写一个手机栏目导航</a></li>
        <li><i></i><a href="/">6条网页设计配色原则,让你秒变配色高手</a></li>
        <li><i></i><a href="/">三步实现滚动条触动css动画效果</a></li>
        <li><i></i><a href="/">个人博客，属于我们的小世界！</a></li>
        <li><i></i><a href="/">无兄弟，不编程！</a></li>
        <li><i></i><a href="/">个人网站做好了，百度不收录怎么办？来，看看他们怎么做的。</a></li>
        <li><i></i><a href="/">做个人博客如何用帝国cms美化留言增加头像选择</a></li>
      </ul>
    </div>
    <div class="whitebg tuijian">
      <h2 class="htitle">站长推荐</h2>
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
        <li><b>网站程序</b>：帝国CMS7.5</li>
        <li><b>主题模板</b>：<a href="http://www.yangqq.com" target="_blank">《今夕何夕》</a></li>
        <li><b>文章统计</b>：299条</li>
        <li><b>文章评论</b>：490条</li>
        <li><b>统计数据</b>：<a href="/">百度统计</a></li>
        <li><b>微信公众号</b>：扫描二维码，关注我们</li>
        <img src="/home_public/images/wxgzh.jpg" class="tongji_gzh">
      </ul>
    </div>
    <div class="links whitebg">
      <h2 class="htitle"><span class="sqlink"><a href="/">申请链接</a></span>友情链接</h2>
      <ul>
        <li><a href="http://www.yangqq.com" target="_blank">杨青青个人博客</a></li>
      </ul>
    </div>
  </div>
</article>

@endsection