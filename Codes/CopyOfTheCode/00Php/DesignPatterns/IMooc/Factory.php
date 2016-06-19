<?php
namespace IMooc;

class Factory{
    //factory pattern
    static $proxy = null;
    static function createDatabase(){
//        $db=new Database();
        $db=Database::getInstance();
        Register::set('db1',$db);
        return $db;
    }
    static  function getUser($id){
        $key='user_'.$id;
        $user=Register::get($key);
        if(!$user){
            $user=new User($id);
            Register::set($key,$user);
        }
//        $user=new User($id);
        return $user;
    }

    static function getDatabase($id = 'proxy')
    {
        if ($id == 'proxy')
        {
            if (!self::$proxy)
            {
                self::$proxy = new \IMooc\Database\Proxy;
            }
            return self::$proxy;
        }

        $key = 'database_'.$id;
        if ($id == 'slave')
        {
            $slaves = Application::getInstance()->config['database']['slave'];
            $db_conf = $slaves[array_rand($slaves)];
        }
        else
        {
            $db_conf = Application::getInstance()->config['database'][$id];
        }
        $db = Register::get($key);
        if (!$db) {
            $db = new Database\MySQLi();
            $db->connect($db_conf['host'], $db_conf['user'], $db_conf['password'], $db_conf['dbname']);
            Register::set($key, $db);
        }
        return $db;
    }



}