<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield("title")</title>
</head>
<body>
	<div style="width:100%;height:200px;background-color:red">头部</div>
	@section("admin")
 	@show
	<div style="width:100%;height:200px;background-color:green">尾部</div>
</body>
</html>