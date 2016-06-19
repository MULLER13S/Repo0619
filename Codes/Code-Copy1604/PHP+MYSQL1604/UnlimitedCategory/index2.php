<?php
require_once "dbconfig.php";

$link=@mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
mysqli_query($link,"set names utf8");

if(isset($_GET['pid'])){
    $pid=$_GET['pid']+0;
}else{
    $pid=0;
}
if($pid>0){
    $sql="select path from type WHERE id={$pid}";
    $res=mysqli_query($link,$sql);
    $path=mysqli_fetch_row($res);
    $path=implode(",",$path);
    var_dump($path);
    $sql="select * from type WHERE id IN ({$path}{$pid}) ORDER BY id";
    echo $sql;
    $typeres=mysqli_query($link,$sql);
}
?>
<html>
<head>
    <title>无限分类信息管理</title>
</head>
<body>
<center>
    <?php
    include("menu.php");

    ?>
    <h3>分层浏览分类信息</h3>
    <div style="width:600px;text-align:left;">
        路径：<a href="index2.php?pid=0">根类别</a>&gt;&gt;
        <?php
        if(!isset($typeres)){
            $typeres=false;
        }
        if($typeres && mysqli_num_rows($typeres)>0){
            while($row=mysqli_fetch_assoc($typeres)){
                echo "<a href=\"index2.php?pid={$row['id']}\">{$row['name']}</a>&gt;&gt;";
            }
        }
        ?>

    </div>
    <table width="600" border="1">
        <tr>
            <th>id号</th>
            <th>类别名称</th>
            <th>父ID</th>
            <th>路径</th>
            <th>操作</th>
        </tr>
        <?php

        if(isset($_GET['pid'])){
            $pid=$_GET['pid']+0;
        }else{
            $pid=0;
        }


        $sql="select * from type WHERE pid={$pid} ORDER BY concat(path,id)";
        $result=mysqli_query($link,$sql);

        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td><a href='index2.php?pid={$row['id']}'> {$row['name']}</a></td>";
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