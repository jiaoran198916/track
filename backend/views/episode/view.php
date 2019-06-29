<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Episode */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Episodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="episode-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'timing',
            'name',
            'foreign_name',
            'summary:ntext',
            'status',
            'url1:url',
            'url2:url',
            'url3:url',
            'movie_id',
            'seconds',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

</div>
