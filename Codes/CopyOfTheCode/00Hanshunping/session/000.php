<?php
echo "hello<br>";
session_start();
$_SESSION['name']='luna';
$_SESSION['hanzi']="中国上海";
$arr=array("中国","上海","浦东");
$_SESSION['shuzu']=$arr;
class dog{
    private $name;
    private $age;
    private $in;
    public function __construct($name,$age,$in){
        $this->name=$name;
        $this->age=$age;
        $this->in=$in;

    }
    public function getname(){
        return $this->name;
    }
}
$dog=new dog("Lily",24,"beautiful girl");
$_SESSION['object']=$dog;
echo "success";