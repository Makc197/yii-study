<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Результат поиска';
?>

<div class="search-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'item',
    ]);
    ?>

</div>
