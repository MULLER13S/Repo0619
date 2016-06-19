<?php
//use yii\helpers\Html;
//use yii\helpers\HtmlPurifier;
//?>
<!--<h1>--><?//=Html::encode($view_hello);?><!--</h1>-->
<!--<h1>--><?//=HtmlPurifier::process($view_hello);?><!--</h1>-->
<!--<h1>-->
<!--    --><?//=$view_test[1]; ?>
<!--</h1>-->
<h1>good index</h1>
<?php $this->beginBlock('block1');?>
<h1>Block index;</h1>
<?php $this->endBlock();?>
<?php //echo $this->render('about',array('v_index'=>'excellent index'));
