<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\OauthClients]].
 *
 * @see \common\models\OauthClients
 */
class OauthClientsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\OauthClients[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\OauthClients|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
