<?php

namespace common\models;

use Yii;
use \common\models\base\OauthClients as BaseOauthClients;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_clients".
 */
class OauthClients extends BaseOauthClients
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
