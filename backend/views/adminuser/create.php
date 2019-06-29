<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '创建管理员';
?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus"><?= $this->title ?></span>
    </div>

    <div class="mws-panel-body">

        <?php $form = ActiveForm::begin(['options' => ['class' => 'mws-form']]); ?>
        <div class="mws-form-inline">
        <?= $form->field($model, 'username',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nickname',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_repeat',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'profile',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textarea(['rows' => 6]) ?>

        </div>
        <div class="mws-button-row" style="text-align:left">
            <input type="submit" value="新 增" class="mws-button green">
            <?= Html::a(Html::button('取 消',['class' => 'mws-button gray']), ['index'] ) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
