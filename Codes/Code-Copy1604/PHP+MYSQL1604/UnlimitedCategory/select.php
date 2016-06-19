<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>无限分类信息管理</title>
</head>
<body>
<center>
    <?php
    include("menu.php");

    ?>
    <h3>下拉浏览分类信息</h3>
    <select name="typeid">
        <?php
        require_once "dbconfig.php";

        $link=@mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
        mysqli_query($link,"set names utf8");

        $sql="select * from type ORDER BY concat(path,id)";
        $result=mysqli_query($link,$sql);

        while($row=mysqli_fetch_assoc($result)){
            $m=substr_count($row['path'],",")-1;
            $strpad=str_pad("",$m*36,"&nbsp;");
            if($row['pid']==0){
                $dbd='disabled';
            }else{
                $dbd="";
            }
            echo "<option {$dbd} value='{$row['id']}'>{$strpad}{$row['name']}</option>";

        }

        mysqli_free_result($result);
        mysqli_close($link);
        ?>
    </select>
</center>

</body>
</html>