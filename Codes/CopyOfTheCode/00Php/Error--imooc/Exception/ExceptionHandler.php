<?php
class ExceptionHandler{
    protected $_exception;
    protected $_logFile='H:/ERROR/testException.log';
    public function __construct(Exception $e){
        $this->_exception=$e;
    }

    public static function handle(Exception  $e){
        $self=new self($e);
        $self->log();
        echo $self;
    }

    public function log(){
        error_log($this->_exception->getMessage(),3,$this->_logFile);
    }

    public function __toString(){
        $message=<<<EOF
<!DOCTYPE html>
<html>
<body>
<h1>it is amazing,exception come  out</h1>
<p>try to refresh</p>
<p><a href="mailto:1609759913@qq.com">contact  root</a></p>
</body>
</html>
EOF;
        return $message;

    }
}

set_exception_handler(array('ExceptionHandler','handle'));

throw new  Exception('EXE come out 0522');