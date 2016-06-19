<?php
namespace IMooc;

class User
{
    public $id;
    public $name;
    public $mobile;
    public $regtime;

    function __construct($id)
    {
        $this->db=new \IMooc\Database\MySQLi();
        $this->db->connect('localhost','root','123456','test');
        $res=$this->db->query("select * from user limit 1");
        $data=$res->fetch_assoc();
        $this->id=$data['id'];
        $this->name=$data['name'];
        $this->mobile=$data['mobile'];
        $this->regtime=$data['regtime'];


//        $this->db = Factory::getDatabase();
//        $res = $this->db->query("select * from user where id = $id limit 1");
//        $this->data = $res->fetch_assoc();
//        $this->id = $id;
    }

    function __destruct(){
        $this->db->query("update user set name='{$this->name}',mobile='{$this->mobile}',
regtime='{$this->regtime}' where id='{$this->id}' limit 1");
    }

    /*function __get($key)
    {
        if (isset($this->data[$key]))
        {
            return $this->data[$key];
        }
    }

    function __set($key, $value)
    {
        $this->data[$key] = $value;
        $this->change = true;
    }

    function __destruct()
    {
        if ($this->change)
        {
            foreach ($this->data as $k => $v)
            {
                $fields[] = "$k = '{$v}'";
            }
            $this->db->query("update user set " . implode(', ', $fields) . "where
            id = {$this->id} limit 1");
        }
    }*/
}