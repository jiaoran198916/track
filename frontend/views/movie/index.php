<?php

use yii\widgets\ListView;
use yii\helpers\Url;
use frontend\components\RankingWidget;

?>
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="/static/css/swiper.min.css">
<style>
    .swiper-button-next{
        width: 16px;
        background-position:right;
    }
    .swiper-button-prev{
        width: 16px;
        background-position:left;
    }
</style>

<div class="container homepage">

    <div class="body">
    <div class="col-md-9">

    <div class="row content" style="border-radius: 3px">
        <!-- Swiper -->
        <div class="swiper-container movie-items ">
            <div class="swiper-wrapper">

                <?php foreach ($bannerData as $k=>$v):?>
                    <div class="swiper-slide movie-item">
                        <a target="_blank" href="<?= Url::to(['detail', 'id' => $v->movie_id])?>" >
                        <div class="mv-img">

                            <img class="img bounceIn" src="<?= Yii::$app->params['adminhost'].$v->img?>" alt="<?= $v->title ?>">

                        </div>
                        </a>
                        <div class="title-in">
                            <h5>
                                <a target="_blank" href="<?= Url::to(['detail', 'id' => $v->movie_id])?>" tabindex="-1">
                                    <?= $v->movie->name .' '.$v->movie->ename.' '.$v->movie->year ?>
                                </a>
                            </h5>
                            <p><i class="ion-android-star"></i><span><?= count($v->movie->episodes)?></span>&nbsp;songs
<!--                                <i class="mx-1 mx-md-2">—</i><time class="d-inline-block">3月前</time>-->
                            </p>
                        </div>
                    </div>
                <?php endforeach;?>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>

        </div>
    </div>
        <br>

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
        <div class="widget widget_ui_textasb list-group">
            <a class="style02" href="<?= Yii::$app->urlManager->createUrl(
            ['post/detail','id' => '1235',
            ]);?>" target="_blank">
                <strong>特别公告</strong><h2>招聘“内容编辑”</h2>
                <p>面向全网招募内容编辑，欢迎大家</p>
            </a>
        </div>
        <div class="list-group">
            <a href="javascript:void()" class="list-group-item loading active">最新文章</a>
            <?= RankingWidget::widget(['items'=>$posts, 'type' => 'post'])?>
        </div>

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
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        // slidesPerView: 5,
        // spaceBetween: 20,
        autoplay: true,
        // loop: true,
        // lazy:true,
        // pagination: {
        //     el: '.swiper-pagination',
        //     clickable: true,
        // }
    });
</script>


