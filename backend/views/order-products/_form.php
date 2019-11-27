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
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Tạo mới đơn hàng.</strong> </h3>
        </div>
        <div class="panel-body">

            <?php $form = ActiveForm::begin(); ?>
           
            <h2 class="customer-title">Thông tin người nhận hàng</h2>

            <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'cell_phone')->textInput() ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'descripsion')->textarea(['maxlength' => true]) ?>

            <?= $form->field($model, 'total')->hiddenInput()->label(false) ?>

            <div class="type-pay">
                <input type="radio" name="thanhToan" id="tienMat" value="1">Thanh toán tiền mặt
                <input type="radio" name="thanhToan" id="chuyenKhoan" value="0">Chuyển khoản (Nộp tiền) qua tài khoản ngân hàng   
            </div>
          
        </div>
    </div>
    <div class="panel-footer">
        <?= Html::submitButton('Đặt hàng', ['class' => 'btn cart-submit btn-success']) ?>

        <?= Html::a('Quay lại', 'index',['class'=>'btn btn-default pull-right'])?>

    </div>
 
    <?php ActiveForm::end(); ?>
</div>

