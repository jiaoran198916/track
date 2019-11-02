<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppsAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppsAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <?= Html::csrfMetaTags() ?>
    <meta name="keywords" content="电影原声,皎然影音乐,原声,原声带,OST,电影音乐,Soundtrack,原声下载,原声音乐下载，score">
    <meta name="Description" content="皎然影音乐，专注于电影音乐的盘点与分享">
    <title>皎然影音乐 - 专注于电影音乐的盘点与分享</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!--preloading-->
<div id="preloader">
    <img class="logo" src="/static/images/logo.png" alt="" width="277">
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>
<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>Login</h3>
        <form method="post" action="login.php">
            <div class="row">
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>

            <div class="row">
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="******" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <div class="remember">
                    <div>
                        <input type="checkbox" name="remember" value="Remember me"><span>Remember me</span>
                    </div>
                    <a href="#">Forget password ?</a>
                </div>
            </div>
            <div class="row">
                <button type="submit">Login</button>
            </div>
        </form>
        <div class="row">
            <p>Or via social</p>
            <div class="social-btn-2">
                <a class="fb" href="#"><i class="ion-social-facebook"></i>Facebook</a>
                <a class="tw" href="#"><i class="ion-social-twitter"></i>twitter</a>
            </div>
        </div>
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>sign up</h3>
        <form method="post" action="signup.php">
            <div class="row">
                <label for="username-2">
                    Username:
                    <input type="text" name="username" id="username-2" placeholder="Hugh Jackman" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
            </div>

            <div class="row">
                <label for="email-2">
                    your email:
                    <input type="password" name="email" id="email-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="password-2">
                    Password:
                    <input type="password" name="password" id="password-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <label for="repassword-2">
                    re-type Password:
                    <input type="password" name="password" id="repassword-2" placeholder="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
            </div>
            <div class="row">
                <button type="submit">sign up</button>
            </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<header class="ht-header">
    <div class="container">
        <nav class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <a href="/"><img class="logo" src="/static/images/logo.png" alt="" width="277" style=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" href="/">
                            首页
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" href="/">
                            电影
                        </a>
                    </li>
<!--                    <li class="dropdown first">-->
<!--                        <a class="btn btn-default dropdown-toggle lv1" href="/master">-->
<!--                            音乐家-->
<!--                        </a>-->
<!--                    </li>-->
                    <!--<li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" href="/post">
                            博客
                        </a>
                    </li>
                    <li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" href="/about">
                            关于
                        </a>
                    </li>-->
                    <!--<li class="dropdown first">
                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                            community <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu level1">
                            <li><a href="userfavoritegrid.html">user favorite grid</a></li>
                            <li><a href="userfavoritelist.html">user favorite list</a></li>
                            <li><a href="userprofile.html">user profile</a></li>
                            <li class="it-last"><a href="userrate.html">user rate</a></li>
                        </ul>
                    </li>-->
                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
<!--                    <li class="dropdown first">-->
<!--                        <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">-->
<!--                            pages <i class="fa fa-angle-down" aria-hidden="true"></i>-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu level1">-->
<!--                            <li><a href="landing.html">Landing</a></li>-->
<!--                            <li><a href="404.html">404 Page</a></li>-->
<!--                            <li class="it-last"><a href="comingsoon.html">Coming soon</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li><a href="#">Help</a></li>-->
                    <li class="loginLink"><a href="#">登录</a></li>
                    <li class="btn signupLink"><a href="#">注册</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <!-- top search form -->
        <div class="top-search">
            <select>
                <option value="united"> 电 影 </option>
                <option value="saab"> 其 他 </option>
            </select>
            <input type="text" placeholder="搜索电影、音乐家、歌曲">
        </div>
    </div>
</header>
<!-- END | Header -->

<?= $content ?>

<!-- footer section-->
<footer class="ht-footer">
    <div class="container">
        <div class="flex-parent-ft">
            <div class="flex-child-ft item1">
<!--                <a href="/"><img class="logo" src="/static/images/logo.png" alt="" width="241"></a>-->
<!--                <p>南京, NJ</p>-->
<!--                <p>Call us: <a href="#">(+01) 920 495 391</a></p>-->
                <h4>
                    <img src="/static/images/logo.png" width="241" style="margin-bottom: 0;">
                </h4>
                <p style="font-size: 18px">专注于<strong> 电影音乐 </strong>的盘点与分享</p>
            </div>
            <div class="flex-child-ft item2">
                <h4>资源</h4>
                <ul>
                    <li><a href="/about">关于</a></li>
                    <li><a href="/post">博客</a></li>
                    <li><a href="#">联系我们</a></li>
                    <li><a href="#">广告合作</a></li>

                </ul>
            </div>
            <div class="flex-child-ft item3">
                <h4>服务</h4>
                <ul>
                    <li><a href="#">使用说明</a></li>
                    <li><a href="#">隐私政策</a></li>
                    <li><a href="#">帮助中心</a></li>
                    <li><a href="#">
                            <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? "https://" : "http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1277889664'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s9.cnzz.com/z_stat.php%3Fid%3D1277889664%26online%3D2' type='text/javascript'%3E%3C/script%3E"));</script>
                            <script type="text/javascript" src="https://s9.cnzz.com/z_stat.php?id=1277889664&web_id=1277889664"></script></a></li>
                </ul>
            </div>
            <div class="flex-child-ft item4">
                <h4>账户</h4>
                <ul>
                    <li><a href="#">我的账户</a></li>
                    <li><a href="#">我的收藏</a></li>
                    <li><a href="#">我的评论</a></li>
                    <li><a href="#">用户指南</a></li>
                </ul>
            </div>
            <div class="flex-child-ft item5">
                <h4>订阅我们</h4>
                <p>关注我们的订阅，<br> 可第一时间获取资讯</p>
                <form action="#">
                    <input type="text" placeholder="输入您的邮箱...">
                </form>
                <a href="#" class="btn">立即订阅<i class="ion-ios-arrow-forward"></i></a>
            </div>
        </div>
    </div>
<!--    <div class="ft-copyright">-->
<!--        <div class="ft-left">-->
<!--            <p><a href="http://www.miibeian.gov.cn/" target="_blank">苏ICP备19038064号-1</a></p>-->
<!--        </div>-->
<!--        <div class="backtotop">-->
<!--            <p><a href="#" id="back-to-top">Back to top  <i class="ion-ios-arrow-thin-up"></i></a></p>-->
<!--        </div>-->
<!--    </div>-->
</footer>
<!-- end of footer section-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
