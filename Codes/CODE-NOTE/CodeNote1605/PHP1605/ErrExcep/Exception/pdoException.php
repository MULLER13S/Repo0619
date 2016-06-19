<?php
/*$pdo=new PDO("mysql:host=localhost;dbname=yii2basic",'root','root13');
var_dump($pdo);*/
try{
    $pdo=new PDO("mysql:host=localhost;dbname=yii2basic",'root','root13');
    var_dump($pdo);
    echo "<hr/>";
    echo "continue";
}catch (PDOException $e){
    echo $e->getMessage();
    echo "this is eee";
}
echo "this is  a test";

echo "<hr/>";
try{
$splObj=new SplFileObject('test.txt','r');
    echo 'readed';
}catch (Exception $e){
    echo $e->getMessage();
    echo 'second exception';

}
echo "<hr/>";
echo "hello world";
echo "<hr/>";
try{
    throw new Exception('test exception 1');
}catch (Exception $e){
    echo $e->getMessage();
    echo "<hr/>";
    try{
        throw  new  Exception('test exception 2');
    }catch (Exception $a){
        echo $a->getMessage();
    }
}