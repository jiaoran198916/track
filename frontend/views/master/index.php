<?php

use yii\widgets\ListView;
use yii\helpers\Url;
use frontend\components\RankingWidget;

?>
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="/static/css/swiper.min.css">

<div class="container homepage">

    <!-- Swiper -->
    <div class="swiper-container movie-items">
        <div class="swiper-wrapper">

            <?php foreach ($bannerData as $k=>$v):?>
                <div class="swiper-slide movie-item">
                    <div class="mv-img">
                        <a target="_blank" href="<?= Url::to(['detail', 'id' => $v->movie_id])?>">
                            <img class="img" src="<?= Yii::$app->params['adminhost'].$v->movie->cover?>" alt="<?= $v->title ?>"></a>
                    </div>
                    <div class="title-in">
                        <h5><a target="_blank" href="<?= Url::to(['detail', 'id' => $v->movie_id])?>" tabindex="-1"><?= $v->movie->name .' '.$v->movie->year ?></a></h5>
                        <p><i class="ion-android-star"></i><span><?= count($v->movie->episodes)?></span>&nbsp;songs</p>
                    </div>
                </div>
            <?php endforeach;?>

        </div>
        <!-- Add Pagination -->
<!--        <div class="swiper-pagination"></div>-->
    </div>
    <div class="body">
    <div class="col-md-9">
    <div class="row">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= !empty($keyword) ? '搜索结果':'最新发布' ?></h3>
                </div>
            </div>
    </div>


<!--        <div class="media">-->
<!--            <div class="media-left">-->
<!--                <a href="#">-->
<!--                    <img class="media-object" src="..." alt="...">-->
<!--                </a>-->
<!--            </div>-->
<!--            <div class="media-body">-->
<!--                <h4 class="media-heading">Media heading</h4>-->
<!--                ...-->
<!--            </div>-->
<!--        </div>-->
            <?= ListView::widget([
                    'id' => 'postList',
                    'options' => ['tag' => 'div', 'class' => 'row content'],
//                    'itemOptions' => ['tag' => 'div', 'class' => 'col-xs-6 col-sm-4 col-md-3'],
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

    </div>
    <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">

        <div class="list-group">
            <a href="javascript:void()" class="list-group-item loading active">点击排行</a>
            <?= RankingWidget::widget(['items'=>$hots, 'type' => 'score'])?>
        </div>

    </div>
    </div>
</div>

<!-- Swiper JS -->
<script src="/static/js/swiper.min.js"></script>
<!-- Initialize Swiper -->
<script>
    let swiper = new Swiper('.swiper-container', {
        slidesPerView: 5,
        spaceBetween: 20,
        autoplay: true,
        loop: true,
        lazy:true,
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // }
    });
</script>


