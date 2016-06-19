<?php
class ErrorToException extends  Exception{
    public static function handle($errno,$errstr){
        throw  new self($errstr,$errno);
    }
}

set_error_handler(array('ErrorToException','handle'));
set_error_handler(array('ErrorToException','handle'),E_USER_WARNING|E_WARNING);

try{
    echo $test;
    echo "<hr/>";
//    settype();
    echo "<hr/>";
    trigger_error('test',E_USER_WARNING);
}catch (Exception $e){
    echo 'exception';
    echo $e->getMessage();
}