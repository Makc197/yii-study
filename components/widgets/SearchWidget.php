<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class SearchWidget extends Widget
{
    public $text; 
    
    public function init()
    {
        $this->text = Yii::$app->request->get('q');
        parent::init();
    }

    public function run()
    {
        return $this->render('search_form',['text' => $this->text]);
    }
}