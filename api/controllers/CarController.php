<?php

namespace api\controllers;

use api\models\Car;
use yii\rest\Controller;
use yii\rest\Serializer;
use yii\web\NotFoundHttpException;

class CarController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new Car();
        $serializer = new Serializer([
            'request' => \Yii::$app->request,
            'response' => \Yii::$app->response,
            'collectionEnvelope' => 'items'
        ]);
        return $serializer->serialize($searchModel->search(\Yii::$app->request->queryParams));
    }

    public function actionView($id)
    {
        return $this->findModel($id);
    }

    private function findModel($id)
    {
        $model = Car::findOne(['id' => (int)$id]);
        if (!$model) {
            throw new NotFoundHttpException('Car not found');
        }
        return $model;
    }
}