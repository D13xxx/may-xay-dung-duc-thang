<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="user-update">
    <div class="panel panel-default">
        <div class="panel-body">
            <?php $form = ActiveForm::begin();?>

            <?= $form->field($model, 'oldPassword')->passwordInput() ?>

            <?= $form->field($model, 'newPassword')->passwordInput() ?>

            <?= $form->field($model, 'retypePassword')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Thay đổi'), ['class' => 'btn btn-success']) ?>
                <?= Html::a(Yii::t('app', 'Quay lại'),'index', ['class' => 'btn btn-default pull-right']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
