<?php

namespace app\rule;

use Yii;
use yii\rbac\Rule;
use app\models\Tests;

// Пример реализации правил, обязательно меняйте название класса и используете приписку Rule
class UpdateOwnRule extends Rule
{
    public $name = 'updateOwnRule';

    public function execute($user, $item, $params)
    {   
        $test = $params['test'];



        return false;
    }
}