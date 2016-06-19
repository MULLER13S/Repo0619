<?php


class Goods extends CActiveRecord{
    public static function model($className = __CLASS__){
        return parent::model($className);

    }
    public function tableName(){
        return '{{goods}}';

    }

    function attributeLabels() {
        return array(
            'goods_name'=>'商品名称',
            'goods_weight'=>'重量',
            'goods_price'=>'价格',
            'goods_number'=>'数量',
            'goods_category_id'=>'分类',
            'goods_brand_id'=>'品牌',
            'goods_introduce'=>'简介',
        );
    }

    function getGoodsInfoByPk($id){
        //把获得的具体详细商品信息存入缓存，下次再来获得信息就去缓存读取
        $info = Yii::app()->cache->get('goods_info'.$id);//获得缓存信息

        //判断缓存信息有无
        if(!empty($info))
            return $info;

        $sql = "select * from {{goods}} where goods_id='$id'";
        $goods_info = $this->findBySql($sql);


        //设置缓存
        Yii::app()->cache->set('goods_info'.$id,$goods_info,3600);

        return $goods_info;
    }


}