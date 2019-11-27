<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use \kartik\file\FileInput;
use dosamigos\tinymce\TinyMce;
use dosamigos\datepicker\DatePicker;
use trntv\filekit;
use budyaga\cropper\Widget;
/* @var $this yii\web\View */
/* @var $model common\models\InfoProfile */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    button.btn.btn-default.btn-secondary.kv-hidden.fileinput-cancel.fileinput-cancel-button {
        display: none !important;
    }
    div#uploadedProFile{
        position: relative !important;
        z-index: 1 !important;
    }

    input#uploadProFile{
        position: absolute !important;
        width: 200px !important;
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
                        <div id="imageProFile" style="width:300px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br/>
                        <button class="btn btn-success crop_imageProFile">Cắt ảnh</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="info-profile-form">
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-5">
                <?php $form = ActiveForm::begin([
                    'method' => 'post',
                    'class' => 'form-horizontal',
                ]); ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                        $id = \Yii::$app->user->identity->id;
                        $user = \common\models\InfoProfile::find()->where(['user_id'=>$id])->one();
                        ?>
                        <h3><span class="fa fa-user"></span> <?= $user->full_name ?></h3>
                        <p>Web Developer / Designer</p>

                        <div class="panel-body" align="center">
                            <div id="uploaded">
                                <?php
                                if(!empty($model->avatar)){ ?>
                                    <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/info-profile/'.$model->avatar,['class'=>'avatar avatarPro   img-thumbnail img-circle','id'=>'avatarPro'])?>
                                <?php }else{ ?>
                                    <img src="https://via.placeholder.com/200x200" id="avatarPro"  class="avatar  avatarPro img-circle img-thumbnail" alt="avatar">
                                <?php }
                                ?>
                                <input type="file" id="uploadProFile" />
                            </div>
                            <?= $form->field($model, 'avatar')->hiddenInput(['id'=>'dataUploadProFile']) ?>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-7">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3><span class="fa fa-pencil"></span> Hồ sơ</h3>
                            <p>Thông tin chi tiết tài khoản hiển thị.</p>
                        </div>
                        <div class="panel-body form-group-separated">
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Tên đầy đủ</label>
                                <div class="col-md-9 col-xs-7">
                                    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Ngày sinh</label>
                                <div class="col-md-9 col-xs-7">
                                    <div class="input-group">
                                        <?= $form->field($model, 'birth_day')->widget(\yii\jui\DatePicker::class, [
                                            'language' => 'en',
                                            'dateFormat' => 'M/d/Y',
                                            'options' => ['class' => 'form-control']
                                        ])->label(false) ?>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-xs-5 control-label">Số điện thoại</label>
                                <div class="col-md-9 col-xs-7">
                                    <?= $form->field($model, 'cell_phone')->textInput()->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-xs-5">
                                    <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-success pull-right']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default form-horizontal">
                    <div class="panel-body">
                        <h3><span class="fa fa-info-circle"></span> Thông tin tài khoản</h3>
                        <p>Thông tin tài khoản</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Tài khoản</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?= $model->user->username?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">E-mail</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?= $model->user->email?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-xs-12">
                            <a href="<?= Url::to(['/user/doi-mat-khau','id'=>Yii::$app->user->identity->id] )?>" class="btn btn-danger btn-block btn-rounded">Thay đổi mật khẩu</a>
                        </div>
                    </div>

                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Địa chỉ Ip hiện tại</label>
                            <div class="col-md-8 col-xs-7 line-height-base"><?= Yii::$app->getRequest()->getUserIP() ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Thời gian đăng ký</label>
                            <div class="col-md-8 col-xs-7 line-height-base"><?= date("m/d/Y H:i:s",$model->user->created_at); ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Nhóm quyền</label>
                            <div class="col-md-8 col-xs-7">
                                <?php
                                    foreach ($auths as $authAssignment){
                                        echo $authAssignment->item_name.',';
                                    }
                                ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
