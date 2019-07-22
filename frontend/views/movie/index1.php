<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use frontend\components\RankingWidget;
use common\models\Post;
use frontend\components\TagsCloudWidget;
use frontend\components\RctReplyWidget;

?>
<div class="container homepage"><div id="ihd-carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php foreach ($bannerData as $k=>$v):?>
                <li data-target="#ihd-carousel" data-slide-to="<?= $k?>" class="<?= $k==0 ?'active': ''?>"></li>
            <?php endforeach;?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($bannerData as $k=>$v):?>
                <div class="item <?= $k==0 ?'active': ''?>">
                    <a target="_blank" href="<?= Url::to(['detail', 'id' => $v->movie_id])?>">
                        <img class="img-rounded" src="<?= Yii::$app->params['adminhost'].$v->img?>" alt="<?= $v->title ?>"></a>
                </div>
            <?php endforeach;?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#ihd-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#ihd-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="col-md-9">
<!--        <div class="row">-->
<div class="row">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><?= !empty($keyword) ? '搜索结果':'最新发布' ?></h3>
            </div>
        </div>
</div>

            <?= ListView::widget([
                    'id' => 'postList',
                    'options' => ['tag' => 'div', 'class' => 'row'],
                    'itemOptions' => ['tag' => 'div', 'class' => 'col-xs-6 col-sm-4 col-md-3'],
                    'dataProvider' => $dataProvider,
                    'itemView' => '_listimg',//子视图,显示一篇文章的标题等内容.
                    'layout' => '{items}<div class="col-md-12" style="padding: 0">{pager}</div>',

                    'pager' => [
                        'maxButtonCount' => 5,
                        'nextPageLabel' => Yii::t('app','下一页'),
                        'prevPageLabel' => Yii::t('app','上一页'),
                    ],

            ]);
            ?>
<!--        </div>-->

    </div>
    <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">

        <div class="list-group">
            <a href="http://ihd.me/#" class="list-group-item loading active">随机推荐</a>
            <?= RankingWidget::widget(['items'=>$hots])?>
        </div>

        <div class="list-group">
            <a href="http://ihd.me/#" class="list-group-item active">本周排行</a>
            <?= RankingWidget::widget(['items'=>$news])?>
        </div>
    </div>
</div>


