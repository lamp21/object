@extends('admin.layout.index')

@section('content')
<br><br>
    <small></small>
<div class="col-xs-12">
	<!-- 显示错误信息 -->
		<!-- @if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
			    @foreach ($errors->all() as $error)
			        <li>{{ $error }}</li>
			    @endforeach
			</ul>
		</div>
		@endif -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="card-title">
                    <div class="title">用户添加</div>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="/admin/users/updaterole/{{ $user->id }}" method="post">
                	{{ csrf_field() }}
                    <div class="form-group">
                        <label for="uname" class="col-sm-2 control-label">用户名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="uname" disabled value="{{ $user->uname }}">
                        </div>
                    </div>
						
					<div class="form-group">
                        <label for="uname" class="col-sm-2 control-label">角色名称</label>
                        <div class="col-sm-10" >
                            <div>
                            	<div class="radio3 radio-check radio-inline">
                                	
                                	@foreach($roles_data as $k=>$v)
                                	<input type="checkbox" id="radio4" name="rids[]" @if(in_array($v->id,$user_role_data_rids)) checked @endif value="{{ $v->id }}" ><label for="radio4">{{ $v->rname }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                	@endforeach
                              	</div>                              	
                            </div>
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

@endsection