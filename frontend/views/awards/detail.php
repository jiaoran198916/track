<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\RankingWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
use yii\helpers\Url;

/* @var $this yii\web\View */

?>

<div class="container filepage">
    <div class="col-md-9">
        <div class="row">
            <div class="title"><h2><?= $model->name?>&nbsp;<small><?= $model->ename?></small></h2></div>
            <div class="col-xs-12 col-sm-4 col-md-4 poster">
                <img class="img-responsive img-rounded animated bounceIn" src="<?= Yii::$app->params['adminhost'].$model->pic ?>" style="width: 318px;height: 180px;" alt="<?= $model->name?>图片"></div>
            <div class="col-xs-12 col-sm-8 col-md-8 m-t-15"><table border="0" class="file-intro"><tbody>
                    <?php if($model->ename): ?>
                        <tr><td>又名</td><td><?= $model->ename ?></td></tr>
                    <?php endif;?>

                    <tr><td>地区</td><td><?= $model->city?> </td></tr>
                    <tr><td>奖项</td><td><?= $model->items?> </td></tr>
                    <tr><td> </td><td> </td></tr>
                    <tr><td>发布</td><td><?= date('Y-m-d',$model->create_time)?></td></tr>
                    </tbody></table>

            </div>
        </div>
        <div class="row m-t-10">
            <div class="title"><h3>描述 <small>Description</small></h3></div>
            <div class="intro">
                　　<?= $model->desc ?>
            </div>


            <div class="title"><h3>历届电影节 <small>Festivals</small></h3></div>
            <div class="intro">
                <?php
                if($model->awardsitems):
                    foreach ($model->awardsitems as $k => $v):?>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                        <a class="btn btn-primary btn-block" href="<?= $v->detail?>" role="button" target="_blank">第 <?= $v->idx?> 届 <samll>(<?= $v->year?>)</samll></a>
                        </div>
                    <?php
                    endforeach;
                endif;?>
            </div>
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