<?php
namespace app\controllers;
use app\models\Customer;
use yii;
use yii\web\Controller;
use app\models\Test;

use app\models\Order;

class Hello1Controller extends Controller{
//    public function actionIndex(){
//        // 类的映射表机制
//       //\YII::$classMap['app\models\Order']='I:\WAMP\WWW\mooc_basic_2.0.3\basic\models\Order.php';
//        $order=new Order();
//        //组件的延迟加载  调用__get()方法；
//        $session=\YII::$app->session;
//    }

//    public function actionIndex(){
//        //获取缓存组件
//        $cache=\YII::$app->cache;
//        //往缓存中写数据；
//        //$cache->add('key1','hello world11',15);
//        //修改数据；
//        //$cache->set('key1','hello world22',15);
//        //读数据；
//        //$cache->delete('key1');
//       // $cache->flush();
//
//        $data=$cache['key1'];
//        print_r($data);
//    }

//public function actionIndex(){
//    $cache=\YII::$app->cache;
//    //$dependency=new \yii\caching\FileDependency(['fileName'=>'hw.txt']);
////$cache->add('file_key00','hello world',3000,$dependency);
//    //var_dump($cache['file_key00']);
//
//    //表达式依赖
////    $dependency=new \yii\caching\ExpressionDependency(
////        ['expression'=>'\YII::$app->request->get("name")']
////    );
////    $cache->add('file_key0','hello world',3000,$dependency);
////    var_dump($cache['file_key0']);
//
//    //DB
//    $dependency=new \yii\caching\DbDependency(
//        ['sql'=>'select count(*) from yii.order']
//    );
//    //$cache->add('db_key','hello world',3000,$dependency);
//    var_dump($cache['db_key']);
//

public function behaviors(){

//    return [
//        [
//            'class' => 'yii\filters\PageCache',
//            'only' => ['index','test'],
//            'duration' => 10,
//            'variations' => [
//                \Yii::$app->language,
//            ],
//
//        ],
//    ];
    return [
        [
            'class' => 'yii\filters\HttpCache',
            'only' => ['index1'],
            'lastModified' => function () {
                return filemtime('hw.txt');
                //return 1434817597;
            },
            'etagSeed'=>function(){
                $fp=fopen('hw.txt','r');
                $title=fgets($fp);
                fclose($fp);
                return $title;
                //return 'etagseed3';
            }
        ],
    ];


}

public function actionIndex(){
    //return $this->renderPartial('index');
    echo "123465";

}public function actionTest(){

    echo "124656465";

}

    public function actionIndex1(){
        $content=file_get_contents('hw.txt');
        return $this->renderPartial('index1',['new'=>$content]);
    }
}