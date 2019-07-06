<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EpisodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '歌曲列表';
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
        //'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered table-striped', 'id' => 'example'],
        'layout' => '{items}',
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'id',
                'contentOptions' => ['width' => '']
            ],
            [
                'label' => '位置',
                'value' => function($model){
                    return $model->min .':'.$model->sec;
                }
            ],
            'name',
            'foreign_name',

//            ['attribute' => 'summary',
//                'contentOptions' => ['width' => '120px']
//            ],
            // 'status',
            // 'url1:url',
            // 'url2:url',
            // 'url3:url',
//             'movie_id',
            [
                'attribute' => 'movie_id',
                'format' => 'raw',
                'value' => function($model){
                         return Html::a($model->movie->name, $model->movie->url.'#tab_episode',['target' => '_blank']);
                }
            ],
            ['attribute' => 'musician_id',
                'value' => 'musicians'
            ],

            // 'create_time:datetime',
            // 'update_time:datetime',

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