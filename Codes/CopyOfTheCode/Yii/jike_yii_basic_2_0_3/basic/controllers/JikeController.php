<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\JikeForm;
use app\models\People;
use yii\data\Pagination;

class JikeController extends Controller{
    public function actionIndex(){
        $model=new JikeForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            return $this->render('index-two',['model'=>$model]);
        }else{
            return $this->render('index',['model'=>$model]);
        }
    }

    public function actionPeople(){
        $query=People::find();
        $pagination=new Pagination([
            'defaultPageSize'=>3,
            'totalCount'=>$query->count()


        ]);
        $people=$query->orderBy('name')->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('people',[
            'people'=>$people,
        'pagination'=>$pagination,
        ]);
    }



}