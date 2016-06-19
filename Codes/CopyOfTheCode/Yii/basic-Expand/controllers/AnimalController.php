<?php
namespace app\controllers;
use yii\web\Controller;
use vendor\animal\Cat;
use vendor\animal\Mouse;
use vendor\animal\Dog;
use \yii\base\Event;
use app\behaviors\Behavior1;

class AnimalController extends Controller{
    public function actionIndex()
    {
        $cat=new Cat();
        $cat2=new Cat();
        $mouse=new Mouse();
        Event::on(Cat::className(),'miao',[$mouse,'run']);
//        $dog=new Dog();
//        $cat->on('miao',[$mouse,'run']);
//        $cat->on('miao',[$dog,'look']);
//        $cat->off('miao',[$dog,'look']);
        Event::on(Cat::className(),'miao',function(){
            echo "miao event has triggered <br />";
        });
        $cat->shout();
        $cat2->shout();

    }

    public function actionSecond(){
        \YII::$app->on(\yii\base\Application::EVENT_AFTER_REQUEST,function(){
            echo "event after request <br>";
        });
        echo "hello second";
    }

    public function actionThird(){
        $dog=new Dog();
        $dog->look();
        $dog->eat();
        $dog->trigger('wang');
    }

    public function actionFourth(){
        $dog=new Dog();
        $Behavior1=new Behavior1();
        $dog->attachBehavior('be1',$Behavior1);
        $dog->detachBehavior('be1');
        $dog->eat();

    }
}