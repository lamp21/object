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
            <h2><div class="title">分类管理</div></h2>
        </div>
    </div>

	<form class="form-horizontal" action="/admin/cates" method="post">
		{{ csrf_field() }}
	    <div class="form-group">
	        <label class="col-sm-2 control-label">分类</label>
	        <div class="col-sm-10" style="width:600px;">
	            <input type="text" class="form-control" placeholder="分类名称" name="cname">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">所属分类</label>
	        <div class="col-sm-10" style="width:600px;">
	            <select name="pid" class="form-control" class="col-sm-10" style="height:34px;border-radius:;">
	                <option value="0">--请选择--</option>
	                @foreach($cates_data as $k=>$v)
	                <option value="{{ $v->id }}" @if($id == $v->id) selected @endif>{{ $v->cname }}</option>
	                @endforeach
	            </select>
	        </div>
	    </div>    
	    
	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button type="submit" class="btn btn-default btn btn-info">提交</button>
	            <button type="reset" class="btn btn-default">重置</button>
	        </div>
	    </div>
	</form>
	        </div>
	    </div>
	</div>

@endsection