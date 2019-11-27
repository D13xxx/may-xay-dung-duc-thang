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
         'theme-v2/css/site.css',
        '/theme-v2/css/bootstrap.min.css',
        '/theme-v2/css/owl.carousel.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css',
        '/theme-v2/css/jquery.custom-scrollbar.css',
        '/theme-v2/css/style.css?v=11',
        '/theme-v2/css/responsive.css?v=111',
        '/theme-v2/css/mobile/menu-reponsive.css??v=11',
        '/theme-v2/css/custom.css',
        'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
    ];
    public $js = [
        '/theme-v2/js/app.js',
        '/theme-v2/js/jquery-1.12.0.min.js',
        '/theme-v2/js/bootstrap.min.js',
        '/theme-v2/js/owl.carousel.min.js',
        '/theme-v2/js/lazyload.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js',
        '/theme-v2/js/jquery.custom-scrollbar.js',
        '/theme-v2/js/elevateZoom.min.js',
        '/theme-v2/js/main.js',
        '/theme-v2/js/slide.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}