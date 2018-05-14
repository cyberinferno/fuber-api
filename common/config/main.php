<?php
use common\components\PhpdotenvLoader;
use yii\i18n\PhpMessageSource;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        PhpdotenvLoader::class
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => PhpMessageSource::class,
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'models' => 'model.php'
                    ],
                ],
            ],
        ]
    ]
];
