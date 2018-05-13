<?php

namespace common\models;

use Yii;
use \common\models\base\OauthJwt as BaseOauthJwt;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_jwt".
 */
class OauthJwt extends BaseOauthJwt
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
