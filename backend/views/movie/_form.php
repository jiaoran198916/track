<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\Master;
use common\models\User;
use common\models\Movie;
use dosamigos\datetimepicker\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model common\models\Movie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mws-panel-body">
    <?php $form = ActiveForm::begin(['options' => ['class' => 'mws-form']]); ?>
<!--    <form class="mws-form" action="http://www.malijuwebshop.com/themes/mws-admin/form_layouts.html">-->
        <div class="mws-form-inline">
<!--            <div class="mws-form-row">-->
<!--                <label>Small text field</label>-->
<!--                <div class="mws-form-item small">-->
<!--                    <input type="text" class="mws-textinput">-->
            <?= $form->field($model, 'name',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>
<!--                </div>-->
<!--            </div>-->

            <?= $form->field($model, 'foreign_name',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'cover',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->widget('common\widgets\file_upload\FileUpload',[
                'config'=>[
                ]
            ]) ?>

            <?= $form->field($model, 'year',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Movie::getYearData()) ?>

            <?= $form->field($model, 'master_id',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Master::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['multiple' => 'multiple']) ?>

            <?= $form->field($model, 'desc',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item medium\">{input}\n{hint}\n{error}</div>"])->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'duration',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'douban_id',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'user_id',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(User::find()->select(['username', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),['prompt' => '请选择作者']) ?>

            <?= $form->field($model, 'status',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Yii::$app->params['movieStatus'],
                ['prompt' => '请选择状态']) ?>

        </div>
        <div class="mws-button-row" style="text-align:left">
            <input type="submit" value="<?= $model->isNewRecord ? '新 增' : '修 改' ?>" class="mws-button green">

            <?= Html::a(Html::button('取 消',['class' => 'mws-button gray']), ['index'] ) ?>
        </div>
        <?php ActiveForm::end(); ?>
<!--    </form>-->
</div>
