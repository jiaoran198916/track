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
        'static/css/bootstrap.min.css',
        'static/css/font-awesome.min.css',
        'static/css/ihd.css',
        'static/css/common.css?v=0006'
    ];
    public $js = [
        'static/js/jquery.min.js',
        'static/js/bootstrap.min.js',
        'static/js/ihd.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
