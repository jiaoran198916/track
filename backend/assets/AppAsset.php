<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'static/css/local.css',
//        'static/css/reset.css',
//        'static/css/text.css',
//        'static/css/fonts/ptsans/stylesheet.css',
//        'static/css/fluid.css',
//        'static/css/mws.style.css',
//        'static/css/icons/icons.css',
//        'static/css/demo.css',
//
//        'static/plugins/colorpicker/colorpicker.css',
//        'static/plugins/jimgareaselect/css/imgareaselect-default.css',
//        'static/plugins/fullcalendar/fullcalendar.css',
//        'static/plugins/fullcalendar/fullcalendar.print.css',
//        'static/plugins/tipsy/tipsy.css',
//        'static/plugins/sourcerer/Sourcerer-1.2.css',
//        'static/plugins/jgrowl/jquery.jgrowl.css',
//        'static/plugins/spinner/spinner.css',
//        'static/css/jui/jquery.ui.css',
//        'static/css/mws.theme.css'
    ];
    public $js = [
    
//    "/static/bower_components/jquery/dist/jquery.min.js",
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
    "/static/plugins/input-mask/jquery.inputmask.date.extensions.js",
    "/static/plugins/input-mask/jquery.inputmask.extensions.js",
    "/static/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
    "/static/dialog/layer.js",
    "/js/dialog.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
