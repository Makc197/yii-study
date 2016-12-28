<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class _BaseController Extends Controller {
    //public $layout = 'main';
    //public $layout = 'custom';
    
    public function init() {
        parent::init();
        
        $this->layout= Yii::$app->params['theme'];
    }

}
