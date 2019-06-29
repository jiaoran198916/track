<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Episode */

$this->title = '新增片段';
$this->params['breadcrumbs'][] = ['label' => 'Episodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-plus"><?= $this->title ?></span>
    </div>
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>