<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '电影列表';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            电影管理
            <small><?= $this->title?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">电影管理</a></li>
            <li class="active">电影列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
<!--                    <div class="box-header">-->
<!--                        <h3 class="box-title"></h3>-->
<!--                    </div>-->
                    <div class="box-body">
                        <a class="btn btn-app" href="<?= Url::to(['movie/create'])?>">
                            <i class="fa fa-plus"></i> New
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'tableOptions' => ['class' => 'table table-bordered table-striped', 'id' => 'example1'],
                            //'layout' => '{items}',
                            'columns' => [
                                //['class' => 'yii\grid\SerialColumn'],

                                'id',
                                'name',
//                  ['label' => '封面图',
//            'attribute'=>'cover',
//            'headerOptions' => ['width' => '50'],
//            'format' => 'image'
//            ],
                                //'cover:image',
                                //'foreign_name',
                                'year',
//                 'master_id',
                                ['attribute' => 'musician_id',
//                    'label' => '作者',
                                    'value' => 'musicians'
                                ],
                                'duration',
//                'douban_id',
                                // 'summary:ntext',
//                 'user_id',
                                ['attribute' => 'user_id',
//                    'label' => '作者',
                                    'value' => 'user.username'
                                ],
                                ['attribute' => 'status',
                                    'value' => 'statusName',
                                    'contentOptions' => function($model){
                                        return ($model->status == 0) ? ['class' => 'bg-yellow'] : [];
                                    }
                                ],
                                ['attribute' =>'create_time',
                                    'format' =>['date', 'php:Y-m-d H:i:s']
                                ],
                                ['attribute' =>'update_time',
                                    'format' =>['date', 'php:Y-m-d H:i:s']
                                ],

                                ['class' => 'yii\grid\ActionColumn',
                                    'template' => '<ul class="icon-list" style="margin-bottom:0px;">{view}{update}{edit}{connect}{delete}</ul>',
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
                                        'edit' => function($url,$model, $key){
                                            $options = [
                                                'title' => Yii::t('yii', 'Edit'),
                                                'aria-label' => Yii::t('yii', 'Edit'),
                                                'data-pjax' => '0',
                                                'data-method' => 'post',
                                            ];
                                            return Html::a('<span class="glyphicon glyphicon-edit"></span>', $url, $options);
                                        },
                                        'connect' => function($url,$model, $key){
                                            $options = [
                                                'title' => Yii::t('yii', 'Connect'),
                                                'aria-label' => Yii::t('yii', 'Connect'),
                                                'data-pjax' => '0',
                                                'data-method' => 'post',
                                            ];
                                            return Html::a('<span class="glyphicon glyphicon-paperclip"></span>', $url, $options);
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



<!-- /.content-wrapper -->

<script>
    window.onload = function(){
        $(function () {
            $('#example1').DataTable()
        })
    }


</script>