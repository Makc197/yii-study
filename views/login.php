<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

//$this->title = 'Авторизация';
$this->title = Yii::t('rbac-admin', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::t('rbac-admin', 'Please fill out the following fields to login:') ?>
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username', ['enableLabel' => true])->label(Yii::t('rbac-admin', 'Username')) ?>
            <?= $form->field($model, 'password', ['enableLabel' => true])->label(Yii::t('rbac-admin', 'Password'))->passwordInput() ?>
            <?= $form->field($model, 'rememberMe', ['enableLabel' => true])->label(Yii::t('rbac-admin', 'Remember Me'))->checkbox() ?>
            <div style="color:#999;margin:1em 0">
                <?= Yii::t('rbac-admin', 'If you forgot your password you can') . ' ' . Html::a(Yii::t('rbac-admin', 'reset it'), ['user/request-password-reset']) ?>
                <br>
                <?= Yii::t('rbac-admin', 'For new user you can') . ' ' . Html::a(Yii::t('rbac-admin', 'signup'), ['user/signup']) ?>
                .
            </div>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
