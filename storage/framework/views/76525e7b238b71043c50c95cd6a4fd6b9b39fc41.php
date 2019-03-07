<?php $__env->startSection('content'); ?>
	
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
                					<option value="5" <?php if(isset($request['count']) && $request['count'] == 5): ?> selected <?php endif; ?>>5</option>
                					<option value="10" <?php if(isset($request['count']) && $request['count'] == 10): ?> selected <?php endif; ?>>10</option>
                					<option value="25" <?php if(isset($request['count']) && $request['count'] == 25): ?> selected <?php endif; ?>>25</option>
                					<option value="50" <?php if(isset($request['count']) && $request['count'] == 50): ?> selected <?php endif; ?>>50</option>
                					<option value="100" <?php if(isset($request['count']) && $request['count'] == 100): ?> selected <?php endif; ?>>100</option>
                				</select> 条
                			</label>
                			</div>
                		</div>
                			<div class="col-sm-6">
                				<div id="dataTables-example_filter" class="dataTables_filter" style="float:right;">
                                    <label text="align:righ" >关键字: 
                                        <input type="text" class="form-control input-sm" name="search" aria-controls="dataTables-example" value="<?php echo e(isset($request['search']) ? $request['search'] : ''); ?>">
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

                            	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 116px;">所属分类ID</th>

                            	<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 116px;">分类路径</th>

								<th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 82px;">操作</th>

                            </tr>
                    	</thead>
                    <tbody>
                    	<?php $__currentLoopData = $cates_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	<tr class="gradeA odd">
                            <td class="sorting_1"><?php echo e($v->id); ?></td>
                            <td class=" "><?php echo e($v->cname); ?></td>
                            <td class=" "><?php echo e($v->pid); ?></td>
                            <td class="center "><?php echo e($v->path); ?></td>
                            <td class="center text-center">
                            	<a href="/admin/cates/create/<?php echo e($v->id); ?>" class="btn btn-info">添加子分类</a>
                            	<form action="/admin/cates/<?php echo e($v->id); ?>" method="post" style="display: inline-block;">
                            		<?php echo e(csrf_field()); ?>

                            		<?php echo e(method_field('DELETE')); ?>

									<input type="submit" onclick="return confirm('确定要删除吗?');" value="删除" class="btn btn-danger">				
								</form>			
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row">
                	<div class="col-sm-12">
                		<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                			<ul class="pagination" style="float:right;">
                					<?php echo e($cates_data->links()); ?>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>