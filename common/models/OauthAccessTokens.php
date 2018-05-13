<?php

namespace common\models;

use Yii;
use \common\models\base\OauthAccessTokens as BaseOauthAccessTokens;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_access_tokens".
 */
class OauthAccessTokens extends BaseOauthAccessTokens
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
