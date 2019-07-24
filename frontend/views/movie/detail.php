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
            <div class="title"><h2><?= $model->name?>&nbsp;<small><?= $model->foreign_name?> (<?= $model->year?>)</small></h2></div>
            <div class="col-xs-12 col-sm-5 col-md-5 poster">
                <img class="img-responsive img-rounded animated bounceIn" src="<?= Yii::$app->params['adminhost'].$model->cover ?>" style="width: 300px;height: 444px;" alt="<?= $model->name?>电影海报"></div>
            <div class="col-xs-12 col-sm-7 col-md-7 m-t-15"><table border="0" class="file-intro"><tbody>
                    <?php if($model->foreign_name): ?>
                        <tr><td>又名</td><td><?= $model->foreign_name ?></td></tr>
                    <?php endif;?>

                    <tr><td>导演</td><td><?= $model->director_id ?></td></tr>
                    <tr><td>音乐</td><td><?= $model->musicians ?></td></tr>
                    <tr><td>年份</td><td><?= $model->year?> 年</td></tr>
                    <tr><td>片长</td><td><?= $model->duration ?>分钟</td></tr>
                    <tr><td> </td><td> </td></tr>
                    <tr><td>发布</td><td><?= date('Y-m-d',$model->create_time)?></td></tr>
                    <tr><td>浏览</td><td><?= $model->count ?> 次</td></tr>
                    </tbody></table>

                <table class="score-intro"><tbody><tr>
                        <th align="center" scope="col">
                            <a href="https://movie.douban.com/subject/<?= $model->douban_id ?>/" target="_blank" class="score-block btn-success img-circle animated rotateIn" data-toggle="tooltip" data-placement="top" title="" data-original-title="豆瓣">7<small>.6</small></a>
                        </th>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="row m-t-10">
            <div class="title"><h3>音乐简介 <small>Description</small></h3></div>
            <div class="intro">
                　　<?= strip_tags($model->desc) ?>
            </div>

            <div class="title"><h3>曲目列表 <small>Lists</small></h3></div>
            <div class="intro">
                <?php
                if($model->episodes):
                    foreach ($model->episodes as $k => $v):?>
                        <div class="SongRow__container___3eT_L"><span class="Anchor__placeholder___2VPN4"></span>
                            <div class="SongRow__row___2Bih9">
                                <div class="SongRow__side___2rJx8">
                                    <div id="SoundPlayer-sound0" class="SoundPlayer__container___3qMnc SongEventRow__soundPlayer___2ku9n SoundPlayer__inverse___30f0B SoundPlayer__noArt___1HLUm">
                                        <h4 style="font-size:40px;" class><?= $v->min.":".$v->sec ?></h4>

                                    </div>
                                </div>
                                <div class="SongRow__center___1HKjk">
                                    <h4 class="SongTitle__heading___3kxXK"><a href="javascript:" class="SongTitle__link___2OQHD" title="Heaven"><?= $v->name ?></a></h4>
                                    <div class="SongEventRow__subtitle___3Qli4"><a href="javascript:" class="Subtitle__subtitle___1rSyh"><?= $v->musicians ?></a></div>
                                </div>
                                <div class="SongRow__side___2rJx8">
                                    <div class="Vote__container___210Sb"><span><a href="javascript:" target="_self" class="Button__empty_yellow___2QACo Button__common___KEFlQ Button__empty___2bBGW Button__rounded___3h95S Vote__button___2_mZE">OK.</a></span>
                                    </div>
                                </div>

                            </div>
                            <div class="SongRow__row___2Bih9" style="margin-top:-10px;">
                                <div class="SongRow__side___2rJx8 SongRow__reorderDesktop___3_UL6"></div>
                                <div class="SongRow__center___1HKjk"><div class="SongRow__descriptionContainer___2G0am"><div class="SongRow__reorderMobile___1CilR"></div><div class="SceneDescription__isEditable___1sC6E"><div class="SceneDescription__description___3Auqj"><em><?= $v->desc ?></em><span aria-hidden="true" class="fa fa-pencil SceneDescription__action___3jZYV"></span></div></div></div>
                                    <div class="SongRow__row___2Bih9">
                                        <div class="SongEventRow__storeLinks___1D_C1">
                                            <div class="StoreLinks__container___2NqeJ">
                                                <?php
                                                if($v->resources):
                                                foreach ($v->resources as $vi):?>
                                                    <a href="<?= $vi->url?>" class="StoreLinks__amazon___3afSy" target="_blank"><img
                                                                src="/static/images/<?= $vi->source->ename?>.png" alt="" style="width: 25px;"></a>
                                                <?php
                                                endforeach;
                                                endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="SongRow__side___2rJx8">
                                    <ul class="SongEventRow__actions___2UKgA"><li><span class="SongEventRow__bookmark___1w4Od undefined"><span aria-hidden="true" class="fa fa-heart-o"></span></span></li><li><span class="ShareSong__container___ECQZA"><span aria-hidden="true" class="fa fa-share-alt ShareSong__icon___1FfLo"></span></span></li></ul></div>
                            </div>
                        </div>

                    <?php
                    endforeach;
                endif;?>

            </div>


            <div class="title"><h3>资源 <small>Resources</small></h3></div>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="dwn">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group"><button type="button" class="btn btn-primary active" id="tab_all">全部</button></div>
                        <div class="btn-group"><button type="button" class="btn btn-primary" id="tab_online">在线</button></div>
                        <div class="btn-group"><button type="button" class="btn btn-primary" id="tab_download">下载</button></div>
                    </div>
                    <table class="table table-striped table-hover">
                        <tbody>
                        <?php
                        if($model->resources):
                        foreach ($model->resources as $k => $v):?>

                            <tr id="<?= ($v->is_download == 0) ?'online':'download' ?>">
                                <td>
                                    <div><?= $v->name ?></div>
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