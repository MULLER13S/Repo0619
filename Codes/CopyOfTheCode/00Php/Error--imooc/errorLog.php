<?php
header('content-type:text/html;charset=utf-8');
ini_set('display_errors',0);
ini_set('date.timezone','PRC');
error_reporting(-1);
ini_set('log_errors',1);
ini_set('error_log','H:\ERROR\ERROR.log');
ini_set('ignore_repeated_errors','on');
ini_set('ignore_repeated_source','on');

$user=$_POST['user'];
$pass=$_POST['pass'];

if($user=='muller'){
    echo "yes";
}else{
    $date=date('Y-m-d H:i:s',time());
    $ip=$_SERVER['REMOTE_ADDR'];
    $message="用户在{$date}以{$ip}通过{$user}.{$pass}登陆";
    error_log($message);
    header('location:login.html');
    echo "no";
}






















