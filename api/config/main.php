<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => '/device',
    'bootstrap' => [
        'log',
        [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => yii\web\Response::FORMAT_JSON,
                'application/xml' => yii\web\Response::FORMAT_XML,
            ],
        ]
    ],
    'controllerNamespace' => 'api\controllers',
    'modules' => [
        'oauth2' => [
            'class' => 'filsh\yii2\oauth2server\Module',
            'tokenParamName' => 'access-token',
            'tokenAccessLifetime' => 86400,
            'storageMap' => [
                'user_credentials' => '\common\models\User',
                'public_key' => '\common\models\OauthPublicKeys'
            ],
            'grantTypes' => [
                'user_credentials' => [
                    'class' => 'OAuth2\GrantType\UserCredentials',
                ],
                'refresh_token' => [
                    'class' => 'OAuth2\GrantType\RefreshToken',
                    'always_issue_new_refresh_token' => true
                ]
            ]
        ],
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',
            'ignoreActions' => ['audit/*', 'device/update'],
        ],
        'manage' => [
            'class' => 'api\modules\manage\Module'
        ],
    ],
    'components' => [
        'request' => [
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'formatters' => [
                'xml' => [
                    'class' => 'yii\web\XmlResponseFormatter',
                    'rootTag' => 'root',
                ],
                'json' => [
                    'class' => 'yii\web\JsonResponseFormatter'
                ]
            ],
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
            'on beforeSend' => function (\yii\base\Event $event) {
                /** @var \yii\web\Response $response */
                $response = $event->sender;
                // catch situation, when no controller hasn't been loaded
                // so no filter wasn't loaded too. Need to understand in which format return result
                if (empty(Yii::$app->controller)) {
                    $cn = new \yii\filters\ContentNegotiator([
                        'response' => $response,
                        'formats' => [
                            'application/json' => yii\web\Response::FORMAT_JSON,
                            'application/xml' => yii\web\Response::FORMAT_XML,
                            'text/html' => yii\web\Response::FORMAT_HTML
                        ]
                    ]);
                    $cn->negotiate();
                }
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'class' => 'common\components\User',
            'enableSession' => false,
            'enableAutoLogin'=> false,
            'loginUrl' => null
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
            'errorAction' => 'error/index',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require(__DIR__ . '/routing.php')
        ]
    ],
    'params' => $params,
];
