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
<style>
    .fa-certificate{
        margin-left: 5px;
        font-size: 10px;
        color: red;
    }
</style>
<?php $form = ActiveForm::begin(['options' => ['role' => 'form'], 'enableAjaxValidation' => true, 'action' => \yii\helpers\Url::to(['create'])]); ?>
<div class="box-body">

    <input type="hidden" id="movie-id" name="Movie[id]" value="<?= $model->id? $model->id: 0?>">
    <?= $form->field($model, 'name', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->textInput() ?>
    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cover', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->widget('common\widgets\file_upload\FileUpload') ?>

    <?= $form->field($model, 'year', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->dropDownList(Movie::getYearData(),['class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'musician_id', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->dropDownList(Master::find()->select(['name', 'id'])->where('type=0')->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择音乐作者"]) ?>

    <?= $form->field($model, 'director_id')->dropDownList(Master::find()->select(['name', 'id'])->where('type=1')->orderBy(['id' => SORT_DESC])->indexBy('id')->column(),['class' => 'select2', 'style' => 'width: 100%;', 'multiple' => 'multiple', 'data-placeholder' => "选择导演"]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'duration', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->textInput() ?>
    <?= $form->field($model, 'douban_id', ['template' => '{label}<i class="fa fa-certificate"></i>{input}{hint}{error}'])->textInput() ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['username', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者', 'class' => 'select2', 'style' => 'width: 100%;']) ?>

    <?= $form->field($model, 'status')->radioList(['0' => '待审核', '1' => '已审核']) ?>
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
        })
    }

</script>

