<?php $__env->startSection('content'); ?>
<br><br>
    <small></small>
<div class="col-xs-12">
	<!-- 显示错误信息 -->
		<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger">
			<ul>
			    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        <li><?php echo e($error); ?></li>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
		<?php endif; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">用户添加</div>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="/admin/users" method="post">
                	<?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <label for="uname" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="uname" name="uname" value="<?php echo e(old('uname')); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="upass" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="upass" name="upass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="repassword" class="col-sm-2 control-label">确认密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="repassword" name="repassword">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">手机号</label>
                        <div class="col-sm-10">
                            <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo e(old('phone')); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">个人介绍</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description"> <?php echo e(old('description')); ?></textarea>
                        </div>
                    </div>
    				<div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="添加" class="btn btn-info">
                            <input type="reset" value="重置" class="btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>