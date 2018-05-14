<?php

namespace api\models;

use common\models\Ride;
use yii\base\Model;

class Booking extends Model
{
    public $currentLocationX;
    public $currentLocationY;
    public $destinationLocationX;
    public $destinationLocationY;
    public $uid;
    public $type;
    /**
     * @var Ride
     */
    public $rideModel;

    public function rules()
    {
        return [
            [['currentLocationX', 'currentLocationY', 'destinationLocationX', 'destinationLocationY', 'type'], 'safe'],
            [['currentLocationX', 'currentLocationY', 'destinationLocationX', 'destinationLocationY', 'type', 'uid'], 'required'],
            [['currentLocationX', 'currentLocationY', 'destinationLocationX', 'destinationLocationY', 'type'], 'integer'],
            ['type', 'in', 'range' => [Car::TYPE_NORMAL, Car::TYPE_HIPSTER]]
        ];
    }

    public function save()
    {
        $rideModel = Ride::find()
            ->where([
                'status' => Ride::STATUS_RIDING,
                'user_id' => $this->uid
            ])
            ->one();
        if ($rideModel) {
            $this->addError('rideModel', 'You are already on a ride');
            return false;
        }
        $nearestAvailableCar = $this->getNearestAvailableCar();
        if (!$nearestAvailableCar) {
            $this->addError('rideModel', 'No cars available nearby');
            return false;
        }
        $this->rideModel = new Ride([
            'car_id' => $nearestAvailableCar->id,
            'user_id' => $this->uid,
            'start_location_x' => $this->currentLocationX,
            'start_location_y' => $this->currentLocationY,
            'end_location_x' => $this->destinationLocationX,
            'end_location_y' => $this->destinationLocationY,
            'status' => Ride::STATUS_RIDING,
            'ride_started_at' => time()
        ]);
        if (!$this->rideModel->save()) {
            $this->addErrors($this->rideModel->errors);
            return false;
        }
        return true;
    }

    /**
     * Finding nearest car to the user
     * @return Car|array|\common\models\Car|null
     */
    private function getNearestAvailableCar()
    {
        return Car::find()
            ->where([
                'type' => $this->type,
                'status' => Car::STATUS_AVAILABLE
            ])
            ->orderBy("SQRT((($this->currentLocationX - current_location_x) * ($this->currentLocationX - current_location_x)) + (($this->currentLocationY - current_location_y) * ($this->currentLocationY - current_location_y))) ASC")
            ->one();

    }
}