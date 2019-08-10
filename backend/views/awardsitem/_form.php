<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Awardsitem */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .fa-certificate{
        margin-left: 5px;
        font-size: 10px;
        color: red;
    }
</style>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

    <input type="hidden" id="awardsitem-id" name="Awardsitem[id]" value="<?= $model->id? $model->id: 0?>">

    <?= $form->field($model, 'awards_id')->dropDownList(\common\models\Awards::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'data-placeholder' => "选择奖项"]) ?>

    <?= $form->field($model, 'idx')->textInput() ?>

    <?= $form->field($model, 'year', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->dropDownList(\common\models\Movie::getYearData(),['class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'city_id')->dropDownList(\common\models\City::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'data-placeholder' => "选择城市"]) ?>

    <?= $form->field($model, 'pic')->widget('common\widgets\file_upload\FileUpload') ?>

</div>

<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
    <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
    window.onload = function() {
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            // $('#master-desc').wysihtml5()
            $('.select2').select2()
        })
    }
</script>
