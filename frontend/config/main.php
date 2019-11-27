<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'vi',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
//
//        'cache'=>[
//            'class'=>'yii\caching\FileCache',
//        ],
        'assetManager' => [
        'bundles' => [
            'yii\bootstrap\BootstrapPluginAsset' => [
                'js'=>[]
            ],
        ],
    ],

        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 'assetManager' => [
        //     'forceCopy' => true,
        //     'linkAssets' => false,
        // ],
//        'urlManagerBackend' => [
//            'class' => 'yii\web\urlManager',
//            'baseUrl' => 'http://cms.baohiemso.net/upload/',
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            // 'suffix' => '.html',
            'rules' => [
                '/tuyen-dung.html'=>'/site/tuyen-dung',
                '/huong-dan-thanh-toan.html'=>'/site/huong-dan-thanh-toan',
                '/chinh-sach-giao-hang.html'=>'/site/chinh-sach-giao-hang',
                '/chinh-sach-doi-tra.html'=>'/site/chinh-sach-doi-tra',
                '/chinh-sach-bao-mat-thong-tin.html'=>'/site/chinh-sach-bao-mat-thong-tin',
                
                '/gioi-thieu-cong-ty.html'=>'/site/gioi-thieu-cong-ty',
                '/he-thong-showroom.html'=>'/site/he-thong-showroom',
                '/chinh-sach-bao-hanh.html'=>'/site/chinh-sach-bao-hanh',
                '/gio-hang.html'=>'/products/add-cart-pro',
                
                '/type/<type:\d+>' => '/products/list-products-type',
                '/<slug:[\w-]+>.html' => '/products/view',
                '/site/rating'=>'/site/rating',
                '/site/error'=>'/site/error',
                '/products/destroy-pro' => '/products/destroy-pro',
                '/products/update-cart-pro' => '/products/update-cart-pro',
                '/products/destroy' => '/products/destroy',
                '/products/add-cart-ajax' => '/products/add-cart-ajax',
                '/products/search' => '/products/search',
                '/tag/<tag:[\w-]+>' => '/products/list-products-tag',
                '/<slug:[\w-]+>/<priceToPrice:[\w-]+>' => '/products/list-products-cat',
                '/<slug:[\w-]+>' => '/products/list-products-cat',
                
                // '/products/update-cart-pro' => '/products/update-cart-pro',
                '/type/<type:\d+>/<sort:[\w-]+>' => '/products/list-products-type',

                // '<controller:\w+>/<id:\d+>' => '<controller>/view',
                // '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                // '<controller:\w+>/<action:\w+>' => '<controller>/<action>
                
            ],
        ],
    ],
    'params' => $params,
];
