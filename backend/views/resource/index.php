<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ResourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '资源列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped', 'id' => 'example'],
        'layout' => '{items}',
        'columns' => [

            ['attribute' => 'id',
                'contentOptions' => ['width' => '']
            ],
            'name',
            'desc',
            'url',
            'position',
            [
                'attribute' => 'item_id',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->item->name, $model->item->url.'#tab_resource',['target' => '_blank']);
                }
            ],
            ['attribute' => 'is_download',
            'label' => '是否在线',
                'value' => 'downloadStatus'
            ],
            ['attribute' => 'type',
                'label' => '类型',
                'value' => 'typeName'
            ],
            'sourceName.cname',
            ['attribute' =>'create_time',
                'format' =>['date', 'php:Y-m-d H:i:s']
            ],
            ['attribute' =>'update_time',
                'format' =>['date', 'php:Y-m-d H:i:s']
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

<script>
    window.onload = function(){
        $(function () {
            $('#example').DataTable()
        })
    }
</script>