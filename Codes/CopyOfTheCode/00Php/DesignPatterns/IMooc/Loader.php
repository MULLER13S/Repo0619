<?php
namespace IMooc;

class Loader{
    static function autoload($class){
        $file= BASEDIR.'/'.str_replace('\\','/',$class).'.php';
//        $file=str_replace('\\','/',$file);
        require $file;


    }
}