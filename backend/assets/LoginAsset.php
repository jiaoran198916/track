<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Login backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'static/css/reset.css',
//        'static/css/text.css',
    ];
    public $js = [
        "/static/bower_components/bootstrap/dist/js/bootstrap.min.js",
        "/static/bower_components/datatables.net/js/jquery.dataTables.min.js",
        "/static/bower_components/select2/dist/js/select2.full.min.js",
        "/static/bower_components/datatables.net/js/jquery.dataTables.js",
        "/static/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js",
        "/static/bower_components/jquery-slimscroll/jquery.slimscroll.min.js",
        "/static/bower_components/fastclick/lib/fastclick.js",
        "/static/dist/js/adminlte.min.js",
        "/static/dist/js/demo.js",
        "/static/plugins/input-mask/jquery.inputmask.js",
        "/static/plugins/iCheck/icheck.min.js",
        "/static/plugins/input-mask/jquery.inputmask.date.extensions.js",
        "/static/plugins/input-mask/jquery.inputmask.extensions.js",
        "/static/dialog/layer.js",
        "/js/dialog.js",
    ];
    public $depends = [
       'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
