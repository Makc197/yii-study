<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Создание записи в категории Товары';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
