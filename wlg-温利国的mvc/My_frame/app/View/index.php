<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	这是视图
	<table>
		<tr>
			<th>ID</th>
			<th>名字</th>
			<th>价格</th>
		</tr>
		<?php foreach ($data as $val) { ?>
		<tr>
		<td><?=$val['id']?></td>
		<td><?=$val['name']?></td>
		<td><?=$val['shop']?></td>
		</tr>
		<?php }?>
	</table>
</body>
</html>