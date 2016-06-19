<?php
header('content-type:text/html;charset=utf-8');
error_reporting(-1);

function customError($errno,$errmsg,$file,$line){
    echo "<b>错误代码：</b>[{$errno}] {$errmsg}<br/>";
    echo "<b>错误行号：</b>[{$file}] 第{$line}行<br/>";
    echo "<b>php version：</b>".PHP_VERSION.PHP_OS."<br/>";
}
set_error_handler('customError');
echo $test;
echo "<hr/>";
settype($var,'king');
echo "<hr/>";
//test();

trigger_error('this is  a  test ',E_USER_ERROR);
echo "<hr/>";

restore_error_handler();//取消接管
echo $king;
echo "<hr/>";
set_error_handler('customError',E_ALL&~E_NOTICE);
echo $imooc;


echo "<hr/>";







