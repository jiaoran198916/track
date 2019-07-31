<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Country;

?>

<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList(Country::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择国家']) ?>

</div>

<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
    <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
</div>

<?php ActiveForm::end(); ?>
