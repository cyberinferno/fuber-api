<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "ride".
 *
 * @property integer $id
 * @property integer $car_id
 * @property integer $user_id
 * @property integer $start_location_x
 * @property integer $start_location_y
 * @property integer $end_location_x
 * @property integer $end_location_y
 * @property integer $status
 * @property integer $ride_started_at
 * @property integer $ride_ended_at
 * @property double $price
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \common\models\Car $car
 * @property \common\models\User $user
 * @property string $aliasModel
 */
abstract class Ride extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ride';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'user_id', 'start_location_x', 'start_location_y', 'end_location_x', 'end_location_y', 'ride_started_at'], 'required'],
            [['car_id', 'user_id', 'start_location_x', 'start_location_y', 'end_location_x', 'end_location_y', 'status', 'ride_started_at', 'ride_ended_at'], 'integer'],
            [['price'], 'number'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Car::className(), 'targetAttribute' => ['car_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'user_id' => 'User ID',
            'start_location_x' => 'Start Location X',
            'start_location_y' => 'Start Location Y',
            'end_location_x' => 'End Location X',
            'end_location_y' => 'End Location Y',
            'status' => 'Status',
            'ride_started_at' => 'Ride Started At',
            'ride_ended_at' => 'Ride Ended At',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(\common\models\Car::className(), ['id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\RideQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RideQuery(get_called_class());
    }


}