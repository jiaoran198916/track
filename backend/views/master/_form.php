<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use common\models\City;

?>


<?php $form = ActiveForm::begin(['options' => ['role' => 'form']]); ?>
<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->radioList(['0' => '音乐家', '1' => '导演']) ?>
    <?= $form->field($model, 'type')->radioList(['0' => '保密', '1' => '男', '2' => '女']) ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->input('date') ?>

    <?= $form->field($model, 'city_id')->dropDownList(City::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择所在城市']) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'douban_id')->input('number') ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['username', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者']) ?>

    </div>

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
        <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
    </div>

    <?php ActiveForm::end(); ?>
