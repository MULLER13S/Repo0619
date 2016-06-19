
<div class="header_bg_b">
    <div class="f_l" style="padding-left: 10px;">
        <img src="<?php echo IMG_URL; ?>biao6.gif" />
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
            当前位置: <a href="#">首页</a> <code>&gt;</code> 用户注册
        </div>
    </div>
    <div class="blank"></div>


    <!--放入view具体内容-->

    <div class="block box">

        <div class="usBox">
            <div class="usBox_2 clearfix">
                <div class="logtitle3"></div>
                <?php $form=$this->beginWidget('CActiveForm',array(

                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                ));?>
                <table cellpadding="5" cellspacing="3" style="text-align:left; width:100%; border:0;">
                        <tbody>
                        <tr>
                            <td style="width:13%; text-align: right;">
                                <?php echo $form->labelEX($user_model,'username');?>
                            </td>

                            <td style="width:87%;">
                                <?php echo $form->textField($user_model,'username',array('class'=>'inputBg','id'=>'User_username'));?>
                                <!--表单验证失败显示错误信息-->
                                <?php echo $form ->error($user_model,'username'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <?php echo $form ->labelEX($user_model,'password'); ?>
                            </td>

                            <td>
                                <?php echo $form->passwordField($user_model,'password',array('class'=>'inputBg','id'=>'User_password')); ?>
                                <?php echo $form ->error($user_model,'password'); ?>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">
                                <?php echo $form->label($user_model,'password2') ?>
                            </td>
                            <td>
                                <?php echo $form->passwordField($user_model,'password2',array('class'=>'inputBg','id'=>'User_password2')); ?>
                                <?php echo $form ->error($user_model,'password2'); ?>
                            </td>

                        </tr>
<!--                        <tr>-->
<!--                            <td align="right"><label for="User_password2">密码确认</label></td>-->
<!--                            <td>-->
<!--                                <input class="inputBg" size="25" name="User[password2]" id="User_password2" type="password" />-->
<!--                            </td>-->
<!---->
<!--                        </tr>-->
                        <tr>
                            <td align="right"><?php echo $form ->label($user_model,'user_email'); ?></td>
                            <td>
                                <?php echo $form->textField($user_model,'user_email',array('class'=>'inputBg','id'=>'User_user_email')); ?>
                                <?php echo $form->error($user_model,'user_email'); ?>
                            </td>
                        </tr>
                        <tr>

                            <td align="right"><?php echo $form ->label($user_model,'user_qq'); ?></td>
                            <td>
                                <?php echo $form->textField($user_model,'user_qq',array('class'=>'inputBg','id'=>'User_user_qq')); ?>
                                <?php echo $form->error($user_model,'user_qq'); ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><?php echo $form ->label($user_model,'user_tel'); ?></td>
                            <td>
                                <?php echo $form->textField($user_model,'user_tel',array('class'=>'inputBg','id'=>'User_user_tel','maxlength'=>11)); ?>
                                <?php echo $form->error($user_model,'user_tel'); ?>
                            </td>
                        </tr>
                        <tr>
                            <!--radioButtonList($model,$attribute,$data,$htmlOptions=array())-->
                            <td align="right"><?php echo $form ->label($user_model,'user_sex'); ?></td>
                            <td>
                                <?php echo $form->radioButtonList($user_model,'user_sex',$sex,array('separator'=>'&nbsp;'));?>
                                <?php echo $form->error($user_model,'user_sex'); ?>
                            </td>
                        </tr>
                        <tr>
                            <!--dropDownList($model,$attribute,$data,$htmlOptions=array())-->
                            <td align="right"><?php echo $form ->label($user_model,'user_xueli'); ?></td>
                            <td>
                                <?php echo $form -> dropDownList($user_model,'user_xueli',$xueli); ?>                      </td>
                            <?php echo $form->error($user_model,'user_xueli'); ?>
                        </tr>
                        <tr>
                            <!--checkBoxList($model,$attribute,$data,$htmlOptions=array())-->
                            <td align="right"><?php echo $form ->label($user_model,'user_hobby'); ?></td>

                            <td>
                                <?php echo $form -> checkBoxList($user_model,'user_hobby',$hobby,array('separator'=>'&nbsp;')); ?>
                                <font color="red"> <?php echo $form->error($user_model,'user_hobby'); ?></font>
                            </td>
                        </tr>
                        <tr>

                            <!--textArea($model,$attribute,$htmlOptions=array())-->
                            <td align="right"><?php echo $form ->label($user_model,'user_introduce'); ?></td>
                            <td>
                                <?php echo $form -> textArea($user_model,'user_introduce',array('cols'=>50,'rows'=>5)); ?>

                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>

                            <td align="left">
                                <input name="Submit" value="" class="us_Submit_reg" type="submit" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>

                <?php $this->endWidget(); ?>        </div>
        </div>
    </div>
    <!--放入view具体内容-->

</div>

