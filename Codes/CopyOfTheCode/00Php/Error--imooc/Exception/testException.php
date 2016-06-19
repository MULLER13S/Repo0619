<?php
$num=null;
try{
$num=3/0;
    var_dump($num);
}catch (Exception $e){
    echo $e->getMessage();
    echo "hello1";

}
echo "<hr/>";
echo "continue..........";

try{
    $num1=3;
    $num2=0;
    if($num2==0){
        throw new Exception('zero cant be devised');
        echo "this is a test";
    }
}catch (Exception $e){
    echo $e->getMessage();
}
echo "<hr/>";