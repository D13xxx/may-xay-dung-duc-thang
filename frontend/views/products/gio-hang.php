<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng';

\Yii::$app->view->registerMetaTag([
    'name' => 'title',
    'content' => 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng',
  ]);
  \Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => 'Công ty CP Cơ khí và Dịch vụ Đức Thắng chuyên cung cấp và phân phối linh kiện, các sản phẩm điện máy chính hãng, đảm bảo giá rẻ nhất thị trường.',
  ]);
  \Yii::$app->view->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng',
  ]);
  \Yii::$app->view->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Công ty CP Cơ khí và Dịch vụ Đức Thắng chuyên cung cấp và phân phối linh kiện, các sản phẩm điện máy chính hãng, đảm bảo giá rẻ nhất thị trường.',
  ]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:image',
    'content' => 'http://cmsdm.hellomedia.vn/upload/banner/1569750984-tải xuống.jpg',
  ]);
  
$url = Url::to(['products/destroy-pro']);
$urlUpdate = Url::to(['products/update-cart-pro']);
$deleteScript = <<< JS

    $(".modal").show();

    $('.close').click(function() {     
        $(".modal").hide();
    });

    setTimeout(function(){
        $(".modal").hide();
        // window.location.href = "https://mayxaydungducthang.vn";

    }, 3000);

    $("#changeTienMat").hide();
    $("#changeChuyenKhoan").hide();

    $('#tienMat').click(function() {     
        if($("#tienMat").prop("checked", true)){
            $(this).attr('checked', false);
            $("#changeTienMat").show();
            $("#changeChuyenKhoan").hide();
        }
        else{ 
            $(this).attr('checked', true);
            $("#changeTienMat").hide();
            $("#changeChuyenKhoan").show();
        }
    });

    $('#chuyenKhoan').click(function() {     
        // var checkedChuyenKhoan =  $("#chuyenKhoan").prop("checked", true);
        if($("#chuyenKhoan").prop("checked", true)){
            $(this).attr('checked', false);
            $("#changeChuyenKhoan").show();
            $("#changeTienMat").hide();
        }
        else{ 
            $(this).attr('checked', true);
            $("#changeChuyenKhoan").hide();
            $("#changeTienMat").show();
        }
    });

    document.getElementById("orderproducts-total").value = document.getElementById("valuePrice").textContent;
 
      $("body .inputMount").blur(function(){ 
        var thisCtrl = $(this);
        $.ajax({
            type: "POST",
            url: '$urlUpdate', // Your controller action
            data: {
                pid: thisCtrl.attr('data-id'),
                amount: thisCtrl.val()
            },
            success: function(data){
                location.reload();  
            }
        });
    });
    
    $(".btn-delete-cart").on("click", function() {
        var thisCtrl = $(this);
        $.ajax({
            type: "POST",
            url: '$url', // Your controller action
            data: {
                pid: thisCtrl.attr('data-id'),
            },
            success: function(data){
                // if(data == 1){
                    location.reload();  
                // }
            }
        });
    })
JS;
$this->registerJs($deleteScript, \yii\web\View::POS_READY);
?>
<style>
    textarea#orderproducts-descripsion{
        height: 80px !important;
    }
    button.close span {
        font-size: 30px;
        color: black;
    }
    input#chuyenKhoan {
        margin-left: 10px !important;
    }
    .text-center p {
        font-weight: bold;
    }
    img.cart-img {
        width: auto !important;
        max-height: 80px !important;
    }
    div#changeChuyenKhoan{
        padding: 10px !important;
        border: 1px solid darkgray !important;
        margin: 10px 0px !important;
    }
    div#changeTienMat {
        padding: 10px !important;
        border: 1px solid darkgray !important;
        margin: 10px 0px !important;
    }

    /* style modal */

    .modal-content {
        width: 75% !important;
        margin: 0 auto !important;
        margin-top: 20% !important;
    }

    .modal-header {
        width: 100% !important;
        min-height: 50px !important;
    }

    .modal-header img {
        width: 30% !important;
        margin: 0 auto !important;
        margin-left: 35% !important;
    }
    .modal-body img {
        width: 16% !important;
        margin-left: 42% !important;
    }
    input#tienMat,input#chuyenKhoan {
        margin-right: 7px;
    }
    .type-pay {
        margin: 10px 0px;
    }
</style>

<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<div class="breadcrumb-box">
    <div class="container">
        <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li><a href="<?= Url::to('site/index')?>"><span>Trang chủ</span></a></li>
            <li itemprop="itemListElement" itemscope="" itemtype="#">
                <a itemtype="#" itemprop="item" href="#"><span itemprop="name">Đặt hóa đơn</span></a>
                <meta itemprop="position" content="1">
            </li>
        </ul>
    </div>
</div>

<section id="main-content">
    <div class="container">
        <div class="box-content">
            <div class="row">
                <div class="col-md-7 cart-left">
                    <div class="customer-area contact-form">
                        <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <div class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="/theme-v2/images/new-design/logo-v2-cl.png">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="/theme-v2/images/icon-success.png">
                                        <br>
                                        <div class="text-center">
                                            <p>Cảm ơn quý khách đã đặt hàng tại Đức Thắng.</p>
                                            <p>Kính chúc quý khách một ngày tốt lành!</p>
                                            <span>Đơn hàng của quý khách sẽ được vận chuyển trong 1-5 ngày làm việc. Quý khách lưu ý SDT để chúng tôi liên hệ xác nhận thông tin giao hàng</span>
                                            <span>Mọi vấn đề hỗ trợ đơn hàng vui lòng liên hệ : <p>0912.543.455</p></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if (Yii::$app->session->hasFlash('error')): ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-warning" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <?= Yii::$app->session->getFlash('error');?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php $form = ActiveForm::begin([
                            'class'=>'form-cart'
                        ]); ?>
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
                        
                        <div id="changeTienMat">
                            <p><b>1:Áp dụng cho khách hàng nội thành TP.HN</b> Quý khách vui lòng lưu ý trong trường hợp khách hàng đi vắng không thế nhận hàng, quý khách vui lòng ủy thác cho người khác nhận hàng và thanh toán thay.</p> 
                            <p><b>2. Áp dụng cho thị trường tỉnh. </b> Vận chuyển Cod qua bưu điện (công ty chuyển phát nhanh) nhận hàng trả tiền qua bưu điện khách hàng chịu cước phí theo quy định của bưu điện. Hình thức này chỉ áp dụng mặt hàng có giá trị dới 5.000.000 VNĐ, cân nặng không quá 5kg, chiều dài không quá 50cm.</p>
                        </div>

                        <div id="changeChuyenKhoan">
                            <p><b>Quý khách vui lòng đến Ngân hàng hoặc dùng InternetBanking</b> chuyển khoản cho Mayxaydungducthang.vn vào tài khoản dưới đây:</p>
                            <p><b>Nội dung: </b> Thanh toán mã đơn hàng ... & Họ tên</p>
                            <p><b>* Tài khoản : Công ty CP cơ khí và dịch vụ Đức Thắng</b></p>
                            <p><b>STK : 28910000210061 - BIDV chi nhánh Ngọc Khánh – Ba Đình – Hà Nội </b></p>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Đặt hàng', ['class' => 'button cart-submit']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 cart-right">
                    <div class="cart-box">
                        <h2 class="gio-hang-title">Thông tin đơn hàng</h2>
                        <?php
                        if(!empty($data)){
                            foreach ($data as $key){
                                $total =  $key["price"] * $key["amount"];
                                $sum[] =  $total;

                                ?>
                                <div class="cart-item cart_line" data-id="<?= $key["id"]?>">
                                    <h3 class="cart-title"><?= ucwords($key["fullName"]) ?></h3>
                                    <p>Số lượng: <input class="cart-qty inputMount" type="text" value="<?= $key["amount"] ?>" data-id="<?= $key["id"]?>"> x
                                        <span class="cart_tong" data-id="<?= $key["id"]?>"><?= number_format($key["price"])?></span>đ</p>
                                    <?php
                                    if(!empty($key["img"])){?>
                                        <img src="<?= Yii::getAlias('@fakelink/products/'.$key["img"])?>" class="cart-img"
                                        >
                                    <?php }else{?>
                                        <img src="https://via.placeholder.com/50x50" class="cart-img" alt="avatar">
                                    <?php }
                                    ?>
                                    <a href="#" class="btn-delete-cart" data-id="<?= $key["id"]?>">
                                        <img src="/theme-v2/images/icon_trash.png">
                                    </a>
                                </div>
                            <?php }
                        }
                        ?>
                        <p class="cart-total"><span id="valuePrice"><?php if(!empty($sum)){echo number_format(array_sum($sum)) ;}else{echo 0;} ?></span> VNĐ</p>
                        <div class="cart-bottom">
                            <a href="<?= Url::to(['products/destroy'])?>" class="btn-remove-cart">Xóa giỏ hàng</a>
                            <div class="clr"></div>
                            <a href="<?= Url::to('/site/index')?>" class="cart-buy">Mua thêm sản phẩm khác</a>
                        </div>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
</section>
<?php ActiveForm::end(); ?>
