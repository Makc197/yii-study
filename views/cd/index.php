<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Компакт диски';
$this->title = Yii::t('rbac-admin', 'CDs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cds-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('rbac-admin','Create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'title',
            'description',
            'price',
            // 'author',
            // 'playlenght',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
