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
    <title><?= '电影原声网' ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="" href="/" > <img alt="Brand" style="height: 55px;" src="/static/images/logo.png"> </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a data-toggle="modal" data-target="#searchModal">搜索</a></li>
                <li><a href="/about">关于</a></li>
            </ul>
        </div>
    </div>
</nav>
<?= $content ?>

<!--<div class="footer" id="footer">-->
<!--    <a href="javascript:void(0);" id="toTop" style="display: block;"></a>-->
<!--    <div class="container">-->
<!--        <span class="footer-logo"></span>-->
<!--        <p class="law-info">-->
<!--            Copyright © 2016.Company name All rights reserved.More-->
<!--        </p>-->
<!--    </div>-->
<!--</div>-->

<footer class="container text-center footer" id="footer">
    <div>
    </div>

    <div>本站所有信息均由互联网爬虫自动搜索得来，相关链接已注明来源，版权归原创者所有。</div>
    <div>如果无意中侵犯了您的权益，请通知我们（<a href="mailto:920495391@qq.com" target="_blank">920495391@qq.com</a>)，我们会及时做相应处理，谢谢合作。</div>
    <div>音乐网官方QQ群： 131399457</div>
    <div><a href="/" target="_blank">© 2019 jiaoran.net</a> <a href="https://www.cnzz.com/stat/website.php?web_id=" target="_blank" title="站长统计">站长统计</a></div>
</footer>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <form action="<?= Url::to(['movie/index'])?>" method="get">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">搜索</h4>
            </div>
            <div class="modal-body">
                <input class="form-control input-lg" type="text" placeholder="支持电影中英文名称搜索" name="MovieSearch[name]">
                <!--<input id="bdcsMain" class="form-control input-lg" type="text" placeholder="支持电影中英文名称搜索">-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <a type="button" class="btn btn-danger disabled" target="_blank" style="width:100px"><i class="glyphicon glyphicon-search" style="margin-right:5px"></i>搜索</a>
            </div>
        </div>
        </form>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
