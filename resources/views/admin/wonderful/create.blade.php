@extends('admin.layout.index')

@section('content')
	
<div class="col-xs-12">
    <div class="panel panel-default">
		<div class="panel-heading">       
   		 	<div class="card-title">
        		<h2><div class="title">推荐文章管理</div></h2>
   			</div>
    	</div>
		<form class="form-horizontal" action="/admin/wonderful" method="post">
		  	{{ csrf_field() }}
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">标题</label>
			    <div class="col-sm-10" style="width:600px;">
			        <input type="text" class="form-control" placeholder="标题" name="title" value="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">文章封面图</label>
			    <div class="col-sm-10" style="width:600px;">
			      



			    </div>
			</div>
		   	<div class="form-group">
			    <label class="col-sm-2 control-label">摘自来源</label>
			    <div class="col-sm-10" style="width:600px;">
			        <input type="text" class="form-control" placeholder="作者来源" name="wd_form" value="">
			    </div>
		 	</div>
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">发表时间</label>
			    <div class="col-sm-10" style="width:600px;">
			        <input type="text" class="form-control" placeholder="发表时间" name="wd_time" >
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">分类</label>
			    <div class="col-sm-10" style="width:600px;">
			        <select class="form-control" name="cate_uid">
			        	<option value="0">--请选择--</option>
			        	@foreach($cate_uid as $k=>$v)
		                <option value="{{ $v->id }}" @if($id == $v->id) selected @endif>{{ $v->cname }}</option>
		                @endforeach
					</select>
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">正文内容</label>
			    <div class="col-sm-10" style="width:600px;">
			        <!-- 加载编辑器的容器 -->
				    <script id="container" name="content" type="text/plain" value="">
				        {{ old('description') }}
				    </script>
				    <!-- 配置文件 -->
				    <script type="text/javascript" src="/admin_public/assets/text/ueditor.config.js"></script>
				    <!-- 编辑器源码文件 -->
				    <script type="text/javascript" src="/admin_public/assets/text/ueditor.all.js"></script>
				    <!-- 实例化编辑器 -->
				    <script type="text/javascript">
				        var ue = UE.getEditor('container');
				    </script>
			    </div>
		 	</div>
		  	<div class="form-group"> 
			    <label class="col-sm-2 control-label">是否展示</label>
			    <div class="col-sm-10" style="width:600px;">
			        <select class="form-control" name="status" value="">
					  <option value="0">--请选择--</option>
					  <option value="1">收起</option>
					  <option value="2">展示</option>
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
<script>  

</script>
@endsection