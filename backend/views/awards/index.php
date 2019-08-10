<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AwardsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '奖项列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <?= Html::a('<i class="fa fa-plus"></i> 新建奖项', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'tableOptions' => ['class' => 'table table-bordered table-striped', 'id' => 'example'],
                    'layout' => '{items}',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                        'id',
                        'name',
                        'ename',
//                        'desc:ntext',
                        ['attribute' =>'city_id',
                            'value' =>'city'
                        ],
                        ['label' =>'音乐奖项',
                            'value' =>'items'
                        ],
                        ['attribute' =>'create_time',
                            'format' =>['date', 'php:Y-m-d H:i:s']
                        ],

                        ['class' => 'yii\grid\ActionColumn'],
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
            $('#example').DataTable({
                "iDisplayLength" : 20,
                "order": [[ 0, "desc" ]]
            })
        })
    }
</script>
