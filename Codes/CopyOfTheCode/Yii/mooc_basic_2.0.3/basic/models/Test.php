<?php
namespace app\models;

use yii\db\ActiveRecord;



class Test extends ActiveRecord{
    public function rules(){
        return [
            ['id','integer'],
            ['title','string','length'=>[1,6]]
        ];
    }

}