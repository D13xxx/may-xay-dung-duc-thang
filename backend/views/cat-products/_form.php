<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatProducts */
/* @var $form yii\widgets\ActiveForm */
$deleteScript = <<< JS
    document.getElementById("catproducts-name").addEventListener("keyup", ChangeToSlug);
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("catproducts-name").value;
        
        //Đổi chữ hoa thành chữ thường
        slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('catproducts-slug').value = slug;
    }

JS;
$this->registerJs($deleteScript, \yii\web\View::POS_READY);
?>
<style>
/* 
    div#uploaded{
        position: relative !important;*/
        z-index: 1 !important;*/
    }

    input#upload{
        position: absolute !important;
        width: 280px !important;
        height: 140px !important;
        top: 0 !important;
        opacity: 0!important;
    } */
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
                        <div id="imageCat" style="width:300px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br />
                        <br/>
                        <button class="btn btn-success crop_image">Cắt ảnh</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <strong>Chú ý!</strong> Chỉ lên thực hiện nhập "Sắp xếp" với những danh mục cha.
    </div>
    <div class="panel panel-default">
        <div class="panel panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="panel-body" align="center">
                <div id="uploaded">
                    <?php
                    if(!empty($model->avatar)){ ?>
                        <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/cat-products/'.$model->avatar,['class'=>'avatar avatarPro img-thumbnail','id'=>'avatarPro'])?>
                    <?php }else{ ?>
                        <img src="https://via.placeholder.com/280x140" id="avatarPro"  class="avatar img-thumbnail avatarPro" alt="avatar">
                    <?php }
                    ?>
                    <input type="file" id="upload" />
                </div>

                <?= $form->field($model, 'avatar')->hiddenInput(['id'=>'dataUpload']) ?>
                <br />
            </div>
            <div class="row">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="row">
                 <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="row">
                    
                <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>

                <?=
                $form->field($model, 'parent_id')
                    ->dropDownList($dataCat,['prompt'=>'- Chọn danh mục -'])
                ?>
            </div>
            <div class="row">
                <?= $form->field($model, 'title_seo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="row">
                <?= $form->field($model, 'description_seo')->textarea(['maxlength' => true]) ?>
            </div>
            <div class="row">
                <?= $form->field($model, 'keyword_seo')->textInput(['maxlength' => true])->label(false) ?>
                
            </div>
        </div>

        <div class="panel-footer">
            <?php
            if ($model->isNewRecord){
                echo Html::submitButton('Thêm mới', ['class' => 'btn btn-success']);
            }else{
                echo Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']);
            }?>
            <?= Html::a('Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>  
</div>



