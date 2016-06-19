<?php
//以数组形式输出配置文件；对数据库链接有用；
//格式与php.ini相同；
$arr=parse_ini_file("db.ini");
print_r($arr);