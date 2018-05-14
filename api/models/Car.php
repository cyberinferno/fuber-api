<?php

namespace api\models;

use yii\data\ActiveDataProvider;

class Car extends \common\models\Car
{
    public $pageSize = 10;

    public function fields()
    {
        return [
            'id',
            'driver_name',
            'registration_number',
            'current_location_x',
            'current_location_y',
            'type'
        ];
    }

    public function search($params = [])
    {
        $query = self::find()
            ->where([
                'status' => self::STATUS_AVAILABLE
            ]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'key' => 'id',
            'pagination' => [
                'pageSizeLimit' => [0, 50],
                'defaultPageSize' => $this->pageSize
            ]
        ]);
        $this->load($params, '');
        return $dataProvider;
    }
}
