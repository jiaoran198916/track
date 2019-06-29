<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = '修改电影';
$this->params['breadcrumbs'][] = ['label' => 'Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-pencil"><?= $this->title ?></span>
    </div>
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
