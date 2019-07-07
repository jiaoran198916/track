<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Source */

$this->title = '来源详情';
$this->params['breadcrumbs'][] = ['label' => '来源列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-body">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cname',
            'ename',
            'desc',
            'logo',
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
