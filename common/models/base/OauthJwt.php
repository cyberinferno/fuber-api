<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "oauth_jwt".
 *
 * @property string $client_id
 * @property string $subject
 * @property string $public_key
 * @property string $aliasModel
 */
abstract class OauthJwt extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_jwt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['client_id'], 'required'],
            [['client_id'], 'string', 'max' => 32],
            [['subject'], 'string', 'max' => 80],
            [['public_key'], 'string', 'max' => 2000],
            [['client_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'subject' => 'Subject',
            'public_key' => 'Public Key',
        ];
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\OauthJwtQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OauthJwtQuery(get_called_class());
    }


}