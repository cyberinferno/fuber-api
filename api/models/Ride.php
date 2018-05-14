<?php

namespace api\models;

class Ride extends \common\models\Ride
{
    public function fields()
    {
        return [
            'car',
            'start_location_x',
            'start_location_y',
            'end_location_x',
            'end_location_y',
            'status',
            'ride_started_at',
            'ride_ended_at',
            'price'
        ];
    }

    public function getCar()
    {
        return $this->hasOne(Car::className(), ['id' => 'car_id']);
    }
}