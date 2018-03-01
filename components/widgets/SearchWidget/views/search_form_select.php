<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<form action="<?=Url::to(['/search/essearch/']);?>" class="navbar-form navbar-left" role="search">

    <!-- Окно поиска по продуктам каталога -->
    <div class="input-group">
        <input type="text" class="form-control" name="q" value="<?= $text; ?>" placeholder="<?= Yii::t('rbac-admin','Search')?>">
        <div class="input-group-btn">

            <div class="form-group">
                <label for="sel1">Select list:</label>
                <select class="form-control" name="t">
<!--                    <option value="all">Везде</option>-->
                    <option value="book"><?= Yii::t('rbac-admin', 'Books')?></option>
                    <option value="cd"><?= Yii::t('rbac-admin', 'CDs')?></option>
                    <option value="product"><?= Yii::t('rbac-admin', 'Products')?></option>
                </select>
            </div>

<!--            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">В разделе <span class="caret"></span></button>
                <ul class="dropdown-menu pull-right">
                    <li><a name="t" value="book">Книги</a></li>
                    <li><a href="<//?= Url::to(['/search/ESCd/']); ?>">CD</a></li>
                    <li><a href="<//?= Url::to(['/search/ESProducts/']); ?>">Прочее</a></li>
                    <li class="divider"></li>
                    <li><a href="<//?= Url::to(['/search/ESAll/']); ?>">Везде</a></li>
                </ul>     -->
            
        </div>
    </div>

    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
