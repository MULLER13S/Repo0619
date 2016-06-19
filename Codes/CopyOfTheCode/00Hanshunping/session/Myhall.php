<?php
header("content-type:text/html;charset=utf-8");
echo "<h1>欢迎购买</h1>";
echo "<a href='ShopProcess.php?bookid=sn001&bookname=天龙八部'>天龙八部</a><br/>";
echo "<a href='ShopProcess.php?bookid=sn002&bookname=西游记'>西游记</a><br/>";
echo "<a href='ShopProcess.php?bookid=sn003&bookname=三国演义'>三国演义</a><br/>";
echo "<a href='ShopProcess.php?bookid=sn004&bookname=神雕侠侣'>神雕侠侣</a><br/>";
echo "<hr/>";
echo "<a href='ShowCart.php'>查看购买到商品列表</a>";