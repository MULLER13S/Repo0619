<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\Order;
class Customer extends ActiveRecord{
public function getOrders(){
    $orders=$this->hasMany(Order::className(),['customer_id'=>'id'])
        ->asArray()->all();
    return $orders;
}
}