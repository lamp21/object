@extends('admin.layout.index')


@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
	    <h2>文章审核列表</h2>
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
		    <th class="text-center">作者</th>
		    <th class="text-center">发表时间</th>
		    <th class="text-center">分类</th>
		    <th class="text-center">正文</th>
		    <th class="text-center">审核状态</th>
		    <th class="text-center">前台显示</th>
		    <th class="text-center">操作</th>
		</tr>
    </thead>
    <tbody> 
	@if($uid_res == [])
	<tr>
		{{'暂无数据'}}
	</tr>
	@else
	@foreach($uid_res as $k=>$v)
    <tr style="background:none;">
        <td style="text-align:center;vertical-align:middle;">{{$v->id}}</td>
        <td style="text-align:center;vertical-align:middle;">
        	<abbr title="{{$v->art_title}}">
        	<p style="text-overflow:ellipsis;white-space:nowrap;overflow:hidden; width:100px;height: 80px;"> 
				{{$v->art_title}}
        	</p>
        	</abbr>
        </td>
        <td style="text-align:center;vertical-align:middle;">{{$v->uname}}</td>
        <td style="text-align:center;vertical-align:middle;">{{$v->art_time}}</td>
        <td style="text-align:center;vertical-align:middle;">{{$v->cname}}</td>
        <td style="text-align:center;vertical-align:middle;">
        	<a href="/admin/article/{{$v->id}}" target="_blank">请点击查看详情</a>
    	</td>
			@if($v->art_status == 1)
			<td style="text-align:center;vertical-align:middle;">
				<a href="/admin/article/{{$v->id}}/edit">
					<b style="color: red;">待审核</b>
				</a>
			</td>
			@elseif($v->art_status == 2)
			<td style="text-align:center;vertical-align:middle;">
				<a href="/admin/article/{{$v->id}}/doedit">
					<b style="color: green;">已通过</b>
				</a>
			</td>
			@endif
			</td>
			@if($v->display == 0)
			<td style="text-align:center;vertical-align:middle;">
				<a href="/admin/article/{{$v->id}}/display">
					<b style="color: red;">收起</b>
				</a>
			</td>
			@elseif($v->display == 1)
			<td style="text-align:center;vertical-align:middle;">
				<a href="/admin/article/{{$v->id}}/dodisplay">
					<b style="color: green;">展示</b>
				</a>
			</td>
			@endif
        <td style="text-align:center;vertical-align:middle;">
        	<form action="/admin/article/{{$v->id}}" method="post" style="display: inline-block;">
				{{ csrf_field() }}
        		{{ method_field('DELETE')}}
        		<input type="submit" onclick="return confirm('确定要删除吗?');" value="删除" class="btn btn-danger">
        	</form>
        </td>
    </tr>
@endforeach
@endif
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