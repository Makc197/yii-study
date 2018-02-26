<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cd */

$this->title = 'Создание записи в категории Компакт диски';
$this->params['breadcrumbs'][] = ['label' => 'Компакт диски', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
