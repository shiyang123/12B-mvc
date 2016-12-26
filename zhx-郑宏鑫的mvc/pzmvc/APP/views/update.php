<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="index/upone" method="post">
    <table>
    <input type="hidden" name="id" value="<?php echo $arr['id']?>">
        <tr>
            <td>用户名</td>
            <td><input type="text" name='uname' value="<?php echo $arr['name']?>"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="text" name="pwd" value="<?php echo $arr['pwd']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"/></td>
        </tr>
    </table>
</form>
</body>
</html>