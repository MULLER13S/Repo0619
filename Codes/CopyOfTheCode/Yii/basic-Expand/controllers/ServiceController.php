<?php
namespace app\controllers;
use \yii\web\Controller;
use \yii\di\Container;
use \yii\di\ServiceLocator;

class ServiceController extends Controller{
    public function actionIndex(){
        \YII::$container->set('app\controllers\Driver','app\controllers\ManDriver');
        $sl=new ServiceLocator();
        $sl->set('car',[
           'class'=>'app\controllers\Car'
        ]);
        $car=$sl->get('car');
        $car->run();

    }
}

interface Driver{
    public function drive();
}

class ManDriver implements Driver{
    public function  drive(){
        echo "i am an old driver";

    }
}
class Car{
    private $driver=null;
    public function __construct(Driver $driver){
        $this->driver=$driver;

    }
    public function run(){
        $this->driver->drive();
    }
}