<?php
use yii\helpers\Html;
?>

<!--<div class="col-xs-6 col-sm-4 col-md-3">-->

<!--</div>-->


<article class="media excerpt">
<!--    <div class="media-left">-->
        <a href="<?= $model->detail ?>" class="focus">
            <img class="media-object thumb" src="<?= Yii::$app->params['adminhost'].$model->cover?>" alt="<?= $model->name?>" >
        </a>
<!--    </div>-->
    <header>
        <a class="cat" href="javascript:void(0)">最新发布<i></i></a>
        <h2><a target="_blank" href="<?= $model->detail ?>" title="<?= $model->name?>"><?= $model->name.' '.$model->ename ?></a></h2>
    </header>

    <p class="meta">
        <time><i class="fa fa-clock-o"></i><?= date('Y-m-d',$model->create_time) ?></time>
        <a class="pc" href="<?= $model->detail ?>"><i class="fa fa-eye" aria-hidden="true"></i>查看(<?= $model->count?>)</a>
        <a href="<?= $model->detail ?>#songList" class="post-like"><i class="fa fa-music" aria-hidden="true"></i>歌曲(<span><?= count($model->episodes)?></span>)</a>
    </p>

    <p class="note">﻿ <?= $model->intro ?></p>

</article>