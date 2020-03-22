<?php 
if(empty($_COOKIE['num'])){
	$num = rand(0,100);
	setcookie('num',$num);//如果不存在cookie就设置一个
}else{

	$count = empty($_COOKIE['count']) ? 0 : $_COOKIE['count'];
	if ($count<10){
		$result=(int)$_GET['num']-(int)$_COOKIE['num'];
		if($result==0){
			echo '猜对了';
			setcookie('num');//清理cookie
			setcookie('count');
		}elseif($result>0){
		echo '数字大了';
		}else{
		echo '数字小了';
		}
		setcookie('count',$count+1);
	}else{
		echo '次数用尽';
		setcookie('num');
		setcookie('count');
	}
	
}



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>猜数字游戏</title>
</head>
<body>
	<div><p>本次已经生成一个数字，您共有10次机会猜中！</p></div>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
		<input type="text" name="num">
		<button>提交</button>
	</form>
</body>
</html>