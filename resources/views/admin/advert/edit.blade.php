@extends('admin.layout.index')

@section('content')
		<!-- 显示错误信息 -->
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			    @foreach ($errors->all() as $error)
			        <li>{{ $error }}</li>
			    @endforeach
			</ul>
		</div>
		@endif		
		<p></p>
		<div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                                    
        <div class="card-title">
            <h2><div class="title">广告修改</div></h2>
        </div>
    </div>

	<form class="form-horizontal" action="/admin/advert/{{ $advert->id}}" method="post" enctype="multipart/form-data">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
	    <div class="form-group">
	        <label class="col-sm-2 control-label">图片</label>
	        <div class="col-sm-10" style="width:600px;">
	            <input type="file" placeholder="广告图片" name="pic" value="{{ $advert['pic'] }}">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">URL</label>
	        <div class="col-sm-10" style="width:600px;">
	            <input type="text" class="form-control" placeholder="广告网址" name="url" value="{{ $advert['url'] }}">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">内容</label>
	        <div class="col-sm-10" style="width:600px;">
	            <input type="text" class="form-control" placeholder="广告内容" name="content" value="{{ $advert['content'] }}">
	        </div>
	    </div>
	    
	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button type="submit" class="btn btn-default btn btn-info">修改</button>
	            <button type="reset" class="btn btn-default">重置</button>
	        </div>
	    </div>
	</form>
	        </div>
	    </div>
	</div>

@endsection