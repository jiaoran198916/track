<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ResourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '资源列表';
?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1"><?= $this->title ?></span>
    </div>
    <div class="mws-panel-body">

        <div class="mws-panel-toolbar top clearfix">
            <ul>
                <li><?= Html::a('New', ['create', 'movie_id' => $movie_id], ['class' => 'mws-ic-16 ic-accept']) ?></li>
                <li><a href="#" class="mws-ic-16 ic-cross">Reject</a></li>
                <li><a href="#"dataTables_length class="mws-ic-16 ic-printer">Print</a></li>
                <li><a href="#" class="mws-ic-16 ic-arrow-refresh">Renew</a></li>
                <li><a href="#" class="mws-ic-16 ic-edit">Update</a></li>
                <li><a href="<?= Url::to(['movie/index']) ?>" class="mws-ic-16 ic-arrow-undo">Back</a></li>
            </ul>
        </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'mws-datatable-fn mws-table'],
        'layout' => '{items}',
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'id',
                'contentOptions' => ['width' => '']
            ],
            'name',
            'desc',
            'url',
            'position',
            ['attribute' => 'movie_id',
                'value' => 'movie.name'
            ],
            ['attribute' => 'status',
                'value' => 'statusName',
                'contentOptions' => function($model){
                    return ($model->status == 0) ? ['class' => 'mws-tooltip-ne mws-button red'] : [];
                }
            ],
            ['attribute' => 'type',
                'value' => 'typeName'
            ],
            ['attribute' =>'create_time',
                'format' =>['date', 'php:Y-m-d H:i:s']
            ],
            ['attribute' =>'update_time',
                'format' =>['date', 'php:Y-m-d H:i:s']
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '<ul class="icon-list">{view}{update}{delete}</ul>',
                'buttons' => [
                    'view' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<li class="mws-ic-16 ic-eye"></li>', $url, $options);
                    },
                    'update' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',

                        ];
                        return Html::a('<li class="mws-ic-16 ic-edit"></li>', $url, $options);
                    },
                    'delete' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',

                        ];
                        return Html::a('<li class="mws-ic-16 ic-trash"></li>', $url, $options);
                    }
                ]

            ],
        ],
    ]); ?>
</div>
</div>
