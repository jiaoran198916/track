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

        <div class="post">
            <div class="">
                <h2><a href="<?= $model->url;?>" target="_self"><?= Html::encode($model->name);?></a></h2>
                <div class="author">

                    <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;<em><?= date('m-d H:i',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
                    <i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;<em><?= $model->count."&nbsp;&nbsp;&nbsp;&nbsp;";?></em>
                </div>
            </div>

            <br>

            <div class="content text-common bg">
                <?= HTMLPurifier::process($model->content)?>
            </div>

            <br>

            <div class="nav">
                <?php
                if(!empty($model->tags)): ?>
                    <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    <?= $model->tags?>
                <?php endif;?>

                <br>
                最后修改于&nbsp;&nbsp;<?= date('Y-m-d H:i:s',$model->update_time);?>
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