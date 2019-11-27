<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = \yii\widgets\ActiveForm::begin(); ?>
<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
    </div>
    </div>
    <div class="panel-footer">
        <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-info', 'name' => 'login-button']) ?>

        <?= Html::a('Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
    </div>
<?php ActiveForm::end(); ?>