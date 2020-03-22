<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>备忘录</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body style="background-color: #979eb0a8;">
	<div class="container">
		<h1 class="display-4 text-center">本地备忘录</h1><hr>
		<div class="mb-3">
			<div style="float:left;"><a href="添加备忘录.php" class="btn btn-success " target="_self">添加事件</a></div>
			<div style="float:right "><a href="登录页.php" class="btn btn-danger " target="_self">退出登录</a></div>
		</div>

		<table class="table table-stript table-hover table-bordered" style="margin-top: 70px;">
			<thead style="background-color: #383737">
				<tr>
					<th class="text-center" style="color:#fff">备忘内容</th>
					<th class="text-center" style="color:#fff">操作</th>
					
				</tr>
			</thead>
			<tbody class="text-center">
				<?php foreach ($_COOKIE as $num => $value) :?>
			<tr>
				<td class="active col-md-10"><?php echo $value; ?></td>
				<td class="active col-md-2 "><a class="btn btn-danger" href="删除备忘录.php?id=<?php echo $num; ?>">删除</a></td>
				
			</tr>
		<?php endforeach ?>
		</tbody>
	</div>
	</table>
</body>
</html>