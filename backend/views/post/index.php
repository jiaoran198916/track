<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Poststatus;


/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章列表';
?>
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="mws-i-24 i-table-1"><?= $this->title ?></span>
    </div>
    <div class="mws-panel-body">

        <div class="mws-panel-toolbar top clearfix">
            <ul>
                <li><?= Html::a('New', ['create'], ['class' => 'mws-ic-16 ic-accept']) ?></li>
                <li><a href="#" class="mws-ic-16 ic-cross">Reject</a></li>
                <li><a href="#"dataTables_length class="mws-ic-16 ic-printer">Print</a></li>
                <li><a href="#" class="mws-ic-16 ic-arrow-refresh">Renew</a></li>
                <li><a href="#" class="mws-ic-16 ic-edit">Update</a></li>
            </ul>
        </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'mws-datatable-fn mws-table'],
        'layout' => '{items}',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' =>'id',
                'contentOptions' => ['width' =>'30px']
            ],
            'title',
             //'author_id',
            ['attribute' =>'authorName',
             'label' => '作者',
             'value' => 'author.nickname'
            ],
//            'content:ntext',
            'tags:ntext',
            //'status',
            ['attribute' =>'status',
                'value' => 'status0.name',
                'filter' => Poststatus::find()
                    ->select(['name', 'id'])
                    ->orderBy('position')
                    ->indexBy('id')
                    ->column(),
            ],
            // 'create_time:datetime',
             //'update_time:datetime',
            ['attribute' =>'update_time',
            'format' =>['date', 'php:Y-m-d H:i:s']

            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
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
