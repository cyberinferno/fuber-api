<?php
namespace api\components;

use common\models\User;
use filsh\yii2\oauth2server\filters\ErrorToExceptionFilter;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

class ActiveController extends \yii\rest\ActiveController
{
    public $createScenario = 'create';
    public $updateScenario = 'update';
    public $serializer = [
        'class'         => 'yii\rest\Serializer',
        'linksEnvelope' => 'links'
    ];

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'corsFilter' => [
                'class' => Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],//to fix domain restriction
                    'Access-Control-Request-Method' => ['POST', 'PUT','GET','OPTIONS','PATCH','DELETE','HEAD'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Headers' => ['X-Wsse',"Authorization",'Accept','Content-Type'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 7200,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
            ],
            'authenticator'=>[
                'class' => CompositeAuth::className(),
                'authMethods' => [
                    HttpBasicAuth::className(),
                    HttpBearerAuth::className(),
                    QueryParamAuth::className()
                ],
                'except'=>['options']
            ],
            'exceptionFilter' => [
                'class' => ErrorToExceptionFilter::className()
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'api\components\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'findModelParams' => ['is_deleted' => false]
            ],
            'view' => [
                'class' => 'api\components\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'findModelParams' => ['is_deleted' => false]
            ],
            'create' => [
                'class' => 'api\components\CreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario
            ],
            'update' => [
                'class' => 'api\components\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
                'findModelParams' => ['is_deleted' => false]
            ],
            'delete' => [
                'class' => 'api\components\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'findModelParams' => ['is_deleted' => false]
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }
}
