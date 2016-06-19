<?php
namespace app\controllers;
use \yii\web\Controller;
use \yii\di\Container;
use \yii\di\ServiceLocator;

class InjectController extends Controller{
    public function actionIndex(){
        $container=new Container();
        $container->set('app\controllers\Driver','app\controllers\ManDriver');
        //$driver=new ManDriver();
        //$car=new Car($driver);
        $car=$container->get('app\controllers\Car');
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