@extends('admin.layout.index')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	    <h2>用户列表</h2>
	</div>
	<div class="panel-body">
    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
    <form action="/admin/home_users" method="get">
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
		    <th>昵称</th>
		    <th>性别</th>
		    <th>手机号</th>
		    <th>邮箱</th>
		    <th>QQ</th>
		    <th>真实姓名</th>
		    <th>工作</th>
		    <th>地址</th>
		    <th>创建时间</th>
		</tr>
    </thead>
    <tbody>
    @foreach($data as $k=>$v)       
    <tr style="background:none;">
        <td>{{ $v->id }}</td>
        <td>{{ $v->usersinfo->nick_name }}</td>
        <td>
        	@switch($v->usersinfo->sex)
				@case(0)
					男
				@break
				@case(1)
					女
				@break
				@case(2)
					保密
				@break
		    @endswitch
        </td>
        <td>{{ $v->phone }}</td>
        <td>{{ $v->usersinfo->email }}</td>
        <td>{{ $v->usersinfo->QQ }}</td>
        <td>{{ $v->usersinfo->real_name }}</td>
        <td>{{ $v->usersinfo->work }}</td>
        <td>{{ $v->usersinfo->location }}</td>
        <td>{{ $v->created_at }}</td>
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
