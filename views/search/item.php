<?php 
use yii\helpers\Url;
?>
<hr>
<?php foreach($model['attributes'] as $key => $val) : ?>
    <?= sprintf('%s - %s', $key, $val); ?><br>
<?php endforeach; ?>
    <a target="_blank" href="<?= Url::to([sprintf('%s/view', $model['type']), 'id' => $model['id']]) ?>"><?= $model['attributes']['title'] ?></a>
<hr>