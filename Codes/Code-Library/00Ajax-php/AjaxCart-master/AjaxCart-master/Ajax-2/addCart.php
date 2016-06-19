<?php
    //���빺�ﳵ����
    //1.���ܴ��ݹ�����post����
    $productid = intval($_POST['productid']);
    $num = intval($_POST['num']);
    //2.׼��Ҫ��ӵĹ��ﳵ����
    session_start();
    $userid = $_SESSION['memberid'];
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=imooc","root","root123",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $pdo->query("set names utf8");
        $sql = "select price from shop_product where id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($productid));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $price = $data['price'];
        $createtime = time();
        //3.��ɹ��ﳵ���ݵ���Ӳ������жϵ�ǰ�û��ڹ��ﳵ�����Ƿ��Ѿ��������Ʒ��
        $sql = "select * from shop_cart where productid=? and userid=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($productid,$userid));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data){
            $sql = "update shop_cart set num=num+? where userid=? and productid=?";
            $params = array($num, $userid, $productid);
        }else{
            $sql = "insert into shop_cart(productid,num,userid,price,createtime) values(?,?,?,?,?)";
            $params = array($productid, $num, $userid, $price, $createtime);
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->rowCount();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    //4.����������ӵĽ��
    if($rows){
        $response = array(
            'errno'     => 0,
            'errmsg'  => 'success',
            'data'      => true,
        );
    }else{
        $response = array(
            'errno'     => -1,
            'errmsg'   => 'fail',
            'data'       => false,
        );
    }
    
    echo json_encode($response);
    
    
    
    
    
    
    
    