<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$url = Url::to(['products/destroy-pro']);
$urlUpdate = Url::to(['products/update-cart-pro']);
$deleteScript = <<< JS
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
    img.cart-img {
        width: auto !important;
        max-height: 80px !important;
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                        <?= Yii::$app->session->getFlash('success');?>
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

                        <?= $form->field($model, 'total')->textInput() ?>

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
                                        <img src="https://http://dienmaythanhloi.com/theme/default/images/icon_trash.png">
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
