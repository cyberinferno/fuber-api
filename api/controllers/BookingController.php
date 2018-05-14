<?php

namespace api\controllers;

use api\components\Controller;
use api\models\Booking;
use api\models\Ride;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class BookingController extends Controller
{
    /**
     * Books a ride
     * @return Booking|\common\models\Ride
     * @throws ServerErrorHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate()
    {
        $model = new Booking([
            'uid' => \Yii::$app->user->id
        ]);
        $model->load(\Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
            $response = \Yii::$app->getResponse();
            $response->setStatusCode(201);
            $response->getHeaders()->set('Location', Url::toRoute(['booking', 'id' => $model->rideModel->id], true));
            return $model->rideModel;
        }
        if (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to book a ride for unknown reason.');
        }
        return $model;
    }

    /**
     * Ends a ride
     * @param $id
     * @return Ride|array|\common\models\Ride|null
     * @throws NotFoundHttpException
     * @throws ServerErrorHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id, Ride::STATUS_RIDING);
        $model->ride_ended_at = time();
        $model->status = Ride::STATUS_COMPLETED;
        $model->setCalculatedPrice();
        if ($model->save() === false && !$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to end the ride for unknown reason.');
        }
        return $model;
    }

    /**
     * Get ride details
     * @param $id
     * @return Ride|array|\common\models\Ride|null
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->findModel($id);
    }

    private function findModel($id, $status = null)
    {
        $model = Ride::find()
            ->where([
                'user_id' => \Yii::$app->user->id,
                'id' => (int)$id
            ])
            ->andFilterWhere(['status' => $status])
            ->one();
        if (!$model) {
            throw new NotFoundHttpException('Booking not found');
        }
        return $model;
    }
}