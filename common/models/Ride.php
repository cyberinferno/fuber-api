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
}
