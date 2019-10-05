<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'cvbhnhjjnlvhcftyhdthw3f6fcuvji8',
            'baseUrl' => '',
        ],
        'imagemanager' => [
            'class' => 'noam148\imagemanager\components\ImageManagerGetPath',
            //set media path (outside the web folder is possible)
            'mediaPath' => 'assets/images',
            //path relative web folder to store the cache images
            'cachePath' => 'assets/images',
            //use filename (seo friendly) for resized images else use a hash
            'useFilename' => true,
            //show full url (for example in case of a API)
            'absoluteUrl' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['site/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false, //на сервере должен быть false, для отслеживания в runtime - true
           'transport' => [
               'class' => 'Swift_SmtpTransport',
               'host' => 'smtp.yandex.ru',
               'username' => 'info@nsp-wellness.ru',
               'password' => '90-=op[]',
               'port' => '465',
               'encryption' => 'ssl'
           ],
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'contact' => 'site/contact',
                'catalog' => 'product/catalog',
                'delivery' => 'site/delivery',
                'mailer' => 'site/mailer',
                'video' => 'site/video',
                'about' => 'page/view',
                'history' => 'page/view',
                'quality' => 'page/view',
                'laboratory' => 'page/view',
                'cert' => 'page/view',
                'research' => 'page/view',
                'healthy-life' => 'page/view',
                'members' => 'page/view',
                'healthy-nutrition' => 'page/view',
                'diagnostics' => 'page/view',
                'business' => 'page/view',
//                'price?id=([0-9]+)' => 'product/category-products?id=$1'
            ],
        ],
    ],
    'layout' => '_main',
    'language' => 'ru',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
//        'ckeditor' => [
//            'class' => 'wadeshuler\ckeditor\Module',
//        ],
        'imagemanager' => [
            'class' => 'noam148\imagemanager\Module',
            //set accces rules ()
            'canUploadImage' => true,
            'canRemoveImage' => function() {
                return true;
            },
            //add css files (to use in media manage selector iframe)
            'cssFiles' => [
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css',
            ],
        ],
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    /* 'userClassName' => 'app\models\User', */
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/_admin.php',
        ]
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/index',
            'site/index2',
            'site/login',
            'site/fake',
            'site/design',
            'site/contact',
            'site/captcha',
            'site/delivery',
            'site/mailer',
            'site/test',
            'site/video',
            'gii/*',
            'product/*',
            'set/*',            
            'post/*',
            'page/*',            
            'imagemanager/*',
            'order/*',
            'scheme/*',
            
//            'admin/*',
//            'rbac/*',
        // The actions listed here will be allowed to everyone including guests.
        // So, 'admin/*' should not appear here in the production, of course.
        // But in the earlier stages of your development, you may probably want to
        // add a lot of actions here until you finally completed setting up rbac,
        // otherwise you may not even take a first step.
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    //         // uncomment the following to add your IP if you are not connecting from localhost.
    //         //'allowedIPs' => ['127.0.0.1', '::1'],
    // ];

    // $config['bootstrap'][] = 'gii';
    // $config['modules']['gii'] = [
    //     'class' => 'yii\gii\Module',
    //         // uncomment the following to add your IP if you are not connecting from localhost.
    //         //'allowedIPs' => ['127.0.0.1', '::1'],
    // ];
}

return $config;
