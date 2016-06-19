<?php

class ManagerController extends Controller{
    public function actionLogin(){
        $login_model=new LoginForm();
        if(isset($_POST['LoginForm'])){
            $login_model->attributes = $_POST['LoginForm'];

            //用户名和密码(包括真实性)判断validate，持久化session信息login
            if($login_model->validate() &&  $login_model->login())
                //echo "login success";
                $this->redirect('./index.php?r=backend09/index/index');
        }




        $this->renderPartial('login',array('login_model'=>$login_model));
    }

    public function actionLogout(){
        Yii::app()->session->clear();

        //删除服务器session信息
        Yii::app()->session->destroy();

        //页面重定向到登录页面
        $this -> redirect('./index.php?r=backend09/manager/login');
    }

}