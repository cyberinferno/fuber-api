<?php

namespace common\models;

use OAuth2\Storage\PublicKeyInterface;
use Yii;
use \common\models\base\OauthPublicKeys as BaseOauthPublicKeys;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "oauth_public_keys".
 */
class OauthPublicKeys extends BaseOauthPublicKeys implements PublicKeyInterface
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

    public function getPublicKey($client_id = null)
    {
        $model = self::find()->where(['client_id'=>$client_id])->one();
        if ($model) {
            return  $model->public_key;
        }
        return null;
    }

    public function getPrivateKey($client_id = null)
    {
        $model = self::find()->where(['client_id'=>$client_id])->one();
        if ($model) {
            return  $model->private_key;
        }
        return null;
    }

    public function getEncryptionAlgorithm($client_id = null)
    {
        return 'RS256';
    }
}
