<?php

namespace common\components;

use cyberinferno\yii\phpdotenv\Loader;
use yii\helpers\ArrayHelper;
use yii\db\Connection;

class PhpdotenvLoader extends Loader
{
    public function bootstrap($app)
    {
        parent::bootstrap($app);
        date_default_timezone_set(getenv('TIMEZONE'));
        $app->setComponents(ArrayHelper::merge($app->getComponents(),
            [
                'db' => [
                    'class' => Connection::class,
                    'dsn' => getenv('DB_DSN'),
                    'username' => getenv('DB_USERNAME'),
                    'password' => getenv('DB_PASSWORD'),
                    'charset' => 'utf8'
                ],
                'formatter' => [
                    'defaultTimeZone' => getenv('TIMEZONE')
                ]
            ]
        ));
    }
}
