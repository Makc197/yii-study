<?php
namespace widgets\LanguageSwitch;

use yii\helpers\Html;
use Yii;

?>

<div class="navbar-form btn-group <?= $cssClass ?>">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <?= Yii::$app->language; ?>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <li>
            <?= Html::a('English', array_merge(
                Yii::$app->request->get(),
                ['/' . Yii::$app->controller->route, 'language' => 'en']
            )); ?>
        </li>
        <li>
            <?= Html::a('Русский', array_merge(
                Yii::$app->request->get(),
                ['/' . Yii::$app->controller->route, 'language' => 'ru']
            )); ?>
        </li>

    </ul>
</div>