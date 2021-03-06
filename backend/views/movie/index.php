<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '电影列表';
$this->params['breadcrumbs'][] = $this->title;
?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <?= Html::a('<i class="fa fa-plus"></i> 创建电影', ['create'], ['class' => 'btn btn-success']) ?>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
//                            'filterModel' => $searchModel,
                            'tableOptions' => ['class' => 'table table-bordered table-striped', 'id' => 'example'],
                            'layout' => '{items}',
//                            $layout = "{items}\n{pager}";
                            'columns' => [
                                //['class' => 'yii\grid\SerialColumn'],
                                'id',
                                [
                                    'format' => 'raw',
                                    'attribute' => 'name',
                                    'value' => function($model){
                                        return Html::a($model->name, $model->url,['target' => '_blank']);
                                    }
                                ],
//                  ['label' => '封面图',
//            'attribute'=>'cover',
//            'headerOptions' => ['width' => '50'],
//            'format' => 'image'
//            ],
                                //'cover:image',
                                'ename',
                                'year',
//                 'master_id',
                                ['attribute' => 'musician_id',
//                    'label' => '作者',
                                    'value' => 'musicians'
                                ],
                                [
                                  'attribute' => 'is_showing',
                                  'value' => function($model){
                                      return Html::a($model->isShowing, 'javascript:void(0)',['onclick' => "switchShowing(".$model->id.",this)"]);
//                                          ($model->is_showing == 1) ? ['class' => 'bg-green'] : [];
                                  },
                                    'contentOptions' => function($model){
                                        return ($model->is_showing == 1) ? ['class' => 'bg-green'] : [];
                                    },
                                    'format' => 'raw'
                                ],
                                'duration',
//                'douban_id',
                                // 'summary:ntext',
//                 'user_id',
//                                ['attribute' => 'user_id',
////                    'label' => '作者',
//                                    'value' => 'user.username'
//                                ],
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
                                    'template' => '<ul class="icon-list" style="margin-bottom:0px;">{view} {update} {delete}</ul>',
                                    'buttons' => [
                                        'view' => function($url,$model, $key){
                                            $options = [
                                                'title' => Yii::t('yii', 'View'),
                                                'aria-label' => Yii::t('yii', 'View'),
                                                'data-pjax' => '0',
                                                'target' => '_blank'
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->




<!-- /.content-wrapper -->

<script>
    function switchShowing (id, obj) {
        $.post('/movie/switch-showing', {id: id}, function(rsp){
            layer.msg(rsp.msg, {icon:6,time:2000},function () {
                if(rsp.code === 200){
                    obj.innerHTML = rsp.data
                }
            })
        }, 'json');
    }
    window.onload = function(){
        $(function () {
            $('#example').DataTable({
                "iDisplayLength" : 20,
                "order": [[ 0, "desc" ]]
            })
        })
    }

</script>