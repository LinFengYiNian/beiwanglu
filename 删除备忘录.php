<?php 
if(empty($_GET['id'])){
	exit('必须传入参数');
}
$id=$_GET['id'];
setcookie($id);
header('Location:备忘录.php');
