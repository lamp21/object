@extends('home.layout.index')

@section('content')
<article>
	<form action="/home/article/{{$update_id->id}}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="whitebg about">
    <div>
      <h1 class="text-center" style="text-align:center;color:black;">修改文章</h1>
    </div>
      @foreach($users_res as $k=>$v)
      <div class="ab_box"> <i class="avatar_pic"><img src="{{$v->uname_img}}"></i>
      <h3>{{$v->nick_name}}</h3>
      <p>{{$v->personal_label}}</p>
      </div>
      @endforeach
      @foreach($default as $k=>$v)
	  <div class="form-group">
	    <label for="exampleInputEmail1">标题</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="标题" name="art_title" value="{{$v->art_title}}">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">文章类型</label>
	    <select class="form-control" name="cate_uid" id="">
        <option value="" selected disabled style="display: none;">--请选择--</option>
          @foreach($cate_uid as $k=>$v)
              <option value="{{ $v->id }}" @if($id == $v->id) selected @endif>{{ $v->cname }}</option>
          @endforeach
        </select>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputFile">内容</label>
	  	<!-- 加载编辑器的容器 -->
	    <script id="container" name="art_content" type="text/plain">
	        
	    </script>
	    <!-- 配置文件 -->
	    <script type="text/javascript" src="/home_public/text/ueditor.config.js"></script>
	    <!-- 编辑器源码文件 -->
	    <script type="text/javascript" src="/home_public/text/ueditor.all.js"></script>
	    <!-- 实例化编辑器 -->
	    <script type="text/javascript">
	        var ue = UE.getEditor('container');
	    </script> 
	  </div>
      @endforeach
	  <button type="submit" class="btn btn-success">确认修改</button>
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
</article>
@endsection