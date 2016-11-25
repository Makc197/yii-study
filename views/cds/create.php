<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cds */

$this->title = 'Create Cds';
$this->params['breadcrumbs'][] = ['label' => 'Cds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
