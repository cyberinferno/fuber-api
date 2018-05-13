<?php

namespace common\models;

use Yii;
use \common\models\base\OauthPublicKeys as BaseOauthPublicKeys;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_public_keys".
 */
class OauthPublicKeys extends BaseOauthPublicKeys
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
