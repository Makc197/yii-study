<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cds */

$this->title = 'Update Cds: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Cds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cds-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
