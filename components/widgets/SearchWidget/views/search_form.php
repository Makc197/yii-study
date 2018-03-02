<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<form action="<?=Url::to(['/search/es-search/']);?>" class="navbar-form navbar-left" role="search">
    
    <!-- Окно поиска по-умолчанию -->
    <div class="form-group">
      <input type="text" class="form-control" name="q" value="<?= $text; ?>" placeholder="<?= Yii::t('rbac-admin','Search')?>">
    </div>
              
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
