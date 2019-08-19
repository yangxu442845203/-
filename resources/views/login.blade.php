<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
</head>
<body>
	<form action="/dologin" method="post">
		用户名:<input type="text" name="name"><br>
		密码:<input type="password" name="pass"><br>
		{{csrf_field()}}
		<input type="submit" value="登录">
	</form>
</body>
</html>