<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use frontend\components\RankingWidget;
use frontend\components\RctReplyWidget;

use yii\helpers\HtmlPurifier;
use common\models\Comment;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="container filepage">
    <div class="col-md-9">
        <div class="row">
            <div class="title"><h2><?= $model->name?>&nbsp;<small><?= $model->ename?> (<?= $model->year?>)</small></h2></div>
            <div class="col-xs-12 col-sm-4 col-md-4 poster">
                <img class="img-responsive img-rounded animated bounceIn" src="<?= (strpos($model->cover, 'uploads') !== false) ? Yii::$app->params['adminhost'].$model->cover : Yii::$app->params['cdnHost'].$model->cover ?>" style="width: 225px;height: 333px;" alt="<?= $model->name?>电影海报"></div>
            <div class="col-xs-12 col-sm-7 col-md-7 m-t-15"><table border="0" class="file-intro"><tbody>
                    <?php if($model->ename): ?>
                        <tr><td>又名</td><td><?= $model->ename ?></td></tr>
                    <?php endif;?>

                    <tr><td>导演</td><td><?= $model->director ?></td></tr>
                    <tr><td>作曲</td><td><?= $model->master ?></td></tr>
                    <tr><td>年份</td><td><?= $model->year?> 年</td></tr>
                    <tr><td>片长</td><td><?= $model->duration ?>分钟</td></tr>
                    <tr><td>地区</td><td><?= $model->area ?></td></tr>
                    <tr><td>类型</td><td><?= $model->type ?></td></tr>
                    <tr><td>语言</td><td><?= $model->language ?></td></tr>
                    <tr><td> </td><td> </td></tr>
                    <tr><td>发布</td><td><?= date('Y-m-d',$model->create_time)?></td></tr>
                    <tr><td>浏览</td><td><?= $model->count ?> 次</td></tr>
                    <tr><td> </td><td> </td></tr>
                    <tr><td>豆瓣</td>
                        <td>
                            <a href="https://movie.douban.com/subject/<?= $model->douban_id ?>/" target="_blank" class=""><?= $model->douban_id ?></a>
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </div>
        <div class="row m-t-10">
            <br>
            <div class="title"><h3>剧情简介 <small>Storyline</small></h3></div>
            <div class="intro bg text-common">
                　　<?= $model->desc ?>
            </div>
            <br>
            <?php if(!empty($model->music_desc)): ?>
            <div class="title"><h3>音乐简介 <small>Description</small></h3></div>
            <div class="intro bg text-common">
                　　<?= $model->music_desc ?>
            </div>
            <?php endif; ?>
            <br>

            <div class="title" id="songList"><h3>曲目列表 <small>Lists</small></h3></div>
            <div class="intro">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">定位</th>
                        <th scope="col">名称</th>
                        <th scope="col">歌手</th>
                        <th scope="col">试听</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($model->episodes):
                    foreach ($model->episodes as $k => $v):?>
                    <tr>
                        <th scope="row"><?= ($k+1)?></th>
                        <td><?= $v->min.":".$v->sec ?></td>
                        <td><?= $v->name ?>&nbsp;<?= $v->ename ?><br>
                            <span style="font-size: 13px;font-style: italic"><?= $v->desc ?></span></td>
                        <td><?= $v->musicians ?></td>
                        <td>
                            <?php
                            if($v->resources):
                                foreach ($v->resources as $vi):?>
                                    <a href="<?= $vi->url?>" class="" target="_blank">
                                        <img src="/static/images/<?= $vi->source->ename?>.png" alt="" style="width: 25px;">
                                    </a>
                                <?php
                                endforeach;
                            endif;?>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    endif;?>

                    </tbody>
                </table>
            </div>


            <div class="title"><h3>资源 <small>Resources</small></h3></div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="dwn">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group"><button type="button" class="btn btn-success active" id="tab_all">全部</button></div>
                        <div class="btn-group"><button type="button" class="btn btn-success" id="tab_online">在线&nbsp;<span class="badge"><?= $onlineCount?></span></button></div>
                        <div class="btn-group"><button type="button" class="btn btn-success" id="tab_download">下载&nbsp;<span class="badge"><?= count($model->resources) - $onlineCount?></span></button></div>
                    </div>
                    <table class="table table-striped table-hover">
                        <tbody>
                        <?php
                        if($model->resources):
                        foreach ($model->resources as $k => $v):?>

                            <tr id="<?= ($v->is_download == 0) ?'online':'download' ?>">
                                <td>

                                    <div><img src="/static/images/cdbao.png" alt="" height="20"><?= $v->name ?></div>
                                    <?php if(!Yii::$app->user->isGuest):
                                    ?>
                                    <div style="padding-left: 20px"><?= $v->desc ?></div>
                                    <?php endif;
                                    ?>
<!--                                    <div class="label label-default">7.6 GB</div><div class="label label-success">磁力</div>-->
                                </td>
                                <td class="t_dwn"><a href="<?= $v->url ?>" target="_blank" class="btn btn-default pull-right"><?= ($v->is_download == 0) ?'跳转':'下载' ?></a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        endif;?>
                        </tbody>
                    </table>
                </div>

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