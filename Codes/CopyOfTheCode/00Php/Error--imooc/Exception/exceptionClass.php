<?php
class MyException extends Exception{
    public function __construct($message,$code=0){
        parent::__construct($message,$code);
    }

    public function __toString(){
        $message="<h2>exception  exists<h2/>";
        $message.="<p>".__CLASS__."[{$this->code}]:{$this->message}</p>";
        return  $message;
    }

    public function test(){
        echo "this is a test";
    }

    public function stopScript(){
        exit('end  script on saturday.....');
    }

}
//基类可以捕获所有异常，应该放最后，子类放前面；
try{
    echo "exception  begin";
    throw new MyException('test exception my my mine',3);
}catch (MyException $e){
    echo $e->getMessage();
    echo "<hr/>";
    echo $e;
    echo "<hr/>";
     $e->test();

}
echo "<hr/>";
echo "continue....";