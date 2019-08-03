<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\components\RankingWidget;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container filepage">
    <div class="col-md-9">
        <div class="site-signup">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>&nbsp;</p>

            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'repassword')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                    <hr>
                    <p>已有账号？去&nbsp;&nbsp;&nbsp;<?= Html::a('登录',['site/login'], ['class' => 'btn btn-success', 'name' => 'signup-button'])?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">
        <div class="list-group">
            <a href="javascript:" class="list-group-item active">点击排行</a>
            <?= RankingWidget::widget(['items'=>$hots])?>
        </div>
    </div>

</div>
