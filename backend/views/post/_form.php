<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Poststatus;
use common\models\Adminuser;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mws-panel-body">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'mws-form']]); ?>
    <div class="mws-form-inline">

    <?= $form->field($model, 'title',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->textarea(['rows' => 6]) ?>

    <?php
        /*
        $allStatus = Poststatus::find()->all();
        $theStatus = ArrayHelper::map($allStatus, 'id','name');

    $theStatus = (new yii\db\Query())->select(['name'])->from('poststatus')->indexBy('id')->column();


    $theStatus = Poststatus::find()->select(['name', 'id'])->orderBy(['position' => SORT_ASC])->indexBy('id')->column();
    echo '<pre>';
    print_r($theStatus);die;
    echo '</pre>';*/



    ?>

    <?= $form->field($model, 'author_id',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Adminuser::find()->select(['nickname', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),
        ['prompt' => '请选择作者']) ?>

    <?= $form->field($model, 'status',['options' => ['class' => 'mws-form-row'],'inputOptions' => ['class' => 'mws-textinput'],'template' => "{label}\n<div class=\"mws-form-item small\">{input}\n{hint}\n{error}</div>"])->dropDownList(Poststatus::find()->select(['name', 'id'])->orderBy(['id' => SORT_ASC])->indexBy('id')->column(),
        ['prompt' => '请选择状态']) ?>

    </div>
    <div class="mws-button-row" style="text-align:left">
        <input type="submit" value="<?= $model->isNewRecord ? '新 增' : '修 改' ?>" class="mws-button green">
        <?= Html::a(Html::button('取 消',['class' => 'mws-button gray']), ['index'] ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
