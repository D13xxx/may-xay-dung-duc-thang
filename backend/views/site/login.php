<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-container">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?= Yii::$app->session->getFlash('success');?>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <?= Yii::$app->session->getFlash('error');?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <div class="login-title"><strong>Xin chào</strong>,Vui lòng đăng nhập</div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            
            <div class="form-group">
                <div class="col-md-12">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                     <a href="<?= \yii\helpers\Url::to('request-password-reset')?>">Quên mật khẩu?</a> <br>;
                </div>
                <div class="col-md-6">
                    <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-info btn-block', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; 2019 HelloMedia.vn
            </div>
        </div>
    </div>
    
</div>

