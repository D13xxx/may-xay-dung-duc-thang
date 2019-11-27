<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DetailCompany */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel panel-de-fault">
        <div class="panel-panel-heading">

        </div>
        <div class="panel-panel-body">
            <div class="panel panel-default tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active""><a href="#tab-first" role="tab" data-toggle="tab" aria-expanded="false">Giới thiệu công ty</a></li>
                    <li class=""><a href="#tab-second" role="tab" data-toggle="tab" aria-expanded="false">Showroom</a></li>
                    <li class=""><a href="#tab-third" role="tab" data-toggle="tab" aria-expanded="true">Tuyển dụng</a></li>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab-first">
                        <?= $form->field($model, 'gioi_thieu_cong_ty')->widget(\xvs32x\tinymce\Tinymce::className(), [
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
                    <div class="tab-pane" id="tab-second">
                        <?= $form->field($model, 'iframe')->textArea()?>

                        <?= $form->field($model, 'showroom')->widget(\xvs32x\tinymce\Tinymce::className(), [
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
                    <div class="tab-pane" id="tab-third">

                        <?= $form->field($model, 'tuyen_dung')->widget(\xvs32x\tinymce\Tinymce::className(), [
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
        </div>
        <div class="panel-footer">
            <?= Html::submitButton(Yii::t('backend', 'Lưu lại  <span class="fa fa-floppy-o fa-right"></span>'), ['class' => 'btn btn-primary pull-right']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</div>
