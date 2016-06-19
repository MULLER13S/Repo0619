<?php
require_once "dbconfig.php";

$link=@mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
mysqli_query($link,"set names utf8");

switch($_GET['action']){
    case "add":
        $name=$_POST['name'];
        $pid=$_POST['pid'];
        $path=$_POST['path'];

        $sql="insert into type VALUES (NULL,'{$name}','{$pid}','{$path}')";
        mysqli_query($link,$sql);
        if(mysqli_insert_id($link)>0){
            echo "添加成功";
        }else{
            echo "添加失败";
        }
        echo "<br/><a href='add.php'>继续添加</a> ";
        break;
    case "del":
        $id=$_GET['id'];
        $sql="delete from type WHERE id={$id} or path LIKE '%,{$id},%'";
        mysqli_query($link,$sql);
        echo "成功删除".mysqli_affected_rows($link)."行";
        break;
}


mysqli_close($link);