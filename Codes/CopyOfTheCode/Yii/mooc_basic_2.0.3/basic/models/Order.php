<?php
namespace app\models;

use yii\db\ActiveRecord;
class Order extends ActiveRecord{
    public function getCustomer(){
        return $this->hasOne(Customer::className(),['id'=>'customer_id'])
            ->asArray()->one();
    }

}