<?php 
use yii\helpers\Url;
?>
<hr>
<?php foreach($model['_source'] as $key => $val) : ?>
    <?= sprintf('%s - %s', $key, $val); ?><br>
<?php endforeach; ?>
    <a target="_blank" href="<?= Url::to([sprintf('%s/view', $model['_type']), 'id' => $model['_id']]) ?>"><?= $model['_source']['title'] ?></a>
<hr>