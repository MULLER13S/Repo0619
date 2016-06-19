<?php
//定义面包屑变量；
$this -> breadcrumbs = array(
    '用户中心'=>array('user/center'),
    '用户登录'=>array('user/login'),
);
?>

<style type="text/css">
    div.errorMessage{color:red}
    label  .required{color:red}
</style>
<div class="header_bg_b">
    <div class="f_l" style="padding-left: 10px;">
        <img src="<?php echo IMG_URL; ?>biao6.gif">
        北京市区，现在下单(截至次日00:30已出库)，<b>明天上午(9-14点)</b>送达 <b>免运费火热进行中！</b>
    </div>

    <div class="f_r" style="padding-right: 10px;">
        <img style="vertical-align: middle;" src="<?php echo IMG_URL; ?>biao3.gif">

                    <span class="cart" id="ECS_CARTINFO">
                        <a href="#" title="查看购物车">您的购物车中有 0 件商品，总计金额 ￥0.00元。</a></span>
        <a href="#"><img style="vertical-align: middle;" src="<?php echo IMG_URL; ?>biao7.gif"></a>
    </div>
</div>

<div class="block block1">
    <div class="block box">
        <div class="blank"></div>
        <div id="ur_here">

            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'homeLink'=>CHtml::link('首页',Yii::app()->homeUrl),
                    'links'=>$this->breadcrumbs,
                    'separator'=>' &gt; ',
                )); ?><!-- breadcrumbs -->
            <?php endif?>
<!--            当前位置: <a href="#">首页</a> <code>&gt;</code> 用户中心-->
        </div>
    </div>
    <div class="blank"></div>

    <div class="block box">

        <div class="usBox clearfix">
            <div class="usBox_1 f_l">
                <div class="logtitle"></div>
                <?php $form=$this->beginWidget('CActiveForm');?>
                    <table align="left" border="0" cellpadding="3" cellspacing="5" width="100%">
                        <tbody><tr>
                            <td align="right" width="25%">

                                <?php echo $form->labelEx($user_login,'username'); ?>
                            </td>
                            <td width="75%">
                                <?php echo $form->textField($user_login,'username',array('size'=>25,'class'=>'inputBg')); ?>
                                <?php echo $form->error($user_login,'username'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <?php echo $form->labelEx($user_login,'password'); ?>
                            </td>
                            <td>
                                <?php echo $form->textField($user_login,'password',array('size'=>15,'class'=>'inputBg')); ?>
                                <?php echo $form->error($user_login,'password'); ?>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">
                                <?php echo $form->labelEx($user_login, 'verifyCode'); ?>
                            </td>
                            <td>
                                <?php echo $form->textField($user_login, 'verifyCode',array('size'=>15,'class'=>'inputBg','maxlength'=>8)); ?>
                                <!--显示验证码图片/使用小物件显示验证码-->
                                <?php $this -> widget('CCaptcha'); ?>
                                <?php echo $form->error($user_login,'verifyCode'); ?>

<!--                        <tr>-->
<!--                            <td colspan="2"><input value="1" name="remember" id="remember" type="checkbox" />-->
<!--                                <label for="remember">请保存我这次的登录信息。</label></td>-->
<!--                        </tr>-->
                        <tr>
                            <td align="right">
                                <?php echo $form->checkBox($user_login, 'rememberMe'); ?>
                            </td>
                            <td>
                                <?php echo $form->labelEx($user_login, 'rememberMe'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="left">
                                <input name="act" value="act_login" type="hidden" />
                                <input name="back_act" value="./index.php" type="hidden" />
                                <input name="submit" value="" class="us_Submit" type="submit" />
                            </td>
                        </tr>
                        <tr><td></td><td><a href="#" class="f3">密码问题找回密码</a>&nbsp;&nbsp;&nbsp;<a href="#" class="f3">注册邮件找回密码</a></td></tr>
                        </tbody></table>
                <?php $this->endWidget();?>
                <div class="blank"></div>
            </div>
            <div class="usTxt">
                <div class="regtitle"></div>
                <div style="padding-left: 50px;">
                    <strong>如果您不是会员，请注册</strong>  <br />
                    <strong class="f4">友情提示：</strong><br />
                    不注册为会员也可在本店购买商品<br />
                    但注册之后您可以：<br />
                    1. 保存您的个人资料<br />
                    2. 收藏您关注的商品<br />
                    3. 享受会员积分制度<br />
                    4. 订阅本店商品信息  <br />
                    <a href="#"><img src="<?php echo IMG_URL; ?>bnt_ur_reg.gif"></a>
                </div>
            </div>
        </div>
    </div>
</div>
