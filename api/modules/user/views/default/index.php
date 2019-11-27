<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('frontend', 'User Settings')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <h2><?php echo Yii::t('frontend', 'Profile settings') ?></h2>

    <?php echo $form->field($model->getModel('profile'), 'picture')->widget(
        Upload::class,
        [
            'url' => ['avatar-upload']
        ]
    )?>

    <?php echo $form->field($model->getModel('profile'), 'firstname')->textInput(['maxlength' => 255,'readonly'=>true])->label('Họ và tên') ?>

    
    <?php echo $form->field($model->getModel('profile'), 'gender')->dropDownlist([
        \common\models\UserProfile::GENDER_FEMALE => 'Nữ',
        \common\models\UserProfile::GENDER_MALE => 'Nam'
    ], ['prompt' => '','readonly'=>true])->label('Giới tính') ?>

    <h2><?php echo Yii::t('frontend', 'Account Settings') ?></h2>

    <?php echo $form->field($model->getModel('account'), 'username')->textInput(['readonly'=>true]) ?>

    <?php echo $form->field($model->getModel('account'), 'email') ?>

    <?php echo $form->field($model->getModel('account'), 'password')->passwordInput() ?>

    <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('frontend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
