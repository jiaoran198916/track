<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Master;
use common\models\User;
use common\models\Movie;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form'], 'action' => \yii\helpers\Url::to(['create'])]); ?>
<div class="box-body">

    <input type="hidden" id="movie-id" name="Movie[id]" value="<?= $model->id? $model->id: 0?>">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'foreign_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cover')->widget('common\widgets\file_upload\FileUpload') ?>

    <?= $form->field($model, 'year')->dropDownList(Movie::getYearData(),['class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'musician_id')->dropDownList(Master::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择音乐作者"]) ?>

    <?= $form->field($model, 'director_id')->textInput() ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'duration')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'douban_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['username', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者', 'class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'status')->dropDownList(Yii::$app->params['movieStatus'],['prompt' => '请选择状态']) ?>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-primary"><?= $model->isNewRecord ? '新 增' : '修 改' ?></button>
    <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
</div>
<?php ActiveForm::end(); ?>

<script>
    window.onload = function(){
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Datemask yyyy/mm/dd
            $('#movie-release').inputmask('yyyy/mm/dd', { 'placeholder': 'yyyy/mm/dd' })
        })
    }

</script>

