<?php 
date_default_timezone_set('PRC');

if($_SERVER['REQUEST_METHOD']==='POST'){
	$time = date('Y-m-d H:i:s',time());
$num=rand(0,9999999999999999);

	
setcookie($num,$_POST['content']);
	

header('Location:备忘录.php');

}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加备忘录</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color: #979eb0a8">
	<div class="container">
		<h1 class="display-4">添加本地备忘录</h1>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<div><p>记录时间:<?php echo date('Y-m-d H:i:s',time()); ?></p></div>
			<div class="form-group">
				<label for="content">内容</label>
				<textarea name="content" id="content" cols="30" rows="10" class="form-control" style="resize: none;"></textarea>
			</div>
			<button class="btn btn-primary btn-block">提交</button>
	</form>
	</div>
</body>
</html>