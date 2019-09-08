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
                <img class="img-responsive img-rounded animated bounceIn" src="<?= Yii::$app->params['adminhost'].$model->pic ?>" style="width: 150px;height: 222px;" alt="<?= $model->name?>图片"></div>
            <div class="col-xs-12 col-sm-8 col-md-8 m-t-15"><table border="0" class="file-intro"><tbody>
                    <?php if($model->ename): ?>
                        <tr><td>又名</td><td><?= $model->ename ?></td></tr>
                    <?php endif;?>

                    <tr><td>职业</td><td><?= $model->typeText ?></td></tr>
                    <tr><td>性别</td><td><?= $model->sexText ?></td></tr>
                    <tr><td>出生</td><td><?= $model->birthday ?></td></tr>
                    <tr><td>地区</td><td><?= $model->city?> </td></tr>
                    <tr><td>官网</td><td><a href="<?= $model->official?>" target="_blank"><?= $model->official?></a> </td></tr>
                    <tr><td>豆瓣</td><td><a href="https://movie.douban.com/celebrity/<?= $model->douban_id ?>/" target="_blank"><?= $model->douban_id ?></a></td></tr>
                    <tr><td> </td><td> </td></tr>
                    <tr><td>发布</td><td><?= date('Y-m-d',$model->create_time)?></td></tr>
                    </tbody></table>

            </div>
        </div>
        <div class="row m-t-10">
            <div class="title"><h3>简介 <small>Description</small></h3></div>
            <div class="intro">
                　　<?= $model->desc ?>
            </div>


            <div class="title"><h3>主要作品 <small>Works</small></h3></div>
            <div class="tab-content">

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