<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\EntryForm;

class SayController extends Controller{
    function actionSay($message='hello'){
//        echo "<h1>TODAY IS FRIDAY</h1><br/>";
//        echo "<h1>TODAY IS FRIDAY</h1><br/>";
//        echo "<h1>TODAY IS FRIDAY</h1><br/>";
//        echo "<h1>TODAY IS FRIDAY</h1><br/>";
//        echo "<h1>TODAY IS FRIDAY</h1><br/>";

        return $this->render('say',['message'=>$message]);
    }

    function actionForm(){
        $model=new EntryForm();
        $model->name='Zhangsan';
        $model->email='bad';
        if($model->validate()){
            echo "aaaaaaaassssuccess0000";
        }else{
            echo "fail"."<br/>";
             print_r($model->getErrors());
        }
    }

    public function actionEntry()
    {
        $model = new EntryForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据

            // 做些有意义的事 ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }
}