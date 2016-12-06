<?php

namespace app\rule;

use Yii;
use yii\rbac\Rule;
use app\models\Tests;

// Пример реализации правил, обязательно меняйте название класса и используете приписку Rule
class ViewOwnRule extends Rule
{
    public $name = 'viewOwnRule';

    public function execute($user_id, $item, $params)
    {   
        return $user_id == $params['model']->user_id;
    }
}