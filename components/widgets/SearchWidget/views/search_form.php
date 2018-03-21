<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<form action="<?= Url::to(['/search/es-search/']); ?>" class="navbar-form navbar-left" role="search">
    <div class="row">
            <!-- Окно поиска по-умолчанию -->
            <div class="nopadding col-xs-10">
                <input type="text" class="form-control" name="q" value="<?= $text; ?>"
                       placeholder="<?= Yii::t('rbac-admin', 'Search') ?>">
            </div>
            <div class="nopadding col-xs-2">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </div>
    </div>
</form>
