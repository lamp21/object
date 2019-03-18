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
<div class="col-xs-12">
    <div class="panel panel-default">
		<div class="panel-heading">       
   		 	<div class="card-title">
        		<h2><div class="title">添加轮播数据</div></h2>
   			</div>
    	</div>
		<form class="form-horizontal" action="/admin/wordphoto" method="post" id="ImgForm" enctype="multipart/form-data">
		  	{{ csrf_field() }}
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">标题</label>
			    <div class="col-sm-10" style="width:600px;">
			        <input type="text" class="form-control" placeholder="标题" name="pic_title" value="">
			    </div>
		  	</div>
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">轮播的图片</label>
			    <div class="col-sm-10" style="width:600px;">
			    <input type="file" onchange="uploadphoto()" id="pic" name="pic"/>
			    <img src="" alt="" id="show"  name="show" style="width: 200px;">
			    </div>
			</div>
		   	<div class="form-group">
			    <label class="col-sm-2 control-label">作者来源</label>
			    <div class="col-sm-10" style="width:600px;">
			        <input type="text" class="form-control" placeholder="作者来源" name="pic_form" value="">
			    </div>
		 	</div>
		  	<div class="form-group">
			    <label class="col-sm-2 control-label">正文内容</label>
			    <div class="col-sm-10" style="width:600px;">
			        <!-- 加载编辑器的容器 -->
				    <script id="container" name="pic_content" type="text/plain" value="">
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
			        <select class="form-control" name="pic_status">
						<option value="" selected disabled style="display: none;">--请选择--</option>
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
	function uploadphoto(){
    		var path = $('#pic').val();
    		//判断上传文件的后缀名是否符合
            var exc = path.substr(path.lastIndexOf('.') + 1);
            if (exc != 'jpg' && exc != 'gif' && exc != 'png' && exc != 'jpeg') {
                alert("请选择正确的图片格式");
                return false;
            }
            // console.log($('#ImgForm')[0])
            // debugger;
    		$.ajax({
				url: "/admin/wordphoto/upload",
				type: 'POST',
				data: new FormData($('#ImgForm')[0]), // 内置对象 创建表单 
				//data:form,
				processData:false, //不限定格式
				sync : false,
				contentType:false, //不进行特定格式编码
				dataType:"text",
				success : function(data){
				//alert(data);
				//成功 修改头像路径
					//修改图片
					$('#show').attr('src',data);
				}
			});
    	}
</script>
@endsection