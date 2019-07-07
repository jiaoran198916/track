<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */

$this->title = 'Banner详情';
$this->params['breadcrumbs'][] = ['label' => 'Banner列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'desc',
            'img',
            'position',
            'movie_id',
            'type',
            'create_time:datetime',
            'update_time:datetime',
        ],
    ]) ?>

                </div>
            </div>
        </div>
    </div>
</section>
