<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VIEW</title>
    <link rel="stylesheet" href="???" type="text/css" />
</head>

<body>
<div class="register">
    <!--文件编码类型enctype;--->
    <form enctype="multipart/form-data" method="post" action="uploadprocess.php" name="myform">
        <table>
            <tr><td align="center" colspan="2"><font style="font-size: 40px;font-family:华文彩云;">
                        文件上传
                    </font></td></tr>
            <tr><td>请输入用户名：</td><td><input type="text" name="username" /> </td></tr>
            <tr><td>请简单介绍该文件</td><td><textarea rows="10" cols="40" name="fileintro" >
                </textarea></td></tr>
            <tr><td>请选择上传的文件：</td><td><input type="file" name="myfile" /> </td></tr>
            <tr><td><input type="submit" value="上传"></td><td> </td></tr>
        </table>
    </form>
</div>

</body>
</html>