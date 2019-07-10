<?php
use yii\helpers\Html;
?>

<!--<li class="intro-box">-->
    <div class="title-box">
        <h3 class="intro-title">
            <a href="<?= $model->url;?>" alt="<?= $model->name ?>" title="<?= $model->name ?>" target="_blank"><?= $model->name.' '.$model->foreign_name.' ' ?>(<?= $model->year ?>)</a>
        </h3>
        <p class="score">
            <span class="color-grey" style="color: #ccc">阅读</span>
            <span class="color-gray"><?= $model->count ?></span>
        </p>
    </div>

    <div class="intro-detail">
        <div class="img-box">
            <a href="<?= $model->url;?>" alt="<?= $model->name ?>" title="<?= $model->name ?>" target="_blank"><img class="main" src="<?= $model->cover ?>"/></a>
        </div>
        <div class="text-box">
            <p class="intro-text color-grey">
                <?= mb_substr(strip_tags($model->desc),0 ,360) ?>
            </p>
            <div class="movie-detail">
                <p class="movie-message">
                    <span class="glyphicon glyphicon-time"></span>
                    <span class="color-green"><?= date("Y-m-d", $model->create_time) ?></span>
                    &nbsp;
                    <span class="glyphicon glyphicon-user"></span>
                    <span class="color-gray"><?= $model->user_id ?></span>
                    &nbsp;
<!--                    <span class="color-grey">1848</span>-->
                </p>
                <p class="movie-labels">
                    <a href="<?= $model->url ?>" target="_blank">阅读全文</a>
                </p>
                <p class="more-info">
                    <span class="color-grey">
                        来自：
                    </span>
                    <a href="<?= Yii::$app->params['doubanurl'].$model->douban_id ?>" alt="豆瓣链接" title="豆瓣链接" target="_blank">
                        豆瓣
                    </a>
                </p>
            </div>
        </div>
    </div>
<!--</li>-->