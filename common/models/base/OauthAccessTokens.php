<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "oauth_access_tokens".
 *
 * @property string $access_token
 * @property string $client_id
 * @property integer $user_id
 * @property string $expires
 * @property string $scope
 *
 * @property \common\models\OauthClients $client
 * @property string $aliasModel
 */
abstract class OauthAccessTokens extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_access_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['access_token', 'client_id'], 'required'],
            [['user_id'], 'integer'],
            [['expires'], 'safe'],
            [['access_token'], 'string', 'max' => 40],
            [['client_id'], 'string', 'max' => 32],
            [['scope'], 'string', 'max' => 2000],
            [['access_token'], 'unique'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\OauthClients::className(), 'targetAttribute' => ['client_id' => 'client_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'access_token' => 'Access Token',
            'client_id' => 'Client ID',
            'user_id' => 'User ID',
            'expires' => 'Expires',
            'scope' => 'Scope',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(\common\models\OauthClients::className(), ['client_id' => 'client_id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\OauthAccessTokensQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OauthAccessTokensQuery(get_called_class());
    }


}