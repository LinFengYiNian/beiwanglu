<?php 
date_default_timezone_set('PRC');//设置默认时区为中国

//回发处理函数
function postback () {
	global $massage;
	if (empty($_POST['username'])){
         $massage='请输入用户名和密码!';
         return;
	}
	if (empty($_POST['password'])){
         $massage='请输入密码!';
         return;
	}
$data = json_decode(file_get_contents('userjson.json'),true); //逻辑判断需要注意多个用户的账号遍历验证

	foreach ($data as $user ) {
	
		if($user['username']!==$_POST['username']){
		  
		  	$massage="用户不存在！";
		  	return;
		  	
		  }elseif($user['username']==$_POST['username']&&$user['password']==$_POST['password']){
		  
		  	$massage="登录成功";
		  	header('Location:备忘录.php');
		
			}else{
				$massage= "用户名或密码不正确，请重新输入！";
   			
		}
	}
}
	
	
         
	
 
	

	

	



if($_SERVER['REQUEST_METHOD'] ==='POST'){
	postback();


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录页</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color: #979eb0a8;">
	<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" autocomplete="off">
			<h1 class="display-4 text-center">欢迎登录</h1>
			<?php if(isset($massage)): ?>
				
				<p class="text-center" style="font-size: 18px;color:red"><?php echo $massage; ?></p>
			<?php endif ?>
			<label for="username">用户名</label>
			<input  class="form-control" type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" ><br>
			
		
			<label for="password">密码</label>
			<input  class="form-control" type="text" name="password" id="password"><br>
			
			
		
			<button class="btn btn-primary form-control">登录</button>
			<div><div style="float: left;"><a href="忘记密码.php">忘记密码？</a></div><div style="float: right;"><a href="判断账号是否存在页.php">注册账号</a></div></div>
		
	

	</form>
</div>
</body>
</html>