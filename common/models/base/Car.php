<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "car".
 *
 * @property integer $id
 * @property string $driver_name
 * @property string $registration_number
 * @property integer $current_location_x
 * @property integer $current_location_y
 * @property integer $type
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \common\models\Ride[] $rides
 * @property string $aliasModel
 */
abstract class Car extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
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
            [['driver_name', 'registration_number', 'current_location_x', 'current_location_y'], 'required'],
            [['current_location_x', 'current_location_y', 'type', 'status'], 'integer'],
            [['driver_name'], 'string', 'max' => 255],
            [['registration_number'], 'string', 'max' => 20],
            [['registration_number'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'driver_name' => 'Driver Name',
            'registration_number' => 'Registration Number',
            'current_location_x' => 'Current Location X',
            'current_location_y' => 'Current Location Y',
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRides()
    {
        return $this->hasMany(\common\models\Ride::className(), ['car_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\CarQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CarQuery(get_called_class());
    }


}
