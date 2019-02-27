@extends('admin.layout.index')

@section('content')
	
	<div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>分类列表</h2>
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
                                					<option value="5">5</option>
                                					<option value="10">10</option>
                                					<option value="25">25</option>
                                					<option value="50">50</option>
                                					<option value="100">100</option>
                                				</select> 条
                                			</label>
                                			</div>
                                		</div>
                                			<div class="col-sm-6">
                                				<div id="dataTables-example_filter" class="dataTables_filter" style="float:right;">
                                					<label text="align:righ" >关键字: 
                                						<input type="text" class="form-control input-sm" name="search" aria-controls="dataTables-example">
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

	                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 208px;">分类名称</th>

	                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 194px;">所属分类ID</th>

	                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 116px;">分类路径</th>

	                                        	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 82px;">状态</th>

												<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 82px;">操作</th>

	                                        </tr>
                                    	</thead>
                                    <tbody>
                                    	@foreach($cates_data as $k=>$v)
                                    	<tr class="gradeA odd">
                                            <td class="sorting_1">{{ $v->id }}</td>
                                            <td class=" ">{{ $v->cname }}</td>
                                            <td class=" ">{{ $v->pid }}</td>
                                            <td class="center ">{{ $v->path }}</td>
                                            <td class="center ">{{ $v->status == 1 ? '激活' : '未激活'}}</td>
                                            <td class="center">
                                            	<a href="/admin/cates/create/{{ $v->id }}" class="btn btn-info">添加子分类</a>
                                            	<form action="/admin/cates/{{ $v->id }}" method="post" style="display: inline-block;">
                                            		{{ csrf_field() }}
                                            		{{ method_field('DELETE') }}
													<input type="submit" value="删除" class="btn btn-danger">				
												</form>			
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                	<div class="col-sm-6">
                                		<div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 10 of 57 entries</div>
                                	</div>

                                	<div class="col-sm-6">
                                		<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                			<ul class="pagination" style="float:right;">
                                				<!-- <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous" >
                                					<a href="#">上一页</a>
                                				</li> -->
                                					{{ $cates_data->links() }}
                                				<!-- <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
                                					<a href="#">下一页</a>
                                				</li> -->
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