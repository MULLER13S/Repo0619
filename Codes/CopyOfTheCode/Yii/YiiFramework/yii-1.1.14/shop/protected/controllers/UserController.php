<?php
class UserController extends Controller{
    public function actionLogin(){

        echo $this -> id."<br />";
        echo $this -> action->id;
        $user_login=new LoginForm();
        if(isset($_POST['LoginForm'])){
            //收集表单信息
            $user_login->attributes = $_POST['LoginForm'];

            //校验数据,走的是rules()方法
            //该地方不只校验用户名和密码是否填写，还要校验真实性(在模型里边自定义方法校验真实性)
            //用户信息进行session存储，调用模型里边的一个方法login()，就可以进行session存储

            if($user_login->validate()&&$user_login->login() ){

                $this->redirect('./index.php?r=index/index');
            }

        }


        $this->render('login',array('user_login'=>$user_login));
    }

    public function actionRegister(){
        $user_model=new User();
        $sex[1] = "男";
        $sex[2] = "女";
        $sex[3] = "保密";

        $xueli[1] = "-请选择-";
        $xueli[2] = "小学";
        $xueli[3] = "初中";
        $xueli[4] = "高中";
        $xueli[5] = "大学";

        $hobby[1] = "篮球";
        $hobby[2] = "足球";
        $hobby[3] = "排球";
        $hobby[4] = "棒球";


        if(isset($_POST['User'])) {

            if(is_array($_POST['User']['user_hobby']))
                $_POST['User']['user_hobby'] = implode(',',$_POST['User']['user_hobby']);
//           foreach ($_POST['User'] as $_k => $_v)
//           {
//               if(is_array($_v)){
//               $user_model->$_k =serialize($_v);
//            }
//                   else{
//                   $user_model->$_k = $_v;
//
//
//               }
//           }
//                $user_model->$_k = $_v;
//            }


            $_POST['User']['password'] = md5($_POST['User']['password']);
            $_POST['User']['password2'] = md5($_POST['User']['password2']);
            $user_model -> attributes = $_POST['User'];
//            print_r($user_model -> attributes);exit;
            if($user_model -> save()) {

                $this->redirect('./index.php?r=index/index');
            }
        }

        $this->render('register',array('user_model'=>$user_model,'sex'=>$sex,'xueli'=>$xueli,'hobby'=>$hobby));
    }

    function actionLogout(){
        //删除session信息
       // Yii::app()->session->clear();  //删除内存里边sessiion变量信息
       // Yii::app()->session->destroy(); //删除服务器的session文件

        //session和cookie一并删除
        Yii::app()->user->logout();

        $this->redirect('./index.php?r=user/login');
    }

    function actions(){
        return array(
            'captcha'=>array(
                'class'=>'system.web.widgets.captcha.CCaptchaAction',
                'width'=>85,
                'height'=>40,


            ),

        );
    }

    function actionS1(){
        //设置session,通过session组件来设置
        Yii::app()->session['username'] = "zhangsan";
        Yii::app()->session['useraddr'] = "beijing";
        echo "make session success";
    }

    function actionS2(){
        //使用session
        echo Yii::app()->session['username'],"<br />";
        echo Yii::app()->session['useraddr'];
        echo "use session success";
    }

    function actionS3(){
        //删除一个session
        //unset(Yii::app()->session['useraddr']);

        //删除全部session
        Yii::app()->session->clear();  //删除session变量
        Yii::app()->session->destroy(); //删除服务器的session信息
    }

    function actionC1(){
        $ck=new CHttpCookie('hobby','足球,篮球');
        $ck->expire=time()+3600;
        Yii::app()->request->cookies['hobby']=$ck;

        $ck2 = new CHttpCookie('sex','nan');
        $ck2 -> expire = time()+3600;
        //把$ck对象放入cookie组件里边
        Yii::app()->request->cookies['sex'] = $ck2;
        echo "set cookie success ";


    }

    function actionC2(){
        //访问cookie
        echo Yii::app()->request->cookies['hobby'],"<br />";
        echo Yii::app()->request->cookies['sex'];
    }

    function actionC3(){
        //删除cookie
        unset(Yii::app()->request->cookies['sex']);
    }

    function actionLu(){
        echo Yii::getPathOfAlias('system').'<br>';
        echo Yii::getPathOfAlias('system.web').'<br>';
        echo Yii::getPathOfAlias('application').'<br>';
        echo Yii::getPathOfAlias('zii').'<br>';
        echo Yii::getPathOfAlias('webroot').'<br>';

    }

    /*
    * 使用Yii::app()调用相关属性、方法
    */
    function actionAp(){
        echo Yii::app()->defaultController,"<br />";
        echo Yii::app()->layout,"<br />";
        echo Yii::app()->name,"<br />";
        echo Yii::app()->charset,"<br />";
        echo Yii::app()->getLayoutPath(),"<br />";
        echo Yii::app()->request->getUrl(),"<br />";
        echo Yii::app()->request->getHostInfo(),"<br />";
    }

    function actionTime(){
        //查看脚本开始时间
        Yii::beginProfile('mytime');
        for($i=0; $i<=150; $i++){
            if($i%7==0)
                echo "seven<br />";
            else if($i%8==0)
                echo "eight<br />";
            else
                echo $i."<br />";
        }
        Yii::endProfile('mytime');
    }



}