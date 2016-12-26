<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>zhenshi</title>
</head>
<body>
	<table>
		<th>用户名</th>
		<th>密码</th>
		<?php foreach ($list as $key => $v): ?>
			
		<tr>
			<td><?php echo $v['name'] ?></td>
			<td><?php echo $v['pwd'] ?></td>
		</tr>
		<?php endforeach ?>
	</table>
</body>
</html>