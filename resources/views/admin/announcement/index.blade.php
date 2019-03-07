@extends('admin.layout.index')

@section('content')
	<div class="panel panel-default">
	    <div class="panel-heading">
	         <h2>公告列表</h2>
	    </div>
	    <div class="panel-body">
			<div class="table-responsive">
		  	<div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
		  	<form action="/admin/announcement" method="get">
			    <div class="row">
			      <div class="col-sm-6">
			        <div class="dataTables_length" id="dataTables-example_length">
			          <label>显示
			            <select name="count" aria-controls="dataTables-example" class="form-control input-sm">
			              <option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
			              <option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
			              <option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif>15</option>
			              <option value="20" @if(isset($request['count']) && $request['count'] == 20) selected @endif>20</option></select>&nbsp;条</label>
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
		        <tr role="row">
		          <th class="sorting_asc text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 145px;">ID</th>
		          <th class="sorting text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 226px;">公告标题</th>
		          <th class="sorting text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">公告内容</th>
		          <th class="sorting text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">发布时间</th>
		          <th class="sorting text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 86px;">操作</th></tr>
		      </thead>
		      <tbody>
		      	@foreach($data as $k=>$v)
		        <tr class="gradeA odd">
		          <td class="sorting_1">{{ $v->id }}</td>
		          <td class=" ">{{ $v->announcement_title }}</td>
		          <td class=" ">
					<abbr title="{{ $v->announcement_content }}">	
						<p style="width: 100px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap;">
		          		{{ $v->announcement_content }}
		          		</p>
		          	</abbr>
		          </td>
		          <td class="center ">{{ $v->created_at }}</td>
		          <td class="center ">
		          	<a href="/admin/announcement/{{ $v->id}}/edit" class="btn btn-warning">修改</a>
		          	<form action="/admin/announcement/{{ $v->id }}" method="post" style="display: inline-block;">
		          		{{ csrf_field()}}
		          		{{ method_field('DELETE')}}
		          		<input type="submit" value="删除" name="" class="btn btn-danger">
		          	</form>
		          	</td>
		        </tr>
				@endforeach
		      </tbody>
		    </table>
		    <!-- <div class="table-responsive"> -->
			  <div class="row">
			    <div class="col-sm-12">
			    	<div style="float:right;">
			    		{{ $data->appends($request)->links() }}
			    	</div>
			     </div>
			    <div class="col-sm-6">
			      <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
			      </div>
			    </div>
			  </div>
			<!-- </div> -->
		</div>
	   </div>
	</div>
@endsection