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
        'static/css/ihd.css',
        'static/css/common.css?v=0001',
        'static/fonts/NotoSans-Regular.ttf',
        'static/fonts/glyphicons-halflings-regular.woff2',
    ];
    public $js = [
        'static/js/jquery-1.11.3.js',
        'static/js/bootstrap.js',
        'static/js/ihd.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
