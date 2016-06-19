<?php

class GoodsController extends Controller {
    /*
    * 通过用户访问控制过滤实现页面缓存
    * 过滤器：
    *  accessControl 是方法过滤器
    *  array()       是类过滤器
    */
//    function filters(){
//        return array(
//            array(
//                'system.web.widgets.COutPutCache+detail',
//                'duration'=>1800,
//                'varyByParam'=>array('id')
//            ),
//        );
//    }


    /*
     * 商品列表页面
     */
    function actionCategory(){
        $goods_model=Goods::model();

        //1. 获得全部记录数目
        $total = $goods_model->count();
        $per = 8;

        //2. 实例化分页类对象
        $page = new Pagination($total, $per);

        //3. 重新拼装具体的sql语句，有limit关键字
        $sql = "select * from {{goods}} {$page -> limit}";

        //4. 执行sql语句获得每页数据
        $goods_infos = $goods_model -> findAllBySql($sql);

        //5. 获得页码列表
        $page_list = $page -> fpage();


        //渲染视图
        //render() 带布局渲染
        //renderPartial()  部分渲染
        $this -> render('category',array('goods_infos'=>$goods_infos,'page_list'=>$page_list));
    }

    /*
     * 商品详细页面
     */
    function actionDetail($id){

       // $goods_info=Goods::model()->findByPk($id);
        $goods_info=Goods::model()->getGoodsInfoByPk($id);
        $this ->render('detail',array('goods_info'=>$goods_info));
    }

    function actionHuan1(){
        //设置变量缓存
        Yii::app()->cache->set('username','zhangsan',3600);
        Yii::app()->cache->set('useraddr','beijing',3600);
        Yii::app()->cache->set('hobby','lanqiu',3600);
        echo "set cache is ok";
    }
    function actionHuan2(){
        //使用变量缓存
        echo Yii::app()->cache->get('username'),"<br />";
        echo Yii::app()->cache->get('useraddr'),"<br />";
        echo Yii::app()->cache->get('hobby'),"<br />";
        echo "use cache is ok";
    }

    function actionHuan3(){
        //删除缓存变量
        //Yii::app()->cache->delete('username');
        //清空缓存变量，也可以删除片段缓存或文件缓存
        //
        Yii::app()->cache->flush();
        //Yii::app()->cache->delete('username');
    }

    function actionCat(){
        $sql="select * from {{goods}}";
        $d_obj=Yii::app()->db->createCommand($sql);
        //$data_obj=$d_obj->query();
        //
        //var_dump($data_obj);
        $info=$d_obj->queryColumn();
        var_dump($info);

    }

    function actionCat2(){
        $sql = "insert into {{goods}} (goods_name,goods_price) values ('htcone',299)";
        $d_obj = Yii::app()->db -> createCommand($sql);
        $name = "apple678";
        $price = 5050;
        //把定义的两个变量绑定到占位符里边
//        $d_obj -> bindParam(':name',$name,PDO::PARAM_STR);
//        $d_obj -> bindParam(':price',$price,PDO::PARAM_INT);
        $d_obj -> execute();


/*
        $name = "诺基亚678";
        $price = 3999;
        //把定义的两个变量绑定到占位符里边
        $d_obj -> bindParam(':name',$name,PDO::PARAM_STR);
        $d_obj -> bindParam(':price',$price,PDO::PARAM_INT);
        $d_obj -> execute();
*/
//        $num = $d_obj -> execute();  //会返回当前受影响的记录数目
//
//        //可以使用PDO预处理方式实现信息添加
//        $sql = "insert into {{article}} (article_title,article_content) values (:title,:content) ";
//        $command = $connection -> createCommand($sql);
//        $title = "rr";
//        $content = "rr";
//        $command ->bindParam(":title", $title, PDO::PARAM_STR);
//        $command ->bindParam(":content", $content, PDO::PARAM_STR);
//        $rowCount = $command -> execute();


    }




}