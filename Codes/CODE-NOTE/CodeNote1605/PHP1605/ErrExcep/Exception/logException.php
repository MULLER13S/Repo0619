<?php
class LogException extends Exception{
    public function __construct($message=null,$code=0){
        parent::__construct($message,$code);
        error_log($this->getMessage(),3,'H:/ERROR/notice.log');
    }
}

try{
    $link=mysqli_connect('localhost','root','rooot','sdfd');
    if(!$link){
        throw new LogException('database connect failed on saturday');
    }
}catch (LogException $e){
    echo $e->getMessage();
}