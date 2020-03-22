<?php 
$data = json_decode(file_get_contents('userjson.json'),true);
$datat = json_decode(file_get_contents('forget.json'),true);
if(count($data)>=1){
	$message='账号已存在，若要删除原有账号，请先验证原有用户名和密码！';
}else{
	header('Location:注册页.php');
}

if($_SERVER['REQUEST_METHOD']==='POST'){
	foreach ($data as $user ) {
	
		if($user['username']==$_POST['username']&&$user['password']==$_POST['password']){
		  
		  	foreach ($_COOKIE as $key => $value) {
						$name=$key;
						setcookie($name);
			}

			$data=[];
			$new=json_encode($data);
			 file_put_contents('userjson.json', $new);
			 $datat=[];
			 $newt=json_encode($datat);
			 file_put_contents('forget.json', $newt);	
			 $message='账号及内容已清空，请重新注册！';
			}else{
				$message= "用户名或密码不正确，请重新输入！";
			}
	}

}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>判断页</title>
 	<link rel="stylesheet" href="bootstrap.min.css">
 </head>
 <body style="background-color: #979eb0a8">
 	<div class="container" >
 		<h1 class="text-center" style="color:red"><?php echo $message ?></h1><br><br><br><br><br>
 		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
 			<label for="username">用户名</label>
			<input  class="form-control  " type="text" name="username" id="username" ><br>
			
		
			<label for="password">密码</label>
			<input  class="form-control" type="password" name="password" id="password"><br>
 			<div>
 				<div class="text-center" ><button class="btn btn-danger form-control " style="width: 20%">验证</button></div>
 				<div></div>
 			</div>
 		</form><br><br>
 		<div class="text-center"><a class="btn btn-success form-control" href="登录页.php" style="width: 20%">返回</a></div>
 	</div>
 </body>
 </html>