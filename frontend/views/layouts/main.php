<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="top-header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a href="<?= Url::to(['movie/index'])?>"><img src="/uploads/images/logo2.png" alt=""></a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?= Url::to(['movie/index'])?>" target="_blank">首页<span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['movie/index'])?>" target="_blank">电影</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['post/detail'])?>" target="_blank">关于</a>
                        </li>
                    </ul>
                    <div class="search">
                        <form>
                            <input type="search" value="" name="MovieSearch[name]" placeholder="搜索电影、音乐人">
                            <button type="submit" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </button>
                        </form>
                        <ul class="search-list">
                            <li>
                                <a href="#">
                                    <div class="img-block">
                                        <img src="/uploads/images/poster/p2263582212.jpg"/>
                                    </div>
                                    <div class="movie-detail">
                                        <h3 class="title">
                                            复仇者联盟
                                            <span class="time color-grey">
														2017
													</span>
                                        </h3>
                                        <p class="detail color-grey">
                                            哈哈
                                        </p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="img-block">
                                        <img src="/uploads/images/poster/p2263582212.jpg"/>
                                    </div>
                                    <div class="movie-detail">
                                        <h3 class="title">
                                            复仇者联盟
                                            <span class="time color-grey">
														2017
													</span>
                                        </h3>
                                        <p class="detail color-grey">
                                            哈哈
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="/uploads/images/h1.png" alt=""><span>游客</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Profile</a>
                                </li>
                                <li>
                                    <a href="#">Sign in</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<?= $content ?>

<div class="footer" id="footer">
    <a href="javascript:void(0);" id="toTop" style="display: block;"></a>
    <div class="container">
        <span class="footer-logo"></span>
        <p class="law-info">
            Copyright © 2016.Company name All rights reserved.More
        </p>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
