<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\Master;
use common\models\Movie;

/* @var $this yii\web\View */
/* @var $model common\models\Episode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mws-panel-body">
    <?php $form = ActiveForm::begin(['options' => ['class' => 'mws-form']]); ?>

    <div class="mws-form-inline">
    <?= $form->field($model, 'movie_id',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Movie::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column()
        ) ?>

    <?= $form->field($model, 'timing',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'foreign_name',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item medium\">{input}\n{hint}\n{error}</div>"])->textarea(['rows' => 6]) ?>



    <?= $form->field($model, 'singer_id',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Master::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),
        ['prompt' => '请选择歌手']) ?>

    <?= $form->field($model, 'status',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Poststatus::find()->select(['name', 'id'])->orderBy(['position' => SORT_ASC])->indexBy('id')->column(),
        ['prompt' => '请选择状态']) ?>

    <?= $form->field($model, 'url1',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url2',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url3',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    </div>
    <div class="mws-button-row" style="text-align:left">
        <input type="submit" value="新 增" class="mws-button green">
        <input type="submit" value="取 消" class="mws-button gray">
    </div>
    <?php ActiveForm::end(); ?>
<!--    </form>-->
</div>
