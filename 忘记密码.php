<?php
$datat = json_decode(file_get_contents('forget.json'),true); 
$data = json_decode(file_get_contents('userjson.json'),true);
if($_SERVER['REQUEST_METHOD']==='POST'){
foreach ($datat as $key ) {
	
	if(!empty($_POST['password']) && $_POST['password']==$key['anser']){
		foreach ($data as $name ){
			$message='验证成功，您的账号为'.':'.'"'.$name['username'].'"'.','.'您的密码为'.':'.'"'.$name['password'].'"';
		}
		
	}else{
		$message="验证失败！请输入正确答案！";
		
	}
}
}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>忘记密码</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color: #979eb0a8;">
	<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off"	>
		<h2 >请输入您的密保答案</h2>
		<?php if(isset($message)): ?>
		<div><h3 style="color:green"><?php echo $message ?></h3></div>
	<?php endif ?>
			<input  class="form-control" type="text" name="password" id="password" ><br>
			<div class="text-center"><button class="btn btn-primary form-control"  style="width: 20%">提交</button></div><br>
			<div class="text-center"><a class="btn btn-success form-control" href="登录页.php" style="width: 20%">返回</a></div>
	</form>
	</div>
</body>
</html>