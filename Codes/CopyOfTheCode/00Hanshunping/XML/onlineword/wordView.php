<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="gb2312">
    <title>dictionary</title>
</head>
<img src="view.jpg" width="400px" />
<h1>查询单词</h1>
<form action="wordProcess.php" method="post" >
    请输入单词：<input type="text" name="enword" />
    <input type="hidden" name="type" value="query">
    <input type="submit" value="查询">
</form>
<h1>添加单词</h1>
<form action="wordProcess.php" method="post">
    请输入英文：<input type="text" name="enword" /><br>
    请输入中文：<input type="text" name="chword" /><br>
    <input type="hidden" name="type" value="add" />
    <input type="submit" value="添加">
</form>
</html>