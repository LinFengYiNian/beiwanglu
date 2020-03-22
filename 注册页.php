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
	if (empty($_POST['confirm'])){
         $massage='请输入确认密码!';
         return;
	}
	if ($_POST['password'] !==$_POST['confirm']){
         $massage='两次输入的密码不一致!';
         return;
	}
	if (empty($_POST['anser'])){
         $massage='请输入密保答案!';
         return;
     }

	if (!(isset($_POST['agree'])&&$_POST['agree']==='on')){
         $massage='必须同意注册协议!';
         return;
	}

	//所有校验都OK
	$data['username']=$_POST['username'];
	$data['password'] =$_POST['password'] ;
	$forgetdata['anser'] = $_POST['anser'];


    $forgetold=file_get_contents('forget.json');
    $oldf=json_decode( $forgetold,true);
    array_push($oldf, $forgetdata);
    $new_forget=json_encode($oldf);

    file_put_contents('forget.json', $new_forget);

	


	$jsonold = file_get_contents('userjson.json');
    $old = json_decode($jsonold,true);//解码老数据
    array_push($old, $data);//把新数据加到数组中
    $new_json = json_encode($old);//把新的数据编码
    file_put_contents('userjson.json', $new_json);//把新数据加到文件中

	//将数据保存到文本文件中
	

	

	
	$massage = '注册成功';
	header('Location:登录页.php');

};

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
			<h1 class="display-4 text-center">欢迎注册</h1>
			<?php if(isset($massage)): ?>
				
				<p class="text-center" style="font-size: 18px;color:red"><?php echo $massage; ?></p>
			<?php endif ?>
			<label for="username">用户名</label>
			<input  class="form-control" type="text" name="username" id="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"><br>
			
		
			<label for="password">密码</label>
			<input  class="form-control" type="password" name="password" id="password"><br>
			
		
			<label for="confirm">确认密码</label>
			<input  class="form-control" type="password" name="confirm" id="confirm"><br>

			<label for="anser">设置密保答案</label>
			<input  class="form-control" type="text" name="anser" id="anser"><br>
			
		
			
			<input type="checkbox" name="agree" value="on">
			<label for="agree">同意协议</label><br>
			
		
			
			
				<button class="btn btn-primary form-control">注册</button>
				<a href="登录页.php">已有账号?返回登录</a>
		
	

	</form>
</div>
</body>
</html>