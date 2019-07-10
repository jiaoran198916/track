<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/bootstrap.css',
        'static/css/style.css',
//        'static/css/style1.css',
        'static/css/global.css',
        'static/css/movie-detail.css',
        'static/css/movie-homepage.css',
        'static/fonts/NotoSans-Regular.ttf',
        'static/fonts/glyphicons-halflings-regular.woff2',
    ];
    public $js = [
        'static/js/jquery-1.11.3.js',
        'static/js/bootstrap.js',
        'static/js/jquery.dotdotdot.js',
        'static/js/movie-homepage.js',
        'static/js/responsiveslides.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
