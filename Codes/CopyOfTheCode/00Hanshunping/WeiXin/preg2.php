<?php
header('content-type:text/html;charset=utf-8');
$keyword="cxwz北京";
preg_match("/^cxwz([\x{4e00}-\x{9fa5}]+)/ui",$keyword,$res);
echo "<pre>";
print_r($res);
echo "</pre>";