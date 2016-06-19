<?php
class GoodsController extends Controller{
    public function filters(){
        return array(
            'accessControl',
        );
    }

    public function accessRules(){
        return array(

            //用户访问控制扩展
            //add 方法可以被无条件访问(无论登录与否都可以访问)
            array(
                'allow',
                'actions'=>array('add'),
                'users'=>array('*'),
            ),

            //具体指定"用户"可以删除信息
            //linken zhangsan  lisi 这个三个用户都可以进行删除操作
            array(
                'allow',
                'actions'=>array('del'),
                'users' => array('linken','zhangsan','lisi'),
            ),

            //匿名用户操作 ?
            //有的控制器是匿名用户可以访问，已经登录系统用户是禁止访问的
            //update  这个方法是匿名用户可以访问
            array(
                'allow',
                'actions'=>array('update'),
                'users'=>array('?'),
            ),

            array(
                'allow',
                'actions'=>array('show'),
                'users'=>array('@'),
            ),
            array(
                'deny',
                //'actions'=>array(''),
                'users'=>array('*'),
            ),
        );
    }

    public function actionShow(){
        $goods_model=Goods::model();


//        $goods_infos=$goods_model->find();
        //$goods_infos=$goods_model->findAll();

        $sql = "select goods_id,goods_name,goods_price,goods_create_time from {{goods}} limit 100";
        $goods_infos = $goods_model ->findAllBySql($sql);
        $this->renderPartial('show',array('goods_infos'=>$goods_infos));
        // foreach($goods_infos as $a=>$_v){
        // $_v锟斤拷锟角憋拷锟斤拷锟斤拷锟斤拷锟侥撅拷锟斤拷锟斤拷锟�
//                echo $a,$_v->goods_name,"----",$_v->goods_price,"<br />";
//            }
//
//        var_dump($goods_infos);
    }

    public function actionShow1(){
        $goods_model=Goods::model();
        $cnt=$goods_model->count();
        $per=6;
        $page=new Pagination($cnt,$per);

        $sql="select * from {{goods}} $page->limit";

        $goods_infos=$goods_model->findAllBySql($sql);
        $page_list=$page->fpage(array(3,4,5,6,7,8));

        //$goods_infos=$goods_model->findAll();
        $this->renderPartial('show',array('goods_infos'=>$goods_infos,'page_list'=>$page_list));
    }

    public function actionAdd(){
        $goods_model=new Goods();
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";

        if(isset($_POST['Goods'])) {
            //锟斤拷锟斤拷要锟窖从憋拷锟结交锟斤拷锟斤拷锟斤拷锟斤拷锟捷革拷锟斤拷$goods_model模锟斤拷锟斤拷锟�
//            $goods_model->goods_name = $_POST['Goods']['goods_name'];
//            $goods_model->goods_price = $_POST['Goods']['goods_price'];
//            $goods_model->goods_number = $_POST['Goods']['goods_number'];
//            $goods_model->goods_category_id = $_POST['Goods']['goods_category_id'];
//            $goods_model->goods_brand_id = $_POST['Goods']['goods_brand_id'];
//            $goods_model->goods_introduce = $_POST['Goods']['goods_introduce'];
//            $goods_model->goods_weight = $_POST['Goods']['goods_weight'];
            foreach($_POST['Goods'] as $key=>$val){
                $goods_model->$key=$val;
            }
            $goods_model->goods_create_time=time();
            if($goods_model->save()){
                //设置添加商品成功提示信息
                Yii::app()->user->setFlash('success','增加商品成功');

                $this->redirect('./index.php?r=backend09/goods/show');
            }

        }

        $this->renderPartial('add',array('goods_model'=>$goods_model));
    }

    public function actionDel($id){
        echo $id,'has deleted';exit;
        $goods_model=Goods::model();
        $goods_info=$goods_model->findByPk($id);

        if($goods_info->delete()){
            $this->redirect('./index.php?r=backend09/goods/show');
        }
    }
    public function actionUpdate($id){
        $goods_model= Goods::model();
        $goods_info=$goods_model->findByPk($id);

        if(isset($_POST['Goods'])){
            foreach($_POST['Goods'] as $_k => $_v){
                $goods_info -> $_k = $_v;
            }

            if($goods_info -> save())
                $this -> redirect('./index.php?r=backend09/goods/show');
        }


        $this->renderPartial('update',array('goods_model'=>$goods_info));
    }

    public function actionJia(){
        $goods_model=new Goods();
        $goods_model -> goods_name = "Apple 6s";
        $goods_model -> goods_price = 8899;
        $goods_model -> goods_weight = 102;

        if($goods_model->save()){
            echo "success";
        }else{
            echo 'fail';
        }

    }

    public function actionCeshi(){
        $model= Goods::model();
        //$info=$model->findAllByPk(array(1,12,25));
        //var_dump($info);
        //$infos = $model -> findAll("goods_name like 'A%' and goods_price>500");
        $infos = $model -> findAll(array(
            'select'=>'goods_name,goods_price',
            'condition'=>"goods_name like 'A%'",
            'order'=>'goods_price desc',
            'limit'=>2,
            'offset'=>1,
        ));


        $this->renderPartial('show',array('goods_infos'=>$infos));

    }
}