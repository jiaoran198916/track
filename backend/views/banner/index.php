<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BannerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <?= Html::a('<i class="fa fa-plus"></i> 新建Banner', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped', 'id' => 'example'],
        'layout' => '{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'title',
//            'desc',
//            ['attribute' =>'type',
//                'value' =>function($model){
//                    return \common\models\Banner::bannerType()[$model->type];
//                }
//            ],
//            'position',
            // 'movie_id',
            ['attribute' =>'movie_id',
                'value' => 'movie.name'
            ],
            ['attribute' =>'create_time',
                'format' =>['date', 'php:Y-m-d H:i:s'],
            ],

            ['attribute' =>'update_time',
                'format' =>['date', 'php:Y-m-d H:i:s']
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '<ul class="icon-list">{view} {update} {delete}</ul>',
                'buttons' => [
                    'view' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',

                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'update' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    },
                    'delete' => function($url,$model, $key){
                        $options = [
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    }
                ]

            ],
        ],
    ]); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    window.onload = function(){
        $(function () {
            $('#example').DataTable()
        })
    }

</script>