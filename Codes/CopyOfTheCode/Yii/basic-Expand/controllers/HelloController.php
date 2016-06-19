<?php
namespace app\controllers;
use yii\web\Controller;

class HelloController extends Controller{
    public function actionIndex()
    {
        //获取子模块
        $article=\YII::$app->getModule('article');
        //调用子模块的操作
        $article->runAction('default/index');

    }
}