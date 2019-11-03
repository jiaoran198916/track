<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Master;

/* @var $this yii\web\View */
/* @var $model common\models\BannerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'inline',
    ]);
    ?>

    <?= $form->field($model, 'name')->dropDownList(\yii\helpers\ArrayHelper::map(Master::find()->select('id, name')->addSelect('concat(`name`, `ename`) as much')->orderBy('id desc')->asArray()->all(), 'name', 'much'), ['prompt' => '姓名', 'class' => 'select2']) ?>

    <?= $form->field($model, 'ename')->textInput(['placeholder' => '外文名']) ?>

    <?= $form->field($model, 'type')->dropDownList([0 => '作曲家',1 => '导演',2 => '歌手',3 => '音乐总监',], ['prompt' => '类型']) ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

