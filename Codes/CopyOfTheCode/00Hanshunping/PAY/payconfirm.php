<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=gb2312" />
</head>
<?php
include_once 'common.php';
//获取支付请求信息
$p0_Cmd="Buy";
$p1_MerId="10012006921";//商户编号(测试帐号)
$p2_Order=$_POST['p2_Order'];
$p3_Amt=$_POST['p3_Amt'];//支付金额，请务必注意金额;
$p4_Cur="CNY";
$p5_Pid="";
$p6_Pcat="";
$p7_Pdesc="";
$p8_Url="http://localhost:80/Hanshunping/PAY/res.php";
$p9_SAF="0";
$pa_MP="";
$pd_FrpId=$_POST['pd_FrpId'];
$pr_NeedResponse="1";
/*
hmac是一种对称密钥验证算法。
通过请求参数拼接的字符串和贵公司在易宝支付的密钥生成。作用是防止恶意篡改请求数据。
*/
$data="";
$data=$data.$p0_Cmd;
$data=$data.$p1_MerId;
$data=$data.$p2_Order;
$data=$data.$p3_Amt;
$data=$data.$p4_Cur;
$data=$data.$p5_Pid;
$data=$data.$p6_Pcat;
$data=$data.$p7_Pdesc;
$data=$data.$p8_Url;
$data=$data.$p9_SAF;
$data=$data.$pa_MP;
$data=$data.$pd_FrpId;
$data=$data.$pr_NeedResponse;

$Merchantkey="qV490l4XHJ6Dc32Zu7x90V43gVP4C5061938W01t47S1AY734Dcr27011546";
$hmac=HmacMd5($data,$Merchantkey);

?>
您的订单号为: <?php echo $p2_Order; ?>  支付金额为:<?php echo $p3_Amt;?>
<!--把隐藏域中的内容发送到易宝网关，对其进行支付请求-->
<form action="https://www.yeepay.com/app-merchant-proxy/node" method="post">
    <input type="hidden" name="p0_Cmd" value="<?php echo $p0_Cmd;?>"/>
    <input type="hidden" name="p1_MerId" value="<?php echo $p1_MerId;?>"/>
    <input type="hidden" name="p2_Order" value="<?php echo $p2_Order;?>"/>
    <input type="hidden" name="p3_Amt" value="<?php echo $p3_Amt;?>"/>
    <input type="hidden" name="p4_Cur" value="<?php echo $p4_Cur;?>"/>
    <input type="hidden" name="p5_Pid" value="<?php echo $p5_Pid;?>"/>
    <input type="hidden" name="p6_Pcat" value="<?php echo $p6_Pcat;?>"/>
    <input type="hidden" name="p7_Pdesc" value="<?php echo $p7_Pdesc;?>"/>
    <input type="hidden" name="p8_Url" value="<?php echo $p8_Url;?>"/>
    <input type="hidden" name="p9_SAF" value="<?php echo $p9_SAF;?>"/>
    <input type="hidden" name="pa_MP" value="<?php echo $pa_MP;?>"/>
    <input type="hidden" name="pd_FrpId" value="<?php echo $pd_FrpId;?>"/>
    <input type="hidden" name="pr_NeedResponse" value="<?php echo $pr_NeedResponse;?>"/>
    <input type="hidden" name="hmac" value="<?php echo $hmac;?>"/>
    <input type="submit" value="确认支付"/>
</form>
</html>