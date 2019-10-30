<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Banner;
use common\models\Movie;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'type')->dropDownList(Banner::bannerType(),['prompt' => '请选择类型']) ?>

        <?= $form->field($model, 'img')->widget('common\widgets\file_upload\FileUpload') ?>

        <?= $form->field($model, 'position')->input('number') ?>

        <?= $form->field($model, 'movie_id')->dropDownList(Movie::find()->select(['name', 'id'])->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['prompt' => '请选择电影','class' => 'select2', 'style' => 'width: 100%;', 'data-placeholder' => "请选择电影"]) ?>

</div>

<div class="box-footer">
    <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
    <?= Html::a('取 消',['index'], ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
    window.onload = function() {
        //Initialize Select2 Elements
        $('.select2').select2();
    }

</script>
