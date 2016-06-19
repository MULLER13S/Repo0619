<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form=ActiveForm::begin();?>
<?=$form->field($model,'name')->textInput(['style'=>'width:200px']) ?>
<?=$form->field($model,'pass')->passwordInput(['style'=>'width:200px;'])?>
<?=$form->field($model,'email')->textInput(['style'=>'width:200px']) ?>
<?=$form->field($model,'sex')->radioList(['0'=>'男','1'=>'女']) ?>
<?=$form->field($model,'edu')->dropDownList(['0'=>'大学','1'=>'中学','2'=>'小学'],['style'=>'width:200px;']) ?>
<?=$form->field($model,'hobby')->checkboxList(['basketball'=>'篮球','soccer'=>'足球']
    ) ?>
<?=$form->field($model,'info')->textarea(['rows'=>5,'style'=>'width:600px']) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<?php $form=ActiveForm::end(); ?>
