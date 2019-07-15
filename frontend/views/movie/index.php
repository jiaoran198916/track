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
<div class="container" id="container">

    <div class="banner">
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides callbacks callbacks1" id="slider">
                    <?php foreach ($bannerData as $k=>$v):?>
                    <?php if($k %4 ==0): ?>
                    <li id="callbacks1_s<?= $k?>">
                        <div class="row poster-list">
                    <?php endif;?>
                            <div class="col-md-3">
                                <div class="poster-container">
                                    <div class="img-block">
                                        <a href="<?= Url::to(['detail', 'id' => $v->movie_id])?>" alt="<?= $v->title ?>" title="<?= $v->title ?>" target="_blank"><img src="<?= Yii::$app->params['adminhost'].$v->img?>" /></a>
                                    </div>
                                    <div class="text-block">
                                        <h3 class="title">
                                            <a href="<?= Url::to(['detail', 'id' => $v->movie_id])?>" alt="<?= $v->title ?>" title="<?= $v->title ?>" target="_blank"><?= $v->title ?></a>
                                        </h3>
                                        <p class="detail">
                                            <?= $v->desc?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php if($k %4 == 3 || (($k + 1) == count($bannerData))): ?>
                            </div>
                            </li>
                        <?php endif;?>

                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="content-left">
<!--            --><?// Pjax::begin(); ?>

            <?= ListView::widget([
                    'id' => 'postList',
                    'options' => ['tag' => 'ul', 'class' => 'movie-intro-list'],
                    'itemOptions' => ['tag' => 'li', 'class' => 'intro-box'],
                    'dataProvider' => $dataProvider,
                    'itemView' => '_listitem1',//子视图,显示一篇文章的标题等内容.
                    'layout' => '{items}{pager}',

                    'pager' => [
                        'maxButtonCount' => 5,
                        'nextPageLabel' => Yii::t('app','下一页'),
                        'prevPageLabel' => Yii::t('app','上一页'),
                    ],

            ]);

            ?>
<!--            --><?// Pjax::end(); ?>

        </div>
        <div class="content-right">
            <div class="sort-box">
                <ul class="sort-list">
                    <li class="list-title">
                        热门电影
                    </li>
                    <?= RankingWidget::widget(['items'=>$hots])?>
                </ul>
            </div>
        </div>
    </div>
</div>


