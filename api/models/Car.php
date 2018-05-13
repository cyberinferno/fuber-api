<?php

namespace api\models;

use yii\data\ActiveDataProvider;

class Car extends \common\models\Car
{
    public function fields()
    {
        return [
            'id',
            'driver_name',
            'registration_number',
            'current_location_x',
            'current_location_y',
            'type'
        ];
    }
}
