@extends('home.layout.index')

@section('content')
<div class="content_box whitebg" style="width: 100%;">
	<div class="content_box whitebg">
	      <h2 class="htitle">
	  		<span class="con_nav">您现在的位置是：
			    <a href="/">文章首页</a>&gt;
			    <a href="/">文章详情</a></span>文章详情</h2>
			    @foreach($about_data as $key=>$val)
				<h1 class="con_tilte text-center">{{ $val->art_title }}</h1>
				<p class="bloginfo">
				<span>发布时间</span>
				<span>{{ $val->art_time }}</span>
			</p>
			<p style="text-indent:2em;font-size: 15px;"><pre style="white-space: pre-wrap;
                word-wrap: break-word;">{!! $val->art_content !!}</pre></p>
	  		@endforeach
                                    {{ $about_data->links() }}

    </div>
</div>
@endsection