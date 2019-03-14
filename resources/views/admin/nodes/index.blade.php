@extends('admin.layout.index')

@section('content')

<!-- <div id="tab" style="margin-left:15px;">
    <button class="btn btn-danger">角色列表</button>
    <button class="btn btn-info">权限节点列表</button>
</div>
&nbsp; -->
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
             <h2>角色列表</h2>
        </div>
        <div class="panel-body">
        	<form action="/admin/nodes" method="get">
            <div class="table-responsive">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                	<div class="row">
                		<div class="col-sm-6">
                			<div class="dataTables_length" id="dataTables-example_length">
                				<label>显示：
                					<select name="count" aria-controls="dataTables-example" class="form-control input-sm">
                					<option value="5" @if(isset($request['count']) && $request['count'] == 5) selected @endif>5</option>
                					<option value="10" @if(isset($request['count']) && $request['count'] == 10) selected @endif>10</option>
                					<option value="25" @if(isset($request['count']) && $request['count'] == 25) selected @endif>25</option>
                					<option value="50" @if(isset($request['count']) && $request['count'] == 50) selected @endif>50</option>
                					<option value="100" @if(isset($request['count']) && $request['count'] == 100) selected @endif>100</option>
                				</select> 条
                			</label>
                			</div>
                		</div>
                			<div class="col-sm-6">
                				<div id="dataTables-example_filter" class="dataTables_filter" style="float:right;">
                					<label text="align:righ" >关键字: 
                						<input type="text" class="form-control input-sm" name="search" aria-controls="dataTables-example" value="{{ $request['search'] or ''}}">
                					</label>
                						<input type="submit" value="搜索" class="btn btn-info">
                				</div>
                			</div>
                		</div>
                	</form>
                		<table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                		
                    	<thead>
                            <tr role="row">
                            	<th class="sorting_asc text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 50px;">ID</th>

                            	<th class="sorting text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;">角色</th>

                                <th class="sorting text-center" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 100px;">操作</th>

                            </tr>
                    	</thead>
                    <tbody>
                    	@foreach($data as $k=>$v)
                    	<tr class="gradeA odd text-center">
                            <td class="sorting_1">
                                <p>
                                {{ $v->id }}
                                </p>
                            </td>
                            <td class="center ">
                               <p>
                                {{ $v->rname }}
                                </p> 
                            </td>
                            <td class="center ">
                               <p>
                                <a href="/admin/nodes/{{ $v->id }}/edit" class="btn btn-info">节点权限</a>
                                </p> 
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                            <ul class="pagination" style="float:right;">
                                    {{ $data->links() }}
                            </ul>
                            </div>
                        </div>

                    </div>
            </div>               
        </div>
    </div>
    <!--End Advanced Tables -->
</div>
<!-- <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $('.panel').hide();
    $('.panel:first').show();

    $('#tab button:first').click(function(){
        $('.panel').hide();
        $('.panel:first').show();
    });

    $('#tab button:last').click(function(){
        $('.panel').hide();
        $('.panel:last').show();
    });
</script> -->
@endsection