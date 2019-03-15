@extends('admin.layout.index')


@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	    <h2>轮播图管理列表</h2>
	</div>
	<div class="panel-body">
    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
    <form action="/admin/users" method="get">
	    <div class="row">
	      <div class="col-sm-6">
	        <div class="dataTables_length" id="dataTables-example_length">
	          <label>显示
	            <select name="count" aria-controls="dataTables-example" class="form-control input-sm">
	              <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
	              <option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif>15</option>
	              <option value="20" @if(isset($request['count']) && $request['count'] == 20) selected @endif>20</option>
	              <option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option></select>&nbsp;条</label>
	        </div>
	      </div>
	      <div class="col-sm-6">
	        <div id="dataTables-example_filter" class="dataTables_filter">
	          <label style="float:right;">关键词:
	            <input type="text" name="search" class="form-control input-sm" aria-controls="dataTables-example" value="{{ $request['search'] or ''}}">
	            <input type="submit" value="搜索" class="btn btn-info"></label></div>
	      </div>
	    </div>
	</form>
    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
    <thead>
        <div class="table-responsive">
		  <tr role="row">
		    <th class="text-center">ID</th>
		    <th class="text-center">轮播图片</th>
		    <th class="text-center">标题</th>
		    <th class="text-center">来源</th>
		    <th class="text-center">发布时间</th>
		    <th class="text-center">正文</th>
		    <th class="text-center">前台展示</th>
		    <th class="text-center">操作</th>
		</tr>
    </thead>
    <tbody>  
        @foreach($wordphoto_info as $k=>$v)
        <tr style="background:none;">
        	<td style="text-align:center;vertical-align:middle;">{{$v->id}}</td>
	        <td style="text-align:center;vertical-align:middle;">
	        	<img src="{{$v->pic}}" alt="轮播图片" style="width: 100px;">	
	        </td>
	        <td style="text-align:center;vertical-align:middle;">{{$v->pic_title}}</td>
	        <td style="text-align:center;vertical-align:middle;">{{$v->pic_form}}</td>
	        <td style="text-align:center;vertical-align:middle;">{{$v->pic_time}}</td>
	        <td style="text-align:center;vertical-align:middle;">
	        	<abbr title="{!!$v->pic_content!!}">
		      			{!!$v->pic_content!!}
          		</abbr>
	        </td>
	        @if ($v->pic_status == 1) 
			<td style="text-align:center;vertical-align:middle;">
				<a href="/admin/wordphoto/{{$v->id}}/turn">
					<b style="color: red;">收起</b>
				</a>
			</td>
    		@elseif ($v->pic_status == 2)
        	<td style="text-align:center;vertical-align:middle;">
        		<a href="/admin/wordphoto/{{$v->id}}/doturn">
        			<b style="color: blue;">展示</b>
        		</a>
        	</td>
        	@endif
	        <td style="text-align:center;vertical-align:middle;">
	        	<a href="/admin/wordphoto/{{ $v->id }}/edit" class="btn btn-success">修改</a>
	        	<form action="/admin/wordphoto/{{$v->id}}" method="post" style="display: inline-block;">
	        		{{ csrf_field() }}
        			{{ method_field('DELETE')}}
	        		<input type="submit" onclick="return confirm('确定要删除吗?');" value="删除" class="btn btn-danger">
	        	</form>
	        </td>
    	</tr>
		@endforeach
	</tbody>
    </table>
    <div class="table-responsive">
	  <div class="row">
	    <div class="col-sm-12">
	    	<div style="float:right;">
	    		{{ $wordphoto_info->appends($request)->links() }}
	    	</div>
	     </div>
	    <div class="col-sm-6">
	      <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
	      </div>
	    </div>
	  </div>
	</div>
</div>
@endsection