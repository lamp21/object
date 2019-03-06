@extends('admin.layout.index')

@section('content')
	
<div class="col-xs-12">
    <div class="panel panel-default">
		<div class="panel-heading">       
   		 	<div class="card-title">
        		<h2><div class="title">推荐文章管理</div></h2>
   			</div>
    	</div>
		<form class="form-horizontal" action="/" method="post">
		  <div class="form-group">
		    <label class="col-sm-2 control-label">标题</label>
		    <div class="col-sm-10" style="width:600px;">
		        <input type="text" class="form-control" placeholder="标题" name="url">
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="col-sm-2 control-label">摘自来源</label>
		    <div class="col-sm-10" style="width:600px;">
		        <input type="text" class="form-control" placeholder="作者来源" name="url">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">发表时间</label>
		    <div class="col-sm-10" style="width:600px;">
		        <input type="text" class="form-control" placeholder="发表时间" name="url">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">分类</label>
		    <div class="col-sm-10" style="width:600px;">
		        <select class="form-control">
				  <option>技术类</option>
				  <option>生活类</option>
				</select>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">正文内容</label>
		    <div class="col-sm-10" style="width:600px;">
		        <!-- 加载编辑器的容器 -->
			    <script id="container" name="content" type="text/plain">
			        
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
		        <select class="form-control">
				  <option>收起</option>
				  <option>展示</option>
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


@endsection