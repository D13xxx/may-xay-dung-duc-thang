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
        'css/site.css',
        'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css',
        'theme/css/theme-default.css',
    ];
    public $js = [
        'theme/js/plugins/jquery/jquery.min.js',
        'theme/js/plugins/jquery/jquery-ui.min.js',
        'theme/js/plugins/bootstrap/bootstrap.min.js',
        'theme/js/plugins/icheck/icheck.min.js',
        'theme/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js',
        'theme/js/plugins/scrolltotop/scrolltopcontrol.js',
        'theme/js/plugins/morris/raphael-min.js',
        'theme/js/plugins/morris/morris.min.js',
        'theme/js/plugins/rickshaw/d3.v3.js',
        'theme/js/plugins/rickshaw/rickshaw.min.js',
        'theme/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'theme/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'theme/js/plugins/bootstrap/bootstrap-datepicker.js',
        'theme/js/plugins/owl/owl.carousel.min.js',
        'theme/js/plugins/moment.min.js',
        'theme/js/plugins/daterangepicker/daterangepicker.js',
        'theme/js/plugins/tableexport/tableExport.js',
        'theme/js/plugins/datatables/jquery.dataTables.min.js',
        'theme/js/plugins/datatables/jquery.base64.js',
        'theme/js/settings.js',
        'theme/js/plugins.js',
        'theme/js/actions.js',
        'theme/js/demo_dashboard.js',
        'theme/js/settings.js',
        'theme/js/plugins.js',
        'theme/js/actions.js',
        'js/app.js',
        'js/crop-cat.js?v=21',
        'js/crop.js',
        'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js',
        'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js',
        'js/jquery.timeago.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
