<?php

namespace common\models;

use Yii;
use \common\models\base\OauthUsers as BaseOauthUsers;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_users".
 */
class OauthUsers extends BaseOauthUsers
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
