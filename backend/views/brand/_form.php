<?php

use dosamigos\tinymce\TinyMce;
use kartik\widgets\FileInput;
use mludvik\tagsinput\TagsInputWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Parter */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong><?= $this->title?></strong> </h3>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <?php echo $form->errorSummary($model); ?>
            <div class="row">
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="panel-footer">
            <?php
            if ($model->isNewRecord){
                echo Html::submitButton('Thêm mới', ['class' => 'btn btn-success ']);
            }else{
                echo Html::submitButton('Cập nhật', ['class' => 'btn btn-primary ']);
            }?>
            <?= Html::a('Quay lại',['index'],['class'=>'btn btn-default  pull-right'])?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

