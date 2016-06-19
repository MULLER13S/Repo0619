<?php
require_once '../include.php';
//session_start();
$username=$_POST['username'];
$username=addslashes($username);
$password=md5($_POST['password']);
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
if(isset($_POST['autoFlag'])) {
    $autoFlag = $_POST['autoFlag'];
}
if($verify==$verify1) {
    connect();
    $sql = "select * from imooc_admin where username='{$username}' and password='{$password}'";
    $row = checkAdmin($sql);
    if($row){
        //如果选了一周内自动登陆
        if(isset($autoFlag)){
            setcookie("adminId",$row['id'],time()+7*24*3600);
            setcookie("adminName",$row['username'],time()+7*24*3600);
        }
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];
        alertMes("登陆成功","index.php");
    }else{
        alertMes("登陆失败，重新登陆","login.php");
    }
    var_dump($row);
}else{
    alertMes("验证码错误","login.php");
}