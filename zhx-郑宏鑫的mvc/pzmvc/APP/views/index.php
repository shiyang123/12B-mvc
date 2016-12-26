<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>这是视图</h1>
<table>
    <tr>
        <td>name</td>
        <td>pwd</td>
        <td>操作</td>
    </tr>
    <?php foreach($arr as $key=>$v){?>
    <tr>
        <td><?php echo $v['name']?></td>
        <td><?php echo $v['pwd']?></td>
        <td><a href="del/id/<?php echo $v['id'] ?>">删除</a>||<a href="update/id/<?php echo $v['id'] ?>">修改</a></td>
    </tr>
    <?php }?>
    <a href="insert">添加用户</a>
</table>
</body>
</html>