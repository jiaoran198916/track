<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\City */

$this->title = '查看城市';
$this->params['breadcrumbs'][] = ['label' => '城市列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Main content -->
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
            'name',
            'ename',
            'country_id',
            'create_time:datetime',
            'update_time:datetime',
            'valid',
        ],
    ]) ?>

                </div>
            </div>
        </div>
    </div>
</section>
