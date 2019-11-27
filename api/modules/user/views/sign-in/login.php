<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \api\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Đăng nhập');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <!-- h1>< ?php echo Html::encode($this->title) ?></h1 -->

    <div class="row">
        <div class="col-lg-12">
            <div class="logo-login">
                <img src="/img/logo-hmu.png" alt="Logo HMU">
            </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?php echo $form->field($model, 'identity')->textInput(['placeholder'=>'Tên đăng nhập']) ?>

                <?php echo $form->field($model, 'password')->passwordInput(['placeholder'=>'Mật khẩu']) ?>

                <?php echo $form->field($model, 'rememberMe')->checkbox() ?>


            <div class="row-login">
                <?php echo Yii::t('frontend', '<a href="{link}">Quên mật khẩu?</a>', [
                    'link'=>yii\helpers\Url::to(['sign-in/request-password-reset'])
                ]) ?>
            </div>
            <?php echo Html::submitButton(Yii::t('frontend', 'Đăng nhập'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<style>

</style>