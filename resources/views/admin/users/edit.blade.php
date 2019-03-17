@extends('admin.layout.index')


@section('content')
<br><br>
    <small></small>
<div class="col-xs-12">
	<!-- 显示错误信息 -->
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			    @foreach ($errors->all() as $error)
			        <li>{{ $error }}</li>
			    @endforeach
			</ul>
		</div>
		@endif

        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">用户修改</div>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="/admin/users/{{ $users->id }}" method="post">
                    {{ method_field('PUT') }}
                	{{ csrf_field() }}
                    <div class="form-group">
                        <label for="uname" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" disabled id="uname" name="uname" value="{{ $users['uname']}}">
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
                            <input type="password" class="form-control" id="repassword" name="upass">
                        </div>
                    </div>
<!--                     <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $users['email']}}">
                        </div>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">手机号</label>
                        <div class="col-sm-10">
                            <input type="phone" class="form-control" id="phone" name="phone" value="{{ $users['phone']}}">
                        </div>
                    </div> -->
    				<div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="submit" value="修改" class="btn btn-info">
                            <input type="reset" value="重置" class="btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection