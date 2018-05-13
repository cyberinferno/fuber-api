<?php

namespace common\models;

use Yii;
use \common\models\base\Car as BaseCar;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "car".
 */
class Car extends BaseCar
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
