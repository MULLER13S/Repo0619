<?php
require_once  'EmailException.php';
require_once 'ObserverException.php';
require_once 'ExceptionObserver.php';
require_once 'logObserver.php';

ObserverException::attach(new logObserver());
ObserverException::attach(new logObserver('test111.log'));
ObserverException::attach(new EmailObserver('1609759913@qq.com'));
class MyException extends ObserverException{
    public function test(){
        echo "this is a test on sat night";
    }

    public function test1(){
        echo 'i am a self-defined method to handle this exception';
    }
}

try{
    throw  new MyException('exception exists ,hurry to log');
}catch (MyException $e){
    echo $e->getMessage();
    echo "<hr/>";
    $e->test();
    echo "<hr/>";
    $e->test1();
    echo "<hr/>";
    echo "<hr/>";
}
