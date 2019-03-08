@extends('home.layout.index')

@section('content')
<div class="content_box whitebg" style="width: 100%;">
	<div class="content_box whitebg">
	      <h2 class="htitle">
	  		<span class="con_nav">您现在的位置是：
			    <a href="/">网站首页</a>&gt;
			    <a href="/">网站公告</a></span>网站公告</h2>
			    @foreach($data_announcement as $key=>$val)
				<h1 class="con_tilte text-center">{{ $val->announcement_title }}</h1>
				<p class="bloginfo">
				<span>发布时间</span>
				<span>{{ $val->created_at }}</span>
			</p>
			<p style="text-indent:2em;font-size: 15px;"><pre style="white-space: pre-wrap;
                word-wrap: break-word;">{!! $val->announcement_content !!}</pre></p>
	  		@endforeach
    </div>
</div>
@endsection