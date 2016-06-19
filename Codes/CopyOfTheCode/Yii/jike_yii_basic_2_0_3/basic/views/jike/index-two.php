<?php
use yii\helpers\Html;
?>
<ul>
    <li><label>Name</label>:<?=Html::encode($model->name)?></li>
    <li><label>Email</label>:<?=Html::encode($model->email)?></li>
    <li><label>sex</label>:<?=Html::encode($model->sex)?></li>
    <li><label>edu</label>:<?=Html::encode($model->edu)?></li>
    <li><label>hobby</label>:<?php
        $model->hobby=implode(',',$model->hobby);echo Html::encode($model->hobby);?></li>
    <li><label>pass</label>:<?=Html::encode($model->pass)?></li>
    <li><label>info</label>:<?=Html::encode($model->info)?></li>
</ul>

<?php


?>
