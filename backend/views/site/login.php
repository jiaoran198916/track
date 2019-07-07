<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .checkbox label{
        padding-left: 0;
    }
</style>

<div class="login-box">
    <div class="login-logo">
        <h1 href=""><b>电影原声网</b>后台系统</h1>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">请登录</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', "method" => "post", 'options' => ['class' => 'mws-form']]); ?>
        <?= $form->field($model, 'username', ['template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>{error}</div>'])->textInput(['autofocus' => true, 'placeholder' => "用户名"])->label(false) ?>
        <?= $form->field($model, 'password', ['template' => '<div class="form-group has-feedback">{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}</div>'])->passwordInput(['placeholder' => "密码"])->label(false) ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('登录', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div>

