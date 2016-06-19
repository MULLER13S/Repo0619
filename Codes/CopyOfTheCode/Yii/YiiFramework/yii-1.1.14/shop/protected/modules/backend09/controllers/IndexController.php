<?php
class IndexController extends Controller{

    function filters() {
        return array(
            'accessControl',
        );
    }

    function accessRules() {
        return array(
            array(
                'allow',
                'actions'=>array('head','left','right','index'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionHead(){
        $this->renderPartial('head');
    }

    public function actionLeft(){
        $this->renderPartial('left');
    }

    public function actionRight(){
        $this->renderPartial('right');
    }

    public function actionIndex(){
        $this->renderPartial('index');
    }



}