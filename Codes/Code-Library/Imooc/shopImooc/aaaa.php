<?php
function getInsertId(){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);

    return mysqli_insert_id($link);
}

$link=mysqli_connect("localhost","root","123456","aabbcc");
$sql="insert test (name) values ('school')";
$res=mysqli_query($link,$sql);
echo mysqli_insert_id($link);
echo "ok";
