<?php
header("content-type:text/html;charset=utf-8");
echo "<h1>购物车商品有：</h1>";
session_start();
foreach($_SESSION as $key=>$val){
    echo "<br/>书号--$key 书名--$val";
}