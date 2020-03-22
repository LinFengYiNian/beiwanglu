<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cookie控制广告隐藏显示</title>
	<style>
		div {
			width: 500px;
			height: 500px;
			background-color: red;
		}
	</style>
</head>
<body>
	<?php if(empty($_COOKIE)): ?>
	<div><a href="setcookie.php">X不再显示</a></div>
<?php endif ?>
</body>
</html>