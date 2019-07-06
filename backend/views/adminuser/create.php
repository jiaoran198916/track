<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Adminuser */

$this->title = '创建管理员';
$this->params['breadcrumbs'][] = ['label' => '管理员列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>

        </div>
        <div class="box-footer">
            <?= Html::submitButton('新 增', ['class' => 'btn btn-success'] ) ?>
            <?= Html::a('取 消', ['index'] ,['class' => 'btn btn-default'] ) ?>
        </div>

        <?php ActiveForm::end(); ?>
       </div>
    </div>
</section>

