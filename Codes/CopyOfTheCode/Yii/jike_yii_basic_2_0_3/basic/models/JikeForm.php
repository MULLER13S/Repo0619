<?php
namespace app\models;

use yii\base\Model;
class JikeForm extends Model{
    public $name;
    public $pass;
    public $email;
    public $sex;
    public $edu;
    public $hobby;
    public $info;

    public function rules(){
        return [
            [['name','pass','email','sex','edu','hobby','info'],'required'],
            ['email','email','message'=>'邮箱格式不正确'],
            ['name','string','length'=>[2,8]]
        ];

    }

    public function attributeLabels(){
        return [
            'name'=>'名称',
            'email'=>'邮箱',
        ];
    }
}