<?php

use yii\widgets\ListView;
use yii\helpers\Url;
use frontend\components\RankingWidget;

?>

<div class="container homepage">

    <div class="body">
        <div class="col-md-9">

            <h4 id="normal-cards" style="margin-top:20px;">精选文章</h4>
            <br>
            <div class="ps-r">
                <ul class="category-nav pr-6">
                    <li>
                        <a class="<?= (Yii::$app->request->getUrl() == '/post') ? 'active':''?>" href="/post"> 全部分类 </a>
                    </li>
                    <?php foreach ($cates as $v):?>
                    <li>
                        <a class="<?= (Yii::$app->request->getUrl() == '/post/index/'.$v->id) ? 'active':''?>" href="<?= '/post/index/'. $v->id?>">
                            <?=$v->name ?>
                        </a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>

            <?= \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-hover table-striped'],
                'layout' => '{items}',
                'columns' => [

                    [
                         'format' => 'raw',
                        'attribute' =>'name',
                        'contentOptions' => ['width' =>'60%'],
                        'value' => function($model){
                            return \yii\helpers\Html::a($model->name, $model->url,['target' => '_blank']);
                        },
                        'enableSorting' => false
                    ],
                    ['attribute' =>'cate_id',
                        'value' => 'cate.name',
                        'enableSorting' => false
                    ],
                    [
                        'attribute' =>'count',
                        'label' => '点击',
                        'enableSorting' => false
                    ],
                    ['attribute' =>'create_time',
                        'label' => '发布时间',
                        'format' =>['date', 'php:m-d H:i']
                        ,'enableSorting' => false,
                        'contentOptions' => ['width' =>'10%'],
                    ],

                ],
            ]); ?>

        </div>
        <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">

            <div class="list-group">
                <a href="javascript:" class="list-group-item loading active">最新发布</a>
                <?= RankingWidget::widget(['items'=>$news, 'type' => 'time'])?>
            </div>

            <div class="list-group">
                <a href="javascript:void()" class="list-group-item loading active">点击排行</a>
                <?= RankingWidget::widget(['items'=>$hots, 'type' => 'score'])?>
            </div>

        </div>
    </div>
</div>


<script>

</script>


