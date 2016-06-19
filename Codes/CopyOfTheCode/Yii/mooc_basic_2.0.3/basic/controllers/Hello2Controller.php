<?php
namespace app\controllers;
use app\models\Customer;
use yii;
use yii\web\Controller;
use app\models\Test001;

use app\models\Order;

class Hello2Controller extends Controller{
    public function actionIndex(){
        $test=new Test001();
        $test->id=16;
        //$test->title=4;
        $test->save();
        print_r($test->getErrors());

    }

}