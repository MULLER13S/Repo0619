<?php
class User extends CActiveRecord
{
    public $password2;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return "{{user}}";
    }

    public function attributeLabels()
    {
        return array(
            'username' => '用户名',
            'password' => '密  码',
            'password2'=>'确认密码',
            'user_sex' => '性  别',
            'user_qq' => 'qq号码',
            'user_hobby' => '爱  好',
            'user_xueli' => '学  历',
            'user_introduce' => '简  介',
            'user_email' => '邮  箱',
            'user_tel' => '手机号码',
        );
    }

    public function rules(){
        return array(
            array('username','required','message'=>'用户名必填'),
            array('username', 'unique', 'message'=>'用户名已经占用'),

            array('password','required','message'=>'密码必填'),
            array('password2','compare','compareAttribute'=>'password','message'=>'两次密码必须一致'),
            array('user_email','email','allowEmpty'=>false,'message'=>'邮箱格式不正确'),
            array('user_qq','match','pattern'=>'/^[1-9]\d{4,11}$/','message'=>'qq格式不正确'),
            array('user_tel','match','pattern'=>'/^13\d{9}$/','message'=>'手机号码格式不正确'),
            array('user_xueli','in','range'=>array(2,3,4,5),'message'=>'学历必须选择'),
array('user_hobby','check_hobby'),
array('user_sex,user_introduce','safe'),


            );
    }

    public function check_hobby(){
        //echo $this->user_hobby;exit;
        $len = strlen($this -> user_hobby);
        if($len < 3)
            $this -> addError('user_hobby','爱好必须选择两项或以上');
    }
}
