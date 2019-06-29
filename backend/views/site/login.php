<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="mws-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="mws-login-lock"><img src="/static/css/icons/24/locked-2.png" alt="" /></div>
    <div id="mws-login-form">
        <?php $form = ActiveForm::begin(['id' => 'login-form', "method" => "post", 'options' => ['class' => 'mws-form']]); ?>
        <form class="mws-form" action="/site/login" method="post">
            <div class="mws-form-row">
                <div class="mws-form-item large">
                    <input type="text" name="AdminLoginForm[username]" class="mws-login-username mws-textinput" placeholder="用户名" />
                </div>
            </div>
            <input name="_adminCSRF" type="hidden" id="_csrf-backend" value="<?= Yii::$app->request->csrfToken ?>">
            <div class="mws-form-row">
                <div class="mws-form-item large">
                    <input type="password" name="AdminLoginForm[password]" class="mws-login-password mws-textinput" placeholder="密码" />
                </div>
            </div>
            <div class="mws-form-row">
                <input type="submit" value="进入" class="mws-button green mws-login-button" />
            </div>
        </form>
        <?php ActiveForm::end(); ?>
    </div>
</div>
