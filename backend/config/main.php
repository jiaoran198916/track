<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/params.php')
);

return [
    'id' => 'app-backend',
    'language' => 'zh-CN',
    'timeZone' => 'Asia/Shanghai',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
        ],
        'user' => [
            'identityClass' => 'common\models\Adminuser',
            'enableAutoLogin' => true,
        ],
        'session' => [
            'name' => 'PHPBACKSESSION',
            'savePath' => sys_get_temp_dir(),
        ],
        'request' => [
            'cookieValidationKey' => 'sdfjjksloeedf78789',
            'csrfParam' => '_adminCSRF',
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
            'rules' => [
                "/" => "index",
//                '<controller:(post|comment)>s'=>'<controller>/index',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//                '<controller:\w+>/<id:\d+>/<action:(create|update|delete)>'=>'<controller>/<action>',
            ],
        ],

    ],
    'params' => $params,
];
