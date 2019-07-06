<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\User;
use common\models\Master;

/* @var $this yii\web\View */
/* @var $model common\models\Master */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foreign_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(Master::masterType(),['prompt' => '请选择类型']) ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->input('date') ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'douban_id')->input('number') ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['username', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者']) ?>

    <?= $form->field($model, 'status')->dropDownList(Poststatus::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择状态']) ?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
        <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
    </div>

    <?php ActiveForm::end(); ?>
