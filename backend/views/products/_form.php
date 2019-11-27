<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use mludvik\tagsinput\TagsInputWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
$deleteScript = <<< JS
    document.getElementById("products-full_name").addEventListener("keyup", ChangeToSlug);
    
    document.getElementById("products-exp_price").addEventListener("keyup", GetPrice);
    
    document.getElementById("products-price").addEventListener("keyup", GetPrice);
    function GetPrice(){
        var exp_price, price , sale_number,phanTram;
        exp_price = document.getElementById('products-exp_price').value;
        price = document.getElementById('products-price').value;
        if(parseInt(exp_price) > 0 && parseInt(exp_price) > parseInt(price) ) {
            sale_number = exp_price - price;
            ti_le = Math.round(sale_number / exp_price * 100);
            
            document.getElementById('products-sale_number').value = ti_le;
        }else{
            alert('Giá bán không được phép lớn hơn giá dự kiến.');
        }
        
    }
    function ChangeToSlug()
    {
        var title, slug;

        //Lấy text từ thẻ input title
        title = document.getElementById("products-full_name").value;
        
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
        document.getElementById('products-slug').value = slug;
    }
JS;
$this->registerJs($deleteScript, \yii\web\View::POS_READY);
?>
<style>
    .tags-input{
        width: 100% !important;
        padding: 4px;
    }
    button.btn.btn-default.btn-secondary.kv-hidden.fileinput-cancel.fileinput-cancel-button {
        display: none !important;
    }
    div#uploadedPro{
        position: relative !important;
        z-index: 1 !important;
    }

    input#uploadPro{
        position: absolute !important;
        width: 100% !important;
        height: 100% !important;
        top: 0 !important;
        opacity: 0!important;
    }
    div#uploadedProShare{
        position: relative !important;
        z-index: 1 !important;
    }

    input#uploadProShare{
        position: absolute !important;
        width: 100% !important;
        height: 100% !important;
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
                        <div id="imagePro" style="width:400px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br />
                        <br/>
                        <button class="btn btn-success crop_imagePro">Cắt ảnh</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="myModalShare" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cắt ảnh</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 text-center">
                        <div id="imageProShare" style="width:400px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br />
                        <br/>
                        <button class="btn btn-success crop_imageProShare">Cắt ảnh</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Chi tiết sản phẩm</strong> </h3>
        </div>
        <div class="panel-body">

            <?php $form = ActiveForm::begin(); ?>
            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'code')->textInput() ?>

                    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>


                    <?= $form->field($model, 'slug')->textInput(['maxlength' => true,])->label('* Đường dẫn bạn có thể giữ nguyên theo quy định hoặc thay đổi tùy chỉnh.') ?>

                    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'cat_id')
                        ->dropDownList($dataCat,['prompt'=>'--Lựa chọn nhóm sản phẩm--'])
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'type')
                        ->dropDownList(
                        \common\models\Products::T_ARRAY(),['prompt'=>'--Lựa chọn kiểu sản phẩm--']
                        )
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'brand')
                        ->dropDownList(
                            ArrayHelper::map(\common\models\Brand::find()->asArray()->all(), 'id', 'name'),['prompt'=>'--Lựa chọn thương hiệu--']
                        )
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-default tabs">                            
                        <ul class="nav nav-tabs" role="tablist">
                            <li class=""><a href="#tab-first" role="tab" data-toggle="tab" aria-expanded="false">Nội dung bài viết</a></li>
                            <li class="active"><a href="#tab-second" role="tab" data-toggle="tab" aria-expanded="true">Thông số kỹ thuật</a></li>
                        </ul>
                        <div class="panel-body tab-content">
                            <div class="tab-pane" id="tab-first">
                                <?= $form->field($model, 'content')->widget(\xvs32x\tinymce\Tinymce::className(), [
                                    //TinyMCE options
                                    'pluginOptions' => [
                                        'plugins' => [
                                            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                                            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                                            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                                        ],
                                        'toolbar1' => "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                                        'toolbar2' => "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | fontsizeselect ",
                                        'fontsize_formats'=> "8pt 10pt 12pt 14pt 18pt 24pt 36pt",

                                        'image_advtab' => true,
                                        'filemanager_title' => "Filemanager",
                                        'height'=>"400",
                                        'language' => 'en'],
                                    //Widget Options
                                    'fileManagerOptions' => [
                                        //Upload Manager Configuration
                                        'configPath' => [
                                            //path from base_url to base of upload folder with start and final /
                                            'upload_dir' => '/uploads/filemanager/source/',
                                            //relative path from filemanager folder to upload folder with final /
                                            'current_path' => '../../../uploads/filemanager/source/',
                                            //relative path from filemanager folder to thumbs folder with final / (DO NOT put inside upload folder)
                                            'thumbs_base_path' => '../../../uploads/filemanager/thumbs/'
                                        ]
                                    ]
                                ])?>
                            </div>
                            <div class="tab-pane active" id="tab-second">
                                <?= $form->field($model, 'thong_so_ky_thuat')->widget(\xvs32x\tinymce\Tinymce::className(), [
                                    //TinyMCE options
                                    'pluginOptions' => [
                                        'plugins' => [
                                            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                                            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                                            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                                        ],
                                        'toolbar1' => "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                                        'toolbar2' => "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | fontsizeselect ",
                                        'fontsize_formats'=> "8pt 10pt 12pt 14pt 18pt 24pt 36pt",

                                        'image_advtab' => true,
                                        'filemanager_title' => "Filemanager",
                                        'height'=>"400",
                                        'language' => 'en'],
                                    //Widget Options
                                    'fileManagerOptions' => [
                                        //Upload Manager Configuration
                                        'configPath' => [
                                            //path from base_url to base of upload folder with start and final /
                                            'upload_dir' => '/uploads/filemanager/source/',
                                            //relative path from filemanager folder to upload folder with final /
                                            'current_path' => '../../../uploads/filemanager/source/',
                                            //relative path from filemanager folder to thumbs folder with final / (DO NOT put inside upload folder)
                                            'thumbs_base_path' => '../../../uploads/filemanager/thumbs/'
                                        ]
                                    ]
                                ])?>
                                
                            </div>                                        
                            
                        </div>
                      
                    </div>

                    <?= $form->field($model, 'title_seo')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'description_seo')->textarea(['maxlength' => true]) ?>

                    <?= $form->field($model, 'keyword_seo')->textInput(['maxlength' => true]) ?>

                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'guarantce')->textInput() ?>

                    <?= $form->field($model, 'exp_price')->textInput() ?>

                    <?= $form->field($model, 'price')->textInput() ?>

                    <?= $form->field($model, 'sale_number')->textInput(['readonly'=> true]) ?>

                    <?= $form->field($model, 'tags')->widget(TagsInputWidget::className()) ?>

                    <?= $form->field($model, 'is_hot_new')->checkbox() ?>

                    <?= $form->field($model, 'is_new')->checkbox() ?>

                    <?= $form->field($model, 'is_empty')->checkbox() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Ảnh đại diện sản phẩm</strong> </h3>
        </div>
        <div class="panel-body">
            <div id="uploaded">
                <?php
                if(!empty($model->avatar)){ ?>
                    <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/products/'.$model->avatar,['class'=>'avatar avatarPro img-thumbnail','id'=>'avatarPro'])?>
                <?php }else{ ?>
                    <img src="https://via.placeholder.com/600x520" id="avatarPro"  class="avatar img-thumbnail avatarPro" alt="avatar">
                <?php }
                ?>
                <input type="file" id="uploadPro" />
            </div>

            <?= $form->field($model, 'avatar')->hiddenInput(['id'=>'dataUploadPro'])->label(false) ?>
            <br />
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Ảnh chia sẻ facebook</strong> </h3>
        </div>
        <div class="panel-body">
            <div id="uploadedShare">
                <?php
                if(!empty($model->img_share)){ ?>
                    <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/products/img-share/'.$model->img_share,['class'=>'avatar avatarProShare img-thumbnail','id'=>'avatarPro'])?>
                <?php }else{ ?>
                    <img src="https://via.placeholder.com/600x315" id="avatarProShare"  class="avatar img-thumbnail avatarProShare" alt="avatar">
                <?php }
                ?>
                <input type="file" id="uploadProShare" />
            </div>

            <?= $form->field($model, 'img_share')->hiddenInput(['id'=>'dataUploadProShare'])->label(false) ?>
            <br />
        </div>
    </div>
    <div class="panel panel-default">
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

