<?php

namespace app\components;

use Yii;

/**
 * Description of ModelHelper
 *
 * @author MAKC
 */
class ModelHelper {

    public static function getModel() {
        $modelname = 'app\models\\' . Yii::$app->controller->id;
        $model = new $modelname;
        return $model;
    }

}
