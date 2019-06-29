<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Episode */

$this->title = 'Update Episode: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Episodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="episode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
