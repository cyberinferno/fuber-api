<?php

namespace common\models;

use Yii;
use \common\models\base\OauthAuthorizationCodes as BaseOauthAuthorizationCodes;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_authorization_codes".
 */
class OauthAuthorizationCodes extends BaseOauthAuthorizationCodes
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
