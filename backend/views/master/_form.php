<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use common\models\City;

?>
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="/static/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


<?php $form = ActiveForm::begin(['options' => ['role' => 'form'], 'enableAjaxValidation' => true]); ?>
<div class="box-body">

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->radioList(['0' => '音乐家', '1' => '导演']) ?>
    <?= $form->field($model, 'sex')->radioList(['0' => '保密', '1' => '男', '2' => '女']) ?>

    <?= $form->field($model, 'pic')->widget('common\widgets\file_upload\FileUpload') ?>

    <?= $form->field($model, 'birthday')->input('date') ?>

    <?= $form->field($model, 'city_id')->dropDownList(City::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择所在城市']) ?>

    <?= $form->field($model, 'desc')->textarea() ?>

    <?= $form->field($model, 'douban_id')->input('number') ?>

    <?= $form->field($model, 'user_id')->dropDownList(User::find()->select(['username', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者']) ?>

    </div>

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '新 增' : '修 改',['class' => 'btn btn-success']) ?>
        <?= Html::a(Html::button('取 消',['class' => 'btn btn-default']), ['index'] ) ?>
    </div>

    <?php ActiveForm::end(); ?>

<script>
    window.onload = function() {
        $(function () {
            //bootstrap WYSIHTML5 - text editor
            $('#master-desc').wysihtml5()
        })
    }
</script>

