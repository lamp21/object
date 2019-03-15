@extends('admin.layout.index')


@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	    <h2>用户列表</h2>
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
		    <th>ID</th>
		    <th>用户名</th>
		    <th>手机号</th>
		    
		    <th>创建时间</th>
		    <!-- <th>用户简介</th> -->
		    <th>操作</th>
		</tr>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)       
    <tr style="background:none;">
        <td>{{ $v->id }}</td>
        <td>{{ $v->uname }}</td>
        <td>{{ $v->phone }}</td>
        
        <td>{{ $v->created_at }}</td>
<!--    <td>
        	<abbr title="{{ $v->usersinfo['description'] }}">
	        	<p style="width: 100px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap; ">{{ $v->usersinfo['description'] }}</p>
	    	</abbr>
        </td> -->
        <td class="text-center">
        	<br>
        	<a href="/admin/users/role/{{ $v->id }}" class="btn btn-info">角色</a>
        	<a href="/admin/users/{{ $v->id }}/edit" class="btn btn-success">修改</a>
        	<form action="/admin/users/{{ $v->id }}" method="post" style="display: inline-block;">
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        		<input type="submit" onclick="return confirm('确定要删除吗?');" value="删除" name="" class="btn btn-danger">
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
	    		{{ $data->appends($request)->links() }}
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