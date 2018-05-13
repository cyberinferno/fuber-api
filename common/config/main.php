<?php
use common\components\PhpdotenvLoader;

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        PhpdotenvLoader::class
    ]
];
