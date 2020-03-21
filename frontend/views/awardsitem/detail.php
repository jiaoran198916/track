<?php

use yii\helpers\Html;
use frontend\components\RankingWidget;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/* @var $this yii\web\View */

?>

<div class="container filepage">
    <div class="col-md-9">
        <div class="row">
            <div class="title"><h2>第<?= $model->idx?>届<?= $model->awards->name?> <small>(<?= $model->year?>)</small></h2></div>
            <div class="col-xs-12 col-sm-4 col-md-4 poster">
                <img class="img-responsive img-rounded animated bounceIn" src="<?= Yii::$app->params['adminhost'].$model->pic ?>" style="width: 150px;height: 222px;" alt="<?= $model->awards->name?>图片"></div>
            <div class="col-xs-12 col-sm-8 col-md-8 m-t-15">
                <table border="0" class="file-intro">
                    <tbody>
                    <tr><td>届次</td><td><?= $model->idx?> 届</td></tr>
                    <tr><td>奖项</td><td><?= $model->awards->name?> </td></tr>
                    <tr><td>年份</td><td><?= $model->year?> 年</td></tr>
                    <tr><td>地区</td><td><?= $model->city?> </td></tr>
                    <tr><td> </td><td> </td></tr>
                    <tr><td>发布</td><td><?= date('Y-m-d',$model->create_time)?></td></tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row m-t-10">
            <?php
            if($model->awardsitemhit):
            foreach ($model->awardsitemhit as $vo):?>

            <div class="title"><h3><?= $vo['name']?> <small>Festivals</small></h3></div>
            <div class="intro clearfix">
                <?php
                if($vo['hit']):
                    foreach ($vo['hit'] as $k => $v):?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <a href="<?= $v->movie->detail?>" target="_blank">
                                <div class="thumbnail bounceIn animated">
                                    <span class="label label-<?= ($v->is_hit == 0) ? 'danger' : 'success' ?>" style="left: 40px;"><?= $v->hitText ?></span>
                                    <img class="l_d" src="<?= Yii::$app->params['adminhost'].$v->movie->cover?>" alt="<?= $v->movie->name?>电影海报" style="display: block;">
                                    <div class="caption text-center"><?= $v->movie->name?></div></div></a>
                        </div>
                    <?php
                    endforeach;
                endif;?>
            </div>
            <?php
                endforeach;
            endif;?>
        </div>
    </div>
    <div class="col-md-3 bounceInLeft animated" style="padding-right:5px">
        <div class="list-group">
            <a href="javascript:" class="list-group-item loading active">最新发布</a>
            <?= RankingWidget::widget(['items'=>$news, 'type' => 'time'])?>
        </div>
        <div class="list-group">
            <a href="javascript:" class="list-group-item active">点击排行</a>
            <?= RankingWidget::widget(['items'=>$hots])?>
        </div>
    </div>

</div>