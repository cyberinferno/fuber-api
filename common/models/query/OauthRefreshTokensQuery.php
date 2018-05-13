<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\OauthRefreshTokens]].
 *
 * @see \common\models\OauthRefreshTokens
 */
class OauthRefreshTokensQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\OauthRefreshTokens[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\OauthRefreshTokens|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
