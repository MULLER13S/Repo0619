<?php
require_once('page.class.php');
header("content-type:text/html;charset=utf-8");
$mysqli=new mysqli("localhost","root","123456","php0905");
$mysqli->query("set names utf8");

$sql='select * from sw_goods';
$res = $mysqli->query($sql);

$query1="select count(*) from sw_goods";
$res1 = $mysqli->query($query1);
$row1=$res1->fetch_row();
$count= $row1[0];
$per=2;

$page=new Page($count,$per);
$query2="select * from sw_goods $page->limit";

$res2=$mysqli->query($query2);



while($row=$res2->fetch_assoc()){
    echo $row['goods_id'].'----'.$row['goods_name']."<br>";
}

echo $page->fpage();

