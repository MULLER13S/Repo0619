<?php
namespace IMooc;

class Register{
    protected static $objects;

    static function set($alias, $object)
    {
        self::$objects[$alias] = $object;
    }
    static function get($name){
        return self::$objects[$name];
    }
    function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }

}