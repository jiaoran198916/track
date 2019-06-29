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
        'static/css/reset.css',
        'static/css/text.css',
        'static/css/fonts/ptsans/stylesheet.css',
        'static/css/fluid.css',
        'static/css/mws.style.css',
        'static/css/icons/icons.css',
        'static/css/demo.css',

        'static/plugins/colorpicker/colorpicker.css',
        'static/plugins/jimgareaselect/css/imgareaselect-default.css',
        'static/plugins/fullcalendar/fullcalendar.css',
        'static/plugins/fullcalendar/fullcalendar.print.css',
        'static/plugins/tipsy/tipsy.css',
        'static/plugins/sourcerer/Sourcerer-1.2.css',
        'static/plugins/jgrowl/jquery.jgrowl.css',
        'static/plugins/spinner/spinner.css',
        'static/css/jui/jquery.ui.css',
        'static/css/mws.theme.css'
    ];
    public $js = [
        'static/js/jquery-1.7.1.min.js',
        'static/plugins/jimgareaselect/jquery.imgareaselect.min.js',
        'static/plugins/jquery.dualListBox-1.3.min.js',
        'static/plugins/jgrowl/jquery.jgrowl.js',
        'static/plugins/jquery.filestyle.js',
        'static/plugins/fullcalendar/fullcalendar.min.js',
        'static/plugins/jquery.dataTables.js',
        'static/plugins/flot/excanvas.min.js',
        'static/plugins/flot/jquery.flot.min.js',
        'static/plugins/flot/jquery.flot.pie.min.js',
        'static/plugins/flot/jquery.flot.stack.min.js',
        'static/plugins/flot/jquery.flot.resize.min.js',
        'static/plugins/colorpicker/colorpicker.js',
        'static/plugins/tipsy/jquery.tipsy.js',
        'static/plugins/sourcerer/Sourcerer-1.2.js',
        'static/plugins/jquery.placeholder.js',
        'static/plugins/jquery.validate.js',
        'static/plugins/jquery.mousewheel.js',
        'static/plugins/spinner/ui.spinner.js',
        'static/js/jquery-ui.js',
        'static/js/mws.js',
        'static/js/demo.js',
        'static/js/themer.js',
    ];
    public $depends = [
       //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
