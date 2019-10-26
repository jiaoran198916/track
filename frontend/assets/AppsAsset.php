<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/plugins.css',
        'static/css/style.css',
    ];
    public $js = [
        'static/js/jquery.js',
        'static/js/plugins.js',
        'static/js/plugins2.js',
        'static/js/custom.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
