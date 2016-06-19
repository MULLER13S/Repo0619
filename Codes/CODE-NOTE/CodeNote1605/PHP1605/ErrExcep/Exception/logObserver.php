<?php
class logObserver implements ExceptionObserver{
    protected $_filename='H:/ERROR/logException.log';
    public function __construct($filename=null){
        if($filename!==null && is_string($filename)){
            $this->_filename=$filename;
        }
    }


    public function update(ObserverException $e){
        $message="time:".date('H:i:s');
        $message.="info:".$e->getMessage();
$message.="TRACE:".$e->getTraceAsString();
$message.="FILE:".$e->getFile();
$message.="LINE:".$e->getLine();

        error_log($message,3,$this->_filename);
    }
}