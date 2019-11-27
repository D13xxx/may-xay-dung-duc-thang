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
<style>
    button.btn.btn-default.btn-secondary.kv-hidden.fileinput-cancel.fileinput-cancel-button {
        display: none !important;
    }
    div#uploaded{
        position: relative !important;
        z-index: 1 !important;
    }

    input#upload{
        position: absolute !important;
        width: 300px !important;
        height: 200px !important;
        top: 0 !important;
        opacity: 0!important;
    }
</style>
<div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cắt ảnh</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 text-center">
                        <div id="imageParter" style="width:300px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br />
                        <br/>
                        <button class="btn btn-success crop_imageParter">Cắt ảnh</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="page-content-wrap">
    <div class="panel panel-default">
        <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-8">

                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            </div>

            <div class="col-md-4">
                <div class="panel-body" align="center">
                    <div id="uploaded">
                        <?php
                        if(!empty($model->avatar)){ ?>
                            <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/parter/'.$model->avatar,['class'=>'avatar avatarPro img-thumbnail','id'=>'avatarPro'])?>
                        <?php }else{ ?>
                            <img src="https://via.placeholder.com/120x180" id="avatarPro"  class="avatar img-thumbnail avatarPro" alt="avatar">
                        <?php }
                        ?>
                        <input type="file" id="uploadParter" />
                    </div>
                    
                    <?= $form->field($model, 'avatar')->hiddenInput(['id'=>'dataUpload']) ?>
                    <br />
                </div>
               
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
        <br>
        <br>
    </div>

</div>
<div class="parter-form">

