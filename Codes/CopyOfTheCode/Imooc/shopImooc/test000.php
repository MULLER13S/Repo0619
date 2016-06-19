<?php
$conn = mysqli_connect("localhost", "root", "123456", "shopImooc");
mysqli_query($conn, "set names utf8");
$sql="insert imooc_cate (cName) VALUES ('".$_POST['cName']."')";
echo $sql."<br/>";
if($res = mysqli_query($conn, $sql)){
    echo "留言成功";
}else{
    echo "留言失败";
}

