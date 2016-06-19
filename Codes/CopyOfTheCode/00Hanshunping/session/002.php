<?php
header("Content-type: text/html; charset=utf-8");
session_start();
echo $_SESSION['name'];

print_r($_SESSION);
echo "<br><br>";
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
$a=$_SESSION['object'];
print_r($a);
echo "name id".$a->getname();
