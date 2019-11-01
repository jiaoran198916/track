<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BannerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'inline',
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['placeholder' => '标题']) ?>

    <?= $form->field($model, 'movie_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Movie::find()->select('id, name')->all(), 'id', 'name'), ['prompt' => '关联电影', 'class' => 'select2']) ?>

    <?php // echo $form->field($model, 'movie_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

