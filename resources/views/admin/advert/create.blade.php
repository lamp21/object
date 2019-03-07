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
            <h2><div class="title">广告添加</div></h2>
        </div>
    </div>

	<form class="form-horizontal" action="/admin/advert" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
	    <div class="form-group">
	        <label class="col-sm-2 control-label">图片</label>
	        <div class="col-sm-10" style="width:600px;">
	            <input type="file" placeholder="广告图片" name="pic" id="file1" onchange="change('pic1','file1')">
	            <br>
				<img src="" id="pic1" alt="" style="width:100px;">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">URL</label>
	        <div class="col-sm-10" style="width:600px;">
	            <input type="text" class="form-control" placeholder="广告网址" name="url">
	        </div>
	    </div>

	    <div class="form-group">
            <label for="description" class="col-sm-2 control-label">广告内容</label>
            <div class="col-sm-10">
                <textarea class="form-control" placeholder="广告内容" name="content"> {{ old('content')}}</textarea>
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
	<script>
		    //使用IE条件注释来判断是否IE6，通过判断userAgent不一定准确
		    if (document.all) document.write('<!--[if lte IE 6]><script type="text/javascript">window.ie6= true<\/script><![endif]-->');
		    // var ie6 = /msie 6/i.test(navigator.userAgent);//不推荐，有些系统的ie6 userAgent会是IE7或者IE8
		    function change(picId,fileId) {
		        var pic = document.getElementById(picId);
		        var file = document.getElementById(fileId);
		        if(window.FileReader){//chrome,firefox7+,opera,IE10+
		           oFReader = new FileReader();
		           oFReader.readAsDataURL(file.files[0]);
		           oFReader.onload = function (oFREvent) {pic.src = oFREvent.target.result;};        
		        }
		        else if (document.all) {//IE9-//IE使用滤镜，实际测试IE6设置src为物理路径发布网站通过http协议访问时还是没有办法加载图片
		            file.select();
		            file.blur();//要添加这句，要不会报拒绝访问错误（IE9或者用ie9+默认ie8-都会报错，实际的IE8-不会报错）
		            var reallocalpath = document.selection.createRange().text//IE下获取实际的本地文件路径
		            //if (window.ie6) pic.src = reallocalpath; //IE6浏览器设置img的src为本地路径可以直接显示图片
		            //else { //非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现，IE10浏览器不支持滤镜，需要用FileReader来实现，所以注意判断FileReader先
		                pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
		                pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';//设置img的src为base64编码的透明图片，要不会显示红xx
		           // }
		        }
		        else if (file.files) {//firefox6-
		            if (file.files.item(0)) {
		                url = file.files.item(0).getAsDataURL();
		                pic.src = url;
		            }
		        }
		    }
		</script>
@endsection