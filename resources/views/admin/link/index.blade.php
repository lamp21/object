@extends('admin.layout.index')


@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	    <h2>申请列表</h2>
	</div>
	<div class="panel-body">
    <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
    <form action="/admin/link" method="get">
	    <div class="row">
	      <div class="col-sm-6">
	        <div class="dataTables_length" id="dataTables-example_length">
	          <label>显示
	            <select name="count" aria-controls="dataTables-example" class="form-control input-sm">
	              <option value="5" @if(isset($request['count']) && $request['count'] == 10) selected @endif>5</option>
	              <option value="15" @if(isset($request['count']) && $request['count'] == 15) selected @endif>15</option>
	              <option value="25" @if(isset($request['count']) && $request['count'] == 20) selected @endif>25</option>
	              <option value="35" @if(isset($request['count']) && $request['count'] == 50) selected @endif>35</option></select>&nbsp;条</label>
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
    <table class="table table-striped table-bordered table-hover dataTable no-footer " id="dataTables-example" aria-describedby="dataTables-example_info">
    <thead>
        <div class="table-responsive">
		  <tr role="row">
		    <th class="text-center">ID</th>
		    <th class="text-center">网站名称</th>
		    <th class="text-center">网址</th>
		    <th class="text-center">电子邮箱</th>
		   	<th class="text-center">网站介绍</th>
		    <th class="text-center">审核</th>
		</tr>
    </thead>
    <tbody> 
    @foreach($data as $key=>$v)    
    <tr style="background:none;">
        <td class="text-center">{{$v->id}}</td>
        <td class="text-center">{{$v->link_name}}</td>
        <td class="text-center">{{$v->link_adr}}</td>
        <td class="text-center">{{$v->link_email}}</td>
        <td class="text-center">
        	<abbr title="{{$v->link_des}}">
        		<p style="width: 100px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap; ">{{$v->link_des}}</p>
       		 </abbr>
        </td>
        <td class="text-center">
        	@if($v->link_agree == 0) 
        	<a href="/admin/link/{{$v->id}}/edit" class="btn btn-success ">通过</a>
        	<form action="/admin/link/{{$v->id}}" method="post" style="display: inline-block;">
        		{{ csrf_field() }}
        		{{ method_field('DELETE')}}
				<input type="submit" onclick="return confirm('确定要删除吗?');" value="删除" class="btn btn-danger">
        		
        	</form>

				<input type="submit" value="删除" class="btn btn-danger">			</form>
        	@endif
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