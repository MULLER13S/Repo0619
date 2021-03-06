<?php
class ObserverException extends Exception{
    public static $_observers=array();
    public static function attach(ExceptionObserver $observer){
        self::$_observers[]=$observer;
    }
    public function __construct($message=null,$code=0){
        parent::__construct($message,$code);
        $this->notify();
    }
    public function notify(){
        foreach(self::$_observers as $observer){
            $observer->update($this);
        }
    }
}