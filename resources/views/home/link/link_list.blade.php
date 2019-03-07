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
<<<<<<< HEAD
     <!--  <li><a href="http://www.liangzl.com" target="_blank" title="id=12 梁钟霖个人博客">梁钟霖个人博客</a></li>
     <li><a href="http://www.dxblog.cn" target="_blank" title="id=16 东轩博客">东轩博客</a></li>
     <li><a href="http://www.xiaozhanfei.com" target="_blank" title="id=18 肖战飞博客">肖战飞博客</a></li>
     <li><a href="http://www.biymx.com" target="_blank" title="id=24 碧羽墨轩">碧羽墨轩</a></li>
     <li><a href="http://www.wengfw.com" target="_blank" title="id=40 老翁博客">老翁博客</a></li>
     <li><a href="http://baitaoblog.com" target="_blank" title="id=44 白涛个人博客">白涛个人博客</a></li>
     <li><a href="http://www.duoguyu.com" target="_blank" title="id=55 多骨鱼">多骨鱼</a></li>
     <li><a href="http://masuit.com" target="_blank" title="id=57 懒得勤快">懒得勤快</a></li>
     <li><a href="http://t.iaozi.com" target="_blank" title="id=58 丁合超个人博客">丁合超个人博客</a></li>
     <li><a href="http://www.lvyot.com" target="_blank" title="id=62 绿永亭">绿永亭</a></li>
     <li><a href="http://www.lovey9.com" target="_blank" title="id=64 葛优个人博客">葛优个人博客</a></li>
     <li><a href="https://www.iyouhun.com" target="_blank" title="id=65 游魂博客">游魂博客</a></li>
     <li><a href="http://www.rainsmoon.com" target="_blank" title="id=66 霖之月">霖之月</a></li>
     <li><a href="http://www.lishuai7.cn" target="_blank" title="id=72 李帅个人博客">李帅个人博客</a></li>
     <li><a href="https://www.yidianphp.com" target="_blank" title="id=73 一点php">一点php</a></li>
     <li><a href="http://www.zfowed.com/" target="_blank" title="id=75 何泽弘的个人博客">何泽弘的个人博客</a></li>
     <li><a href="https://liangxingjian.com/" target="_blank" title="id=76 梁兴健个人博客">梁兴健个人博客</a></li>
     <li><a href="https://www.yanshisan.cn" target="_blank" title="id=79 燕十三·一个人的江湖">燕十三·一个人的江湖</a></li>
     <li><a href="http://www.supert.net.cn" target="_blank" title="id=80 七年。">七年。</a></li>
     <li><a href="http://www.sz-yun.com" target="_blank" title="id=83 梁俊威个人博客">梁俊威个人博客</a></li>
     <li><a href="http://www.liveintime.cn" target="_blank" title="id=85 时光里">时光里</a></li>
     <li><a href="https://h7ml.coding.me" target="_blank" title="id=90 h7ml">h7ml</a></li>
     <li><a href="https://blog.techauch.com/" target="_blank" title="id=91 code life博客">code life博客</a></li>
     <li><a href="http://www.tk3u.com/" target="_blank" title="id=92 北京SEO">北京SEO</a></li>
     <li><a href="http://jianhuax.com" target="_blank" title="id=95 建华兄博客">建华兄博客</a></li>
     <li><a href="http://www.luoluolzb.cn" target="_blank" title="id=97 洛洛の空间">洛洛の空间</a></li>
     <li><a href="http://mrxiao.cc" target="_blank" title="id=101 官仁博客">官仁博客</a></li>
     <li><a href="http://www.wzzwl.com/" target="_blank" title="id=112 奋斗电商">奋斗电商</a></li>
     <li><a href="https://www.yudouyudou.com/" target="_blank" title="id=113 余斗个人博客">余斗个人博客</a></li>
     <li><a href="http://shaohang.xin" target="_blank" title="id=114 满脑的思绪-少航博客">满脑的思绪-少航博客</a></li>
     <li><a href="http://www.baiyangseo.com" target="_blank" title="id=115 白杨SEO教程博客">白杨SEO教程博客</a></li>
     <li><a href="http://www.sofiazsx.cn" target="_blank" title="id=117 柱子哥个人博客">柱子哥个人博客</a></li>
     <li><a href="http://www.luotf.com" target="_blank" title="id=118 罗廷方个人网站">罗廷方个人网站</a></li>
     <li><a href="http://www.zxlmx.com" target="_blank" title="id=120 歪脖博客">歪脖博客</a></li>
     <li><a href="http://www.mywhblog.cn" target="_blank" title="id=121 梦影雾花个人博客">梦影雾花个人博客</a></li>
     <li><a href="http://aliwen.baomanxi.top/" target="_blank" title="id=122 Aliwen Blog">Aliwen Blog</a></li>
     <li><a href="http://www.luotf.com" target="_blank" title="id=123 罗廷方">罗廷方</a></li>
     <li><a href="http://www.zhangqinblog.com" target="_blank" title="id=124 张先森个人博客">张先森个人博客</a></li>
     <li><a href="http://www.longqcloud.cn/LongBlog" target="_blank" title="id=125 LongBro博客">LongBro博客</a></li>
     <li><a href="http://www.cwtseo.com" target="_blank" title="id=126 网站排名优化">网站排名优化</a></li>
     <li><a href="http://www.yuqh.vip" target="_blank" title="id=128 3306博客">3306博客</a></li>
     <li><a href="http://www.1zyan.cn" target="_blank" title="id=130 易支烟博客">易支烟博客</a></li>
     <li><a href="https://baijunyao.com/" target="_blank" title="id=131 白俊遥博客">白俊遥博客</a></li>
     <li><a href="http://www.lidongchen.cn" target="_blank" title="id=133 李东宸博客">李东宸博客</a></li>
     <li><a href="https://suaku.cn/" target="_blank" title="id=134 酷玩博客">酷玩博客</a></li>
     <li><a href="http://www.wentao.group" target="_blank" title="id=135 竹泊博客">竹泊博客</a></li>
     <li><a href="http://www.91helpme.com" target="_blank" title="id=136 罗华个人技术博客">罗华个人技术博客</a></li>
     <li><a href="http://www.wentao.group" target="_blank" title="id=137 竹泊博客">竹泊博客</a></li>
     <li><a href="http://pdship.cn/" target="_blank" title="id=138 OPGW光缆">OPGW光缆</a></li>
     <li><a href="http://zcs8.cn" target="_blank" title="id=145 钟长森博客">钟长森博客</a></li>
     <li><a href="http://www.dongyao.ren" target="_blank" title="id=146 clark-club">clark-club</a></li>
     <li><a href="http://www.chenjie.org.cn" target="_blank" title="id=147 陈杰博客">陈杰博客</a></li>
     <li><a href="http://www.boshanseo.com/" target="_blank" title="id=150 左岸个人博客">左岸个人博客</a></li>
     <li><a href="http://www.xcbkseo.com/" target="_blank" title="id=151 小成博客">小成博客</a></li>
     <li><a href="http://www.nnmutong.com" target="_blank" title="id=152 牧童个人博客">牧童个人博客</a></li>
     <li><a href="http://www.tbztc.top/" target="_blank" title="id=153 淘宝直通车">淘宝直通车</a></li>
     <li><a href="http://www.ljunhome.com" target="_blank" title="id=154 刘俊博客">刘俊博客</a></li>
     <li><a href="http://www.doubiseo.com" target="_blank" title="id=155 深圳seo">深圳seo</a></li>
     <li><a href="https://www.xcbkb.com" target="_blank" title="id=156 小超博客">小超博客</a></li>
     <li><a href="http://nanxudong.com" target="_blank" title="id=159 南旭东博客">南旭东博客</a></li>
     <li><a href="http://www.huangwenyang.cn/" target="_blank" title="id=161 黄文杨的个人网站">黄文杨的个人网站</a></li>
     <li><a href="http://www.yoyibk.top" target="_blank" title="id=163 攸一教程网">攸一教程网</a></li>
     <li><a href="http://www.wangps.com" target="_blank" title="id=164 王鹏生博客">王鹏生博客</a></li>
     <li><a href="http://www.jianggangsheng.com" target="_blank" title="id=166 姜港生博客">姜港生博客</a></li>
     <li><a href="http://gui.lu" target="_blank" title="id=167 归路">归路</a></li>
     <li><a href="https://www.91boke.cn" target="_blank" title="id=168 91博客">91博客</a></li>
     <li><a href="http://www.jbblog.cn/" target="_blank" title="id=169 聚宝博客">聚宝博客</a></li>
     <li><a href="https://52zoe.com" target="_blank" title="id=170 秋枫阁">秋枫阁</a></li>
     <li><a href="http://wangzepeng.cn" target="_blank" title="id=171 优秀个人博客">优秀个人博客</a></li>
     <li><a href="http://loveteemo.com" target="_blank" title="id=172 青春博客">青春博客</a></li>
     <li><a href="http://www.sjsbk.com" target="_blank" title="id=173 黑色四叶草博客">黑色四叶草博客</a></li>
     <li><a href="http://www.zyx.company" target="_blank" title="id=174 zyx个人博客">zyx个人博客</a></li>
     <li><a href="https://blog.fastrun.cn" target="_blank" title="id=175 Mr.Zhang的小站">Mr.Zhang的小站</a></li>
     <li><a href="https://www.usuuu.com" target="_blank" title="id=176 悠悠吧">悠悠吧</a></li>
     <li><a href="https://5irx.cn" target="_blank" title="id=177 欣宝博客">欣宝博客</a></li>
     <li><a href="http://www.songzesheng.com" target="_blank" title="id=178 方塘一鉴">方塘一鉴</a></li>
     <li><a href="http://www.liuyuyao.com" target="_blank" title="id=179 刘玉尧博客">刘玉尧博客</a></li>
     <li><a href="http://lanmeng.wang" target="_blank" title="id=180 蓝梦网">蓝梦网</a></li>
     <li><a href="https://www.ipz.me" target="_blank" title="id=181 影乐">影乐</a></li>
     <li><a href="http://www.freeelk.com" target="_blank" title="id=183 麋鹿之森">麋鹿之森</a></li>
     <li><a href="http://www.itlaiba.com" target="_blank" title="id=184 it资源共享">it资源共享</a></li>
     <li><a href="http://daiwei.org" target="_blank" title="id=185 未曾遗忘的青春">未曾遗忘的青春</a></li>
     <li><a href="http://www.vipbic.com" target="_blank" title="id=186 vipbic">vipbic</a></li>
     <li><a href="http://www.chinazhangbei.com" target="_blank" title="id=187 张贝博客">张贝博客</a></li>
     <li><a href="https://nemo.fun" target="_blank" title="id=189 Nemo社区">Nemo社区</a></li>
     <li><a href="https://www.yangruolan.com" target="_blank" title="id=190 若岚博客">若岚博客</a></li>
     <li><a href="https://www.plaza4me.com/" target="_blank" title="id=191 我的广场">我的广场</a></li>
     <li><a href="https://www.qdskill.com" target="_blank" title="id=192 Web前端技能">Web前端技能</a></li>
     <li><a href="https://www.jensonhui.top" target="_blank" title="id=194 Jensonhui‘s blog">Jensonhui‘s blog</a></li>
     <li><a href="http://blog.zxq2.com" target="_blank" title="id=196 张新全博客">张新全博客</a></li>
     <li><a href="http://www.021wt.com" target="_blank" title="id=198 叨声依旧">叨声依旧</a></li>
     <li><a href="http://jymc.link" target="_blank" title="id=199 流夏博客">流夏博客</a></li>
     <li><a href="https://www.chxin.net" target="_blank" title="id=200 陈鑫博客">陈鑫博客</a></li>
     <li><a href="http://www.jhaaa.cn" target="_blank" title="id=201 免费主机申请">免费主机申请</a></li>
     <li><a href="http://www.zhangyue93.com" target="_blank" title="id=202 近悦远来个人博客">近悦远来个人博客</a></li>
     <li><a href="https://www.duwenfei.com" target="_blank" title="id=203 堵文斐的个人网站">堵文斐的个人网站</a></li>
     <li><a href="http://www.wj0511.com" target="_blank" title="id=205 王健的个人博客">王健的个人博客</a></li>
     <li><a href="http://time.life" target="_blank" title="id=206 time.life">time.life</a></li>
     <li><a href="http://www.liubeia.com" target="_blank" title="id=207 刘贝个人博客">刘贝个人博客</a></li>
     <li><a href="https://www.whmblog.cn/" target="_blank" title="id=208 铭之博客">铭之博客</a></li>
     <li><a href="http://www.wangyunkai.top" target="_blank" title="id=209 Index's Blog">Index's Blog</a></li>
     <li><a href="http://b.anacn.cn" target="_blank" title="id=210 安语博客">安语博客</a></li>
     <li><a href="http://www.zhaijh.top/" target="_blank" title="id=211 心灵鸡汤">心灵鸡汤</a></li>
     <li><a href="https://www.51baidu.com.cn" target="_blank" title="id=212 白码驿站">白码驿站</a></li>
     <li><a href="http://www.myong.top" target="_blank" title="id=213 My.Yong 博客">My.Yong 博客</a></li>
     <li><a href="https://www.51baidu.com.cn" target="_blank" title="id=215 白码驿站">白码驿站</a></li>
     <li><a href="http://renniaofei.com" target="_blank" title="id=216 任鸟飞">任鸟飞</a></li>
     <li><a href="http://www.itlaiba.com" target="_blank" title="id=217 itlaiba">itlaiba</a></li>
     <li><a href="http://www.jzdlink.com" target="_blank" title="id=218 呆呆萌萌情侣博客">呆呆萌萌情侣博客</a></li>
     <li><a href="http://www.zhangwenhu.com" target="_blank" title="id=219 张文虎博客">张文虎博客</a></li> -->
=======
>>>>>>> f0b112a3f222ed83c52e27473393736a9b10f133
     @endforeach
    </ul>
  </div>
</article>
 @endsection