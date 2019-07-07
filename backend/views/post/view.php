<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = '文章详情';
$this->params['breadcrumbs'][] = ['label' => '文章列表', 'url' => ['index']];
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
            'content:ntext',
            'tags:ntext',
            //'status',
            ['label' => '类型',
             'value' => \common\models\Post::postType()[$model->type]
            ],
            'key',
            ['attribute' => 'create_time',
              'value' => date("Y-m-d H:i:s", $model->create_time),
            ],
            ['attribute' => 'update_time',
                'value' => date("Y-m-d H:i:s", $model->update_time),
            ],
            //'author_id',
            ['attribute' => 'author_id',
                'value' => $model->author->nickname,
                ],
        ],
    'template'=>'<tr><th style="width:120px;">{label}</th><td>{value}</td></tr>',
    'options'=>['class'=>"table table-striped table-bordered detail-view"],
    ]) ?>
                </div>
            </div>
        </div>
    </div>
</section>