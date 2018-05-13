<?php

namespace common\models;

use Yii;
use \common\models\base\OauthScopes as BaseOauthScopes;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_scopes".
 */
class OauthScopes extends BaseOauthScopes
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
