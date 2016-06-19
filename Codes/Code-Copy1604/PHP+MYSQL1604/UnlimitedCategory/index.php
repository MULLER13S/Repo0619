<html>
<head>
    <title>无限分类信息管理</title>
</head>
<body>
<center>
    <?php
    include("menu.php");

    ?>
    <h3>浏览分类信息</h3>
    <table width="600" border="1">
        <tr>
            <th>id号</th>
            <th>类别名称</th>
            <th>父ID</th>
            <th>路径</th>
            <th>操作</th>
        </tr>
        <?php
        require_once "dbconfig.php";

        $link=@mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
        mysqli_query($link,"set names utf8");

        $sql="select * from type ORDER BY concat(path,id)";
        $result=mysqli_query($link,$sql);

        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['pid']}</td>";
            echo "<td>{$row['path']}</td>";
            echo "<td><a href='add.php?pid={$row['id']}&name={$row['name']}&path={$row['path']}{$row['id']},' >添加子类</a>
                    <a href='action.php?action=del&id={$row['id']}' >删除</a>
</td>";
            echo "</tr>";

        }

        mysqli_free_result($result);
        mysqli_close($link);
        ?>
    </table>
</center>
</body>
</html>