@extends('admin.layout.index')


@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	    <h2>推荐文章列表</h2>
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
		    <th class="text-center">文章标题</th>
		    <th class="text-center">摘自来源</th>
		    <th class="text-center">发表时间</th>
		    <th class="text-center">分类</th>
		    <th class="text-center">正文</th>
		    <th class="text-center">前台显示</th>
		    <th class="text-center">点赞数</th>
		    <th class="text-center">评论条数</th>
		    <th class="text-center">操作</th>
		</tr>
    </thead>
    <tbody>      
    <tr style="background:none;">
        <td class="text-center">测试</td>
        <td class="text-center">测试</td>
        <td class="text-center">测试</td>
        <td class="text-center">测试</td>
        <td class="text-center">测试</td>
        <td class="text-center">
        	<abbr title="测试">
        		测试
        	</abbr>
    	</td>
        <td class="text-center">测试</td>
        <td class="text-center">
        	测试
        </td>
        <td class="text-center">测试</td>
        <td class="text-center">
        	<a href="/" class="btn btn-success">修改</a>
        	<form action="/" method="post" style="display: inline-block;">

        		<input type="submit" value="删除" name="" class="btn btn-danger">
        	</form>
        </td>
    </tr>

	</tbody>
    </table>
    <div class="table-responsive">
	  <div class="row">
	    <div class="col-sm-12">
	    	<div style="float:right;">
	    		
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