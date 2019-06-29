<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="mws-panel-body">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'mws-form']]); ?>
    <div class="mws-form-inline">

    <?= $form->field($model, 'username',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickname',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textarea(['rows' => 6]) ?>


    </div>
    <div class="mws-button-row" style="text-align:left">
        <input type="submit" value="修 改" class="mws-button green">
        <?= Html::a(Html::button('取 消',['class' => 'mws-button gray']), ['index'] ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
