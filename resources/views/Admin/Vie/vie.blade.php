@include("Admin.Vie.header")
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>视图</title>
</head>
<body>
	<h1>千山鸟飞绝</h1>
	<h1>解析数据:
		{{$name}},
		{{$age}}, 
		{{$arr[0]}}, 
		{{$arr[1]}}, 
		{{$arr[2]}}, 
		{{$arr1['name']}}, 
		{{$arr1['sex']}}.
	</h1>
	<h1>
		使用函数:{{time()}}, 
		{{date('Y-m-d')}}. 
	</h1>
	<h1>设置默认值:{{$username or 'sm'}}</h1>
	<h1>{!!$b!!}</h1>
	<h1>流程控制:</h1>
	@if($c==20)
	天地
	@elseif($c>20)
	乾坤
	@else
	山川
	@endif
	<h1>foreach循环控制:</h1>
	<center>
		<table border="1px" width="200px">
			<tr>
				<th>Name</th>
				<th>Age</th>
			</tr>
			@foreach($arr2 as $row)
			<tr>
				<td>{{$row['name']}}</td>
				<td>{{$row['age']}}</td>
			</tr>
			@endforeach
		</table>
	</center>
	<h1>for循环</h1>
	@for($i=1;$i<=100;$i++)
	{{$i}}
	@endfor
</body>
</html>