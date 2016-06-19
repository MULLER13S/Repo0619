<?php
namespace IMooc;

interface IDatabase{
    function connect($host,$user,$passwd,$dbname);
    function  query($sql);
    function close();
}
class Database{
    static private $db;
    private function __construct()
    {

    }
    static function getInstance()
    {
        if(self::$db){
            return self::$db;
        }else{
            $db=new self();
            return self::$db;
        }

    }
    function where($where){
        return $this;

    }
    function order($order){
        return $this;
    }
    function limit($limit){
        return $this;
    }
}