<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EpisodeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="episode-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'timing') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'foreign_name') ?>

    <?= $form->field($model, 'summary') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'url1') ?>

    <?php // echo $form->field($model, 'url2') ?>

    <?php // echo $form->field($model, 'url3') ?>

    <?php // echo $form->field($model, 'movie_id') ?>

    <?php // echo $form->field($model, 'seconds') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
