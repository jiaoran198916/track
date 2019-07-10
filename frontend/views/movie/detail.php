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


<div class="container" id="container">
    <div class="content">
        <div class="content-left">
            <ul class="movie-intro-list">
                <li class="intro-box">
                    <div class="title-box">
                        <h1 class="intro-title" style="font-size: 30px;font-weight: bolder;margin-bottom: 10px;">
                            <?= $model->name ?> (<?= $model->year ?>)
                        </h1>
<!--                        <p class="score">-->
<!--                            <span class="color-grey">豆瓣</span>-->
<!--                            <span class="color-red">6.5</span>-->
<!--                        </p>-->
                    </div>
                    <div class="intro-detail">
                        <div class="img-box">
                            <img src="<?= $model->cover ?>" />
                        </div>
                        <div class="text-box">
                            <div class="music-detail">
                                <?php if($model->foreign_name): ?>
                                <p>
                                    <span class="color-black">原名：</span>
                                        <?= $model->foreign_name ?>
                                </p>
                                <?php endif;?>
                                <p>
                                    <span class="color-black">音乐：</span>
                                    <a href="#" alt="<?= $model->musician_id ?>" title="<?= $model->musician_id ?>" target="_blank">
                                        <?= $model->musician_id ?>
                                    </a>

                                </p>
                                <p>
                                    <span class="color-black">年份：</span>
                                        <?= $model->year ?>
                                </p>
                                <p>
                                    <span class="color-black">时长：</span>
                                        <?= $model->duration ?>

                                </p>


                                <p>
                                    <span class="color-black">豆瓣 ID：</span>
                                    <a href="<?= Yii::$app->params['doubanurl'].$model->douban_id ?>" alt="<?= $model->name ?>" title="<?= $model->name ?>" target="_blank">
                                        <?= $model->douban_id ?>
                                    </a>
                                </p>
                                <p>
                                    <br>
                                </p>
                                <p>
                                    <span class="color-black">发布时间：</span>
                                        <?= date('Y-m-d',$model->create_time); ?>
                                </p>
                                <p>
                                    <span class="color-black">最后修改：</span>
                                        <?= date('Y-m-d',$model->update_time); ?>

                                </p>
                            </div>
                            <div class="movie-detail">
                                <p class="movie-message">
                                    <span class="color-grey">阅读</span>
                                    <span class="color-grey"><?= $model->count ?></span>
                                </p>
<!--                                <p class="movie-labels">-->
<!--                                    <a href="#">动作</a>-->
<!--                                    <a href="#">犯罪</a>-->
<!--                                </p>-->
                                <p class="more-info">
												<span class="color-grey">
													来源
<!--                                    <a href="#">-->
                                        <?= $model->user_id ?>
                                                    </span>
<!--                                    </a>-->
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="movie-information">
                <div>
                    <h3 class="title block-title">配乐简介</h3>
                    <p class="detail color-grey">
                        <?= strip_tags($model->desc) ?>
                    </p>
                </div>
            </div>
            <div class="music-table-list">
                <h3 class="block-title">
                    歌曲列表
                </h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>序号</th>
                        <th>位置</th>
                        <th>标题</th>
                        <th>简介</th>
                        <th>时长</th>
                        <th>歌手</th>
                        <th>友情链接</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->episodes as $k => $v):?>

                    <tr>
                        <td><?= ($k+1) ?></td>
                        <td><?= $v->timing ?></td>
                        <td><?= $v->name ?></td>
                        <td><?= $v->summary ?></td>
                        <td><?= $v->seconds ?></td>
                        <td><?= $v->singer->name ?></td>
                        <td>
                            <a href="#" class="icon-wangyiyun"></a>
                            <a href="#" class="icon-qqmusic"></a>
                            <a href="#" class="icon-kugou"></a>
                            <a href="#" class="icon-kuwo"></a>
                        </td>
                    </tr>
                    <?php endforeach;?>

                    </tbody>
                </table>
            </div>
            <div class="download-block">
                <div>
                    <h3 class="block-title">
                        资源下载
                    </h3>
                    <ul class="source-list">

                        <?php foreach ($model->resources as $k => $v):?>

                            <li>
                                <span class="source color-grey">
                                    <?php
                                    echo Yii::$app->params['resourceType'][$v->status]; ?>
                                </span>
                                <a href="<?= $v->link ?>" alt="<?= $v->title ?>" title="<?= $v->title ?>" target="_blank">

                                    <?= $v->title ?>
                                </a>
                                <span class="color-grey" style="font-size: 12px;"><?= $v->desc ?></span>
                            </li>
                        <?php endforeach;?>

                    </ul>
                </div>

            </div>
            <div class="recommend-block">
                <div>
                    <h3 class="block-title">
                        精彩推荐
                    </h3>

                    <?php foreach ($model->randomData as $k => $v):?>

                        <div class="recommend-box">
                            <div class="img-block">
                                <a href="<?= $v->url ?>" alt="<?= $v->name ?>" title="<?= $v->name ?>" target="_blank"><img src="<?= $v->cover ?>"/></a>
                            </div>
                            <p class="detail color-black">
                                <a href="<?= $v->url ?>" alt="<?= $v->name ?>" title="<?= $v->name ?>" target="_blank"><?= $v->name ?></a>
                            </p>
                        </div>
                    <?php endforeach;?>



                </div>

            </div>
        </div>
        <div class="content-right">
            <div class="sort-box">
                <ul class="sort-list">

<!--                    --><?//= TagsCloudWidget::widget(['tags'=>$tags])?>

                    <li class="list-title">
                        最新电影
                    </li>
                    <?= RankingWidget::widget(['items'=>$news, 'type' => 'time'])?>
                </ul>
            </div>
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


<!--    <div class="container">-->
<!---->
<!--	<div class="row">-->
<!--	-->
<!--		<div class="col-md-9">-->
<!--		-->
<!--			<ol class="breadcrumb">-->
<!--			<li><a href="--><?//= Yii::$app->homeUrl;?><!--">首页</a></li>-->
<!--			<li><a href="--><?//= Url::to(['post/index']);?><!--">文章列表</a></li>-->
<!--			<li class="active">--><?//= $model->title?><!--</li>-->
<!--			</ol>-->
<!--			-->
<!--			<div class="post">-->
<!--				<div class="title">-->
<!--					<h2><a href="--><?//= $model->url;?><!--">--><?//= Html::encode($model->title);?><!--</a></h2>				-->
<!--						<div class="author">-->
<!--						<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em>--><?//= date('Y-m-d H:i:s',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><!--</em>-->
<!--						<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em>--><?//= Html::encode($model->author->nickname);?><!--</em>-->
<!--						</div>				-->
<!--				</div>-->
<!--		-->
<!--			-->
<!--			<br>-->
<!--			-->
<!--			<div class="content">-->
<!--			--><?//= HTMLPurifier::process($model->content)?>
<!--			</div>-->
<!--			-->
<!--			<br>-->
<!--			-->
<!--			<div class="nav">-->
<!--				<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>-->
<!--				--><?//= implode(', ',$model->tagLinks);?>
<!--				<br>-->
<!--				--><?//= Html::a("评论({$model->commentCount})",$model->url.'#comments');?>
<!--				最后修改于--><?//= date('Y-m-d H:i:s',$model->update_time);?>
<!--			</div>-->
<!--		</div>-->
<!--		-->
<!--		<div id="comments">-->
<!--		-->
<!--			--><?php //if($added) {?>
<!--			<br>-->
<!--			<div class="alert alert-warning alert-dismissible" role="alert">-->
<!--			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
<!--			  -->
<!--			  <h4>谢谢您的回复，我们会尽快审核后发布出来！</h4>-->
<!--			  -->
<!--			  <p>--><?//= nl2br($commentModel->content);?><!--</p>-->
<!--			  	<span class="glyphicon glyphicon-time" aria-hidden="true"></span><em>--><?//= date('Y-m-d H:i:s',$model->create_time)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><!--</em>-->
<!--				<span class="glyphicon glyphicon-user" aria-hidden="true"></span><em>--><?//= Html::encode($model->author->nickname);?><!--</em>	  -->
<!--			</div>			-->
<!--			--><?php //}?>
<!--			-->
<!--			--><?php //if($model->commentCount>=1) :?>
<!--			-->
<!--			<h5>--><?//= $model->commentCount.'条评论';?><!--</h5>-->
<!--			--><?//= $this->render('_comment',array(
//					'post'=>$model,
//					'comments'=>$model->activeComments,
//			));?>
<!--			--><?php //endif;?>
<!--			-->
<!--			<h5>发表评论</h5>-->
<!--			--><?php //
//			$commentModel =new Comment();
//			echo $this->render('_guestform',array(
//					'id'=>$model->id,
//					'commentModel'=>$commentModel,
//			));?>
<!--			-->
<!--			</div>-->
<!--					-->
<!--		</div>-->
<!---->
<!--		-->
<!--		<div class="col-md-3">-->
<!--			<div class="searchbox">-->
<!--				<ul class="list-group">-->
<!--				  <li class="list-group-item">-->
<!--				  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> 查找文章-->
<!--				  </li>-->
<!--				  <li class="list-group-item">				  -->
<!--					  <form class="form-inline" action="index.php?r=post/index" id="w0" method="get">-->
<!--						  <div class="form-group">-->
<!--						    <input type="text" class="form-control" name="PostSearch[title]" id="w0input" placeholder="按标题">-->
<!--						  </div>-->
<!--						  <button type="submit" class="btn btn-default">搜索</button>-->
<!--					</form>-->
<!--				  -->
<!--				  </li>-->
<!--				</ul>			-->
<!--			</div>-->
<!--			-->
<!--			<div class="tagcloudbox">-->
<!--				<ul class="list-group">-->
<!--				  <li class="list-group-item">-->
<!--				  <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> 标签云-->
<!--				  </li>-->
<!--				  <li class="list-group-item">-->
<!--				  --><?//= TagsCloudWidget::widget(['tags'=>$tags])?>
<!--				   </li>-->
<!--				</ul>			-->
<!--			</div>-->
<!--			-->
<!--			-->
<!--			<div class="commentbox">-->
<!--				<ul class="list-group">-->
<!--				  <li class="list-group-item">-->
<!--				  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 最新回复-->
<!--				  </li>-->
<!--				  <li class="list-group-item">-->
<!--				  --><?//= RctReplyWidget::widget(['recentComments'=>$recentComments])?>
<!--				  </li>-->
<!--				</ul>			-->
<!--			</div>-->
<!--			-->
<!--		-->
<!--		</div>-->
<!--		-->
<!--		-->
<!--	</div>-->
<!---->
<!--</div>-->
