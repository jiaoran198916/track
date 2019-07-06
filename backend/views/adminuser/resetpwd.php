<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '重置密码';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <?php $form = ActiveForm::begin(); ?>
                <div class="box-body">

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

                </div>
                <div class="box-footer">
                    <?= Html::submitButton('重 置', ['class' => 'btn btn-success'] ) ?>
                    <?= Html::a('取 消', ['index'] ,['class' => 'btn btn-default'] ) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
</section>
