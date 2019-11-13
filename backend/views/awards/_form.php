<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\Awards */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic')->widget('common\widgets\file_upload\FileUpload') ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city_id')->dropDownList(City::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'data-placeholder' => "选择城市"]) ?>

    <?= $form->field($model, 'item_id')->dropDownList(Yii::$app->params['awardsItems'],['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择子奖项"]) ?>

</div>

<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
    <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
    window.onload = function() {
        $(function () {
            $('.select2').select2()
        })
    }
</script>
