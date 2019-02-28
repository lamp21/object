<?php $__env->startSection('content'); ?>
				
		<p></p>
		<div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                                    
        <div class="card-title">
            <h2><div class="title">分类管理</div></h2>
        </div>
    </div>

	<form class="form-horizontal" action="/admin/cates" method="post">
		<?php echo e(csrf_field()); ?>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">分类</label>
	        <div class="col-sm-10" style="width:600px;">
	            <input type="text" class="form-control" placeholder="分类名称" name="cname">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-sm-2 control-label">所属分类</label>
	        <div class="col-sm-10" style="width:600px;">
	            <select name="pid" class="form-control" class="col-sm-10" style="height:34px;border-radius:;">
	                <option value="0">--请选择--</option>
	                <?php $__currentLoopData = $cates_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <option value="<?php echo e($v->id); ?>" <?php if($id == $v->id): ?> selected <?php endif; ?>><?php echo e($v->cname); ?></option>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </select>
	        </div>
	    </div>    
	    
	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button type="submit" class="btn btn-default btn btn-info">提交</button>
	            <button type="reset" class="btn btn-default">重置</button>
	        </div>
	    </div>
	</form>
	        </div>
	    </div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>