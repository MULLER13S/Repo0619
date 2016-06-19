<?php
namespace app\controllers;
use app\models\Customer;
use yii;
use yii\web\Controller;
use app\models\Test;

use app\models\Order;

class HelloController extends Controller{
//    function actionIndex(){
//        $request=yii::$app->request;
//        //echo $request->get('id',22);
//        $request->post('id',3333);
//        if($request->isGet){
//            echo "this is get method";
//        }if($request->isPost){
//            echo "this is get method";
//        }
//
//        echo $request->userIP;
//        echo "hello";
//    }
/*
public function actionIndex(){
    $res=yii::$app->response;
   // $res->statusCode='404';
//    $res->headers->add('Pragma','no-cache');
//    $res->headers->set('Pragma','max-age=12');
//    $res->headers->add('location','http://www.hao123.com');
//    $this->redirect('http://www.baidu.com',302);
//    $res->headers->add('content-disposition','attachment;filename="a.txt"');
    $res->sendFile('robots.txt');

}
*/
/*
 function actionIndex(){
     $session=yii::$app->session;
     $session->open();
//     if($session->isActive){
//         echo "session is active";
//     }
//     $session->set('user','bill');
//     echo $session->get('user');
     $session->remove('user');
 }
*/
/*
    function actionIndex(){
        //数据传递；
        $hello_str="hello god <script>alert(3333);</script>";
        $data=array();
        $data['view_hello']=$hello_str;
        $test_arr=array('mario','luna','jimmy');
        $data['view_test']=$test_arr;
        return $this->renderPartial('index',$data);
    }
*/
    //布局文件；
//    public $layout='common';
//    function actionIndex(){
//
//        return $this->render('about');
//    }
/*
public function actionIndex(){
    //$id='1 or 1=1 ';
   // $sql="select * from test where id=$id";
    //使用占位符：防止SQL注入；
   // $sql="select * from test where id=:id";
   // $res=Test::findBySql($sql,array(':id'=>$id))->all();
    //$res=Test::findBySql($sql)->all();
    //查询数据；
    //$res=Test::find()->where(['id'=>1])->all();
    //查询ID>0;
    //$res=Test::find()->where(['>','id',0])->all();

    //id>=1,id<=2;
//    $res=Test::find()->where(['between','id',1,2])->all();
    //title like %title%;
   // $res=Test::find()->where(['like','title','title1'])->all();


    //默认为对象，将查询结果转化为数组；
    //$res=Test::find()->where(['like','title','title1'])->asArray()->all();

    //批量查询；
    foreach(Test::find()->batch(1) as $tests){
        print_r(count($tests));
    }
    //$res=Test::find()->where(['like','title','title1'])->asArray()->all();
   // print_r($res);
}
*/
/*
    function actionIndex(){
        $res=Test::find()->where(['id'=>1])->all();
        //删除数据；
        $res[0]->delete();

        Test::deleteAll();
        Test::deleteAll('id>:id',array(':id'=>2));

    }
*/

//    function actionIndex(){
//        //添加数据；
//        $test=new Test();
//        $test->id=8;
//        $test->title='kobe';
//        $test->validate();
//        if($test->hasErrors()){
//            echo "ERROR!!!!!";
//            die;
//        }
//        $test->save();
//    }

//    function actionIndex(){
//        //修改数据；
//        $test=Test::find()->where(['id'=>4])->one();
//        $test->title='oneal';
//        $test->save();
//    }

    function actionIndex(){
        //关联查询；
        //$customer=Customer::find()->where(['name'=>'zhangsan'])->one();
        //$orders=$customer->hasMany('app\models\Order',['customer_id'=>'id'])
          //  ->asArray()->all();
        //$orders=$customer->hasMany(Order::className(),['customer_id'=>'id'])
           // ->asArray()->all();
       // $orders=$customer->getOrders();

        //customer中没有定义Orders属性，php会自动调用__get()方法-->getOrders（）方法；
        //后面还会自动跟all()方法；
        //$orders=$customer->Orders;


        //---------------
        $order=Order::find()->where(['id'=>3])->one();
        $customer=$order->customer;
        print_r($customer);
        //print_r($orders);

    }

    function actionIndex1(){
        //关联查询结果缓存；
        $customer=Customer::find()->where(['name'=>'zhangsan'])->one();
        $orders=$customer->Orders;//select * from order where customer_id...
    unset($customer->Orders);
        $orders2=$customer->Orders;

        //关联查询的多次查询；
        //select * from customer;
        //select * from order where customer_id in .......
        $customers=Customer::find()->with('orders')->all();
        foreach($customers as $customer2){
            $orders1=$customer2->Orders;
        }


    }

}