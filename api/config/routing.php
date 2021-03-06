<?php
return [
    'POST oauth2/<action:\w+>' => 'oauth2/rest/<action>',
    [
        'class'             => 'yii\rest\UrlRule',
        'controller'        => [
            'car'
        ],
        'pluralize'         => false,
        'except' => ['create', 'update', 'delete']
    ],
    [
        'class'             => 'yii\rest\UrlRule',
        'controller'        => [
            'booking'
        ],
        'pluralize'         => false,
        'except' => ['index', 'delete']
    ],
];
