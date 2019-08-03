<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\components\RankingWidget;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="container filepage">
    <div class="col-md-9">
        <div class="site-login">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>&nbsp;</p>

            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <!--<div style="color:#999;margin:1em 0">
                        If you forgot your password you can /*= Html::a('reset it', ['site/request-password-reset']) */?>.
                    </div>-->

                    <div class="form-group">
                        <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                    <hr>
                    <p>没有账号？去&nbsp;&nbsp;&nbsp;<?= Html::a('立即注册',['site/signup'], ['class' => 'btn btn-success', 'name' => 'signup-button'])?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">
        <div class="list-group">
            <a href="javascript:" class="list-group-item loading active">最新发布</a>
            <?= RankingWidget::widget(['items'=>$news, 'type' => 'time'])?>
        </div>
    </div>
</div>
