<?php

namespace common\models;

use Yii;
use \common\models\base\Ride as BaseRide;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ride".
 */
class Ride extends BaseRide
{
    const STATUS_RIDING = 10;
    const STATUS_COMPLETED = 20;

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }

    public function setCalculatedPrice()
    {
        $this->price = $this->getTravelledTime() + ($this->getDistanceTravelled() * 2);
        if ($this->car->type == Car::TYPE_HIPSTER) {
            $this->price += 5;
        }
    }

    /**
     * @return float
     */
    private function getDistanceTravelled()
    {
        return sqrt(pow($this->start_location_x - $this->end_location_x, 2) + pow($this->start_location_y - $this->end_location_y, 2));
    }

    private function getTravelledTime()
    {
        if (!$this->ride_ended_at) {
            $this->ride_ended_at = time();
        }
        return ($this->ride_ended_at - $this->ride_started_at) / 60;
    }
}
