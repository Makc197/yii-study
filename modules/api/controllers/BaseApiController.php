<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;

/**
 * Cd controller for the `api` module
 */
abstract class BaseApiController extends ActiveController {

    public function behaviors() {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                // restrict access to
                'Origin' => [
                    'http://yii-study',
                    'http://mysite.loc'
                ],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['Authorization', 'Content-Type'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Max-Age' => 3600
            ],
        ];

        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::className(),
            'formats' => [
                'application/json' => \yii\web\Response::FORMAT_JSON,
            ],
        ];

//        $behaviors['access'] = [
//            'class' => \yii\filters\AccessControl::className(),
//            'only' => ['create', 'update', 'delete'],
//            'rules' => [
//                [
//                    'actions' => ['create', 'update', 'delete'],
//                    'allow' => true,
//                    'roles' => ['*'],
//                ],
//            ],
//        ];

        return $behaviors;
    }

}
