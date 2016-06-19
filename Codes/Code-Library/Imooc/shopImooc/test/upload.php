<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="doAction1.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE" value="204800" />

    请选择上传文件：<input type="file"  name="myFile"  /><br/>
    <input type="submit" value="上传"/>
</form>

</body>
</html>