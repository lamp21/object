<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@foreach($list_data as $k=>$v)
	<div>
		<h1 style="color: grey;" class="text-canter">正文详情</h1>
		<span>
			{!!$v->pic_content!!}
		</span>
	</div>	
	@endforeach
</body>
</html>