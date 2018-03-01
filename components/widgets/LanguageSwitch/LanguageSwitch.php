<?php

namespace app\components\widgets\LanguageSwitch;

use \yii\base\Widget;

class LanguageSwitch extends Widget
{
    public $cssClass;

    public function run()
    {
        return $this->render('multi_lang_form', [
            'cssClass' => $this->cssClass,
        ]);
    }
}

