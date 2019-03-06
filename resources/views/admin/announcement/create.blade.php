@extends('admin.layout.index')

@section('content')
<div class="col-xs-12">
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
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title"><h2>公告添加</h2></div>
                </div>
            </div><br>
            <div class="panel-body">
                <form class="form-horizontal" action="/admin/announcement" method="post">
                	{{ csrf_field() }}
                    <div class="form-group">
                        <label for="announcement_title" class="col-sm-2 control-label">公告标题</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="announcement_title" name="announcement_title" value="{{ old('announcement_title')}}">
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label for="announcement_content" class="col-sm-2 control-label">公告内容</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="10" name="announcement_content">{{ old('announcement_content') }}</textarea>
                        </div>
                    </div>
    				<div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="添加" class="btn btn-info">
                            <input type="reset" value="重置" class="btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection