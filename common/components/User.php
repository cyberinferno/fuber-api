<?php
namespace common\components;

/*
 * Extended User identity class
 */
use Yii;
use yii\helpers\ArrayHelper;

class User extends \yii\web\User
{
    /**
     * Returns the auth_key of the the user
     * @return string
     */
    public function getAuthKey()
    {
        return ArrayHelper::getValue($this->identity, 'auth_key');
    }

    /**
     * Returns the email of the the user
     * @return string email
     */
    public function getEmail()
    {
        return ArrayHelper::getValue($this->identity, 'email');
    }
}
