<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SpEmploy */
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
                    <li class="active""><a href="#tab-first" role="tab" data-toggle="tab" aria-expanded="false">Chính sách đổi trả</a></li>
                    <li class=""><a href="#tab-second" role="tab" data-toggle="tab" aria-expanded="false">Chính sách giao hàng</a></li>
                    <li class=""><a href="#tab-third" role="tab" data-toggle="tab" aria-expanded="true">Hướng dẫn thanh toán</a></li>
                    <li class=""><a href="#tab-four" role="tab" data-toggle="tab" aria-expanded="true">Chính sách bảo mật thông tin</a></li>
                    <li class=""><a href="#tab-five" role="tab" data-toggle="tab" aria-expanded="true">Chính sách bảo hành</a></li>
                </ul>
                <div class="panel-body tab-content">
                    <div class="tab-pane active" id="tab-first">
                        <?= $form->field($model, 'chinh_sach_hoi_tra')->widget(\xvs32x\tinymce\Tinymce::className(), [
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
                        <?= $form->field($model, 'chinh_sach_giao_hang')->widget(\xvs32x\tinymce\Tinymce::className(), [
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

                        <?= $form->field($model, 'huong_dan_thanh_toan')->widget(\xvs32x\tinymce\Tinymce::className(), [
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
                    <div class="tab-pane" id="tab-four">
                        <?= $form->field($model, 'chinh_sach_bao_mat_thong_tin')->widget(\xvs32x\tinymce\Tinymce::className(), [
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
                    <div class="tab-pane" id="tab-five">
                        <?= $form->field($model, 'chinh_sach_bao_hanh')->widget(\xvs32x\tinymce\Tinymce::className(), [
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
