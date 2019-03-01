@extends('admin.layout.index')

@section('content')
	
<div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
             <h2>广告列表</h2>
        </div>
        <div class="panel-body">
        	<form action="/admin/cates" method="get">
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
                            	<th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column ascending" style="width: 139px;">ID</th>

                            	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 350px;">图片</th>

                            	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 400px;">URL</th>

								<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 10px;">操作</th>

                            </tr>
                    	</thead>
                    <tbody>
                    	
                    	<tr class="gradeA odd">
                            <td class="sorting_1"></td>
                            
                            <td class="center "></td>
                            <td class="center "></td>
                            <td class="center">
                            	<a href="" class="btn btn-info">添加子分类</a>
                            	<form action="" method="post" style="display: inline-block;">
                            		{{ csrf_field() }}
                            		{{ method_field('DELETE') }}
									<input type="submit" value="删除" class="btn btn-danger">				
								</form>			
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
                <div class="row">
                	<div class="col-sm-12">
                		<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                			<ul class="pagination" style="float:right;">
                					
                			</ul>
                			</div>
                		</div>

                	</div>
                </div>
            </div>
            
        </div>
    </div>
    <!--End Advanced Tables -->
</div>

@endsection