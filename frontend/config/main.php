<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'movie/index',
    'layout' => 'main',
    'language' => 'zh-CN',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jNA23qte0_-8LAYACI3Lc8V0-UY6QEiw',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'suffix' => '.html',
            'rules' => [
//                '<controller:\w+>/<id:\d+>' => '<controller>/detail',
                'about' => 'post/about',
                'login' => 'site/login',
                'signup' => 'site/signup',
                'logout' => 'site/logout',
            '<controller:\w+>/<id:\d+>/'=>'<controller>/detail',
            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];
