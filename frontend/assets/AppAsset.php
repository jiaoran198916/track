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
        'frontend/web/static/css/bootstrap.css',
        'frontend/web/static/css/style.css',
//        'static/css/style1.css',
        'frontend/web/static/css/global.css',
        'frontend/web/static/css/movie-detail.css',
        'frontend/web/static/css/movie-homepage.css',
        'frontend/web/static/fonts/NotoSans-Regular.ttf',
        'frontend/web/static/fonts/glyphicons-halflings-regular.woff2',
    ];
    public $js = [
        'frontend/web/static/js/jquery-1.11.3.js',
        'frontend/web/static/js/bootstrap.js',
        'frontend/web/static/js/jquery.dotdotdot.js',
        'frontend/web/static/js/movie-homepage.js',
        'frontend/web/static/js/responsiveslides.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
