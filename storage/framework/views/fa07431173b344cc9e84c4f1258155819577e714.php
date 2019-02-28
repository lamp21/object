<?php $__env->startSection('content'); ?>
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
	              <option value="10" <?php if(isset($request['count']) && $request['count'] == 10): ?> selected <?php endif; ?>>10</option>
	              <option value="15" <?php if(isset($request['count']) && $request['count'] == 15): ?> selected <?php endif; ?>>15</option>
	              <option value="20" <?php if(isset($request['count']) && $request['count'] == 20): ?> selected <?php endif; ?>>20</option>
	              <option value="50" <?php if(isset($request['count']) && $request['count'] == 50): ?> selected <?php endif; ?>>50</option></select>&nbsp;条</label>
	        </div>
	      </div>
	      <div class="col-sm-6">
	        <div id="dataTables-example_filter" class="dataTables_filter">
	          <label style="float:right;">关键词:
	            <input type="text" name="search" class="form-control input-sm" aria-controls="dataTables-example" value="<?php echo e(isset($request['search']) ? $request['search'] : ''); ?>">
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
		    <th>邮箱</th>
		    <th>创建时间</th>
		    <th>用户简介</th>
		    <th>操作</th>
		</tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>       
    <tr style="background:none;">
        <td><?php echo e($v->id); ?></td>
        <td><?php echo e($v->uname); ?></td>
        <td><?php echo e($v->phone); ?></td>
        <td><?php echo e($v->email); ?></td>
        <td><?php echo e($v->created_at); ?></td>
        <td>
        	<abbr title="<?php echo e($v->usersinfo->description); ?>">
        	<p style="width: 100px;overflow: hidden;text-overflow:ellipsis;white-space: nowrap; "><?php echo e($v->usersinfo->description); ?></p>
        	</abbr>
        </td>
        <td>
        	<a href="/admin/users/<?php echo e($v->id); ?>/edit" class="btn btn-success">修改</a>
        	<form action="/admin/users/<?php echo e($v->id); ?>" method="post" style="display: inline-block;">
        		<?php echo e(csrf_field()); ?>

        		<?php echo e(method_field('DELETE')); ?>

        		<input type="submit" value="删除" name="" class="btn btn-danger">
        		
        	</form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
    </table>
    <div class="table-responsive">
	  <div class="row">
	    <div class="col-sm-12">
	    	<div style="float:right;">
	    		<?php echo e($data->appends($request)->links()); ?>

	    	</div>
	     </div>
	    <div class="col-sm-6">
	      <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
	      </div>
	    </div>
	  </div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>