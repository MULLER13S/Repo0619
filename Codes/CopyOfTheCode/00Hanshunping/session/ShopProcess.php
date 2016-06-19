<?php
header("content-type:text/html;charset=utf-8");
$bookid=$_GET['bookid'];
$bookname=$_GET['bookname'];
session_start();
$_SESSION[$bookid]=$bookname;
echo "<br/>购买商品成功";
echo "<br/><a href='Myhall.php'>返回购物大厅继续</a>";