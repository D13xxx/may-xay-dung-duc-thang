<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;

 $this->title = ($model->title_seo !="")? $model->title_seo : $model->full_name;
\Yii::$app->view->registerMetaTag([
  'name' => 'title',
  'content' => ($model->title_seo !="")? $model->title_seo : $model->full_name,
]);
\Yii::$app->view->registerMetaTag([
  'name' => 'description',
  'content' => ($model->description_seo !="") ? $model->description_seo : $model->description ,
]);

\Yii::$app->view->registerMetaTag([
  'name' => 'keywords',
  'content' => $model->keyword_seo,
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'url',
    'content' => Url::to(['products/view','slug'=>$model->slug]),
  ]);
  

$url = Url::to(['products/add-cart-ajax']);
$deleteScript = <<< JS
   
    $(".btn-add-cart").on("click", function() {
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
    .product-slider {
        width: 100% !important;
    }

    .product-slider .img-main {
        width: 100% !important;
    }
    button.button.btn-buy {
        display: block;
        width: 100%;
        height: 45px;
        padding: 0 10px;
        border-radius: 3px;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
        text-transform: uppercase;
        line-height: 45px;
        margin-bottom: 10px;
        border:none
    }
    .zing-content table{
        width: 100%;
    }
</style>

<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<div class="breadcrumb-box">
    <div class="container">
        <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li><a href="https://http://dienmaythanhloi.com/"><span>Trang chủ</span></a></li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemtype="https://schema.org/Thing" itemprop="item" href="<?= \yii\helpers\Url::to(['products/list-products-cat','slug'=>$model->cat->slug])?>"><span itemprop="name"><?= ucwords($model->cat->name) ?></span></a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemtype="https://schema.org/Thing" itemprop="item" href="https://http://dienmaythanhloi.com/may-duc-be-tong-amax-am-0810"><span itemprop="name"><?= ucwords($model->full_name)?></span></a>
                <meta itemprop="position" content="2">
            </li>
        </ul>
    </div>
</div>

<section id="main-content">
    <div class="container">
        <div class="box-content product-top">
            <div class="product-left">
                <div class="product-slider">
                    <div class="img-main">
                        <?php
                        if(!empty($model->avatar)){?>
                            <img src="<?= Yii::getAlias('@fakelink/products/'.$model->avatar)?>" class="lazy-load"
                                 style="display: block;">
                        <?php }else{?>
                            <img src="https://via.placeholder.com/200x200" alt="avatar">
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="product-right">
                <h1 class="product-single-title"><?= ucwords($model->full_name) ?></h1>
                <div class="product-price product-single-price">
                    <p class="gia"><?= number_format($model->price)?>đ</p>
                    <p class="gia-cu"><?= number_format($model->exp_price)?>đ</p>
                </div>
                <div class="product-parameter">
                    <p>
                        <span>Mã sản phẩm:</span>
                        <font><?= $model->code?></font>
                    </p>
                    <p>
                        <span>Tình trạng:</span>
                        <font><?= $model->is_empty == 1 ? 'Còn hàng' : 'Hết hàng' ?></font>
                    </p>
                    <p>
                        <span>Bảo hành:</span>
                        <font><?= $model->guarantce?> tháng</font>
                    </p>
                </div>
                <div class="product-address">
                    <p class="product-info-title">Showroom</p>
                    <p class="header-address">Địa chỉ 1: 170A Thạch Bàn, Long Biên, Hà Nội</p>
                </div>
                <div class="product-hotline">
                    <div class="product-hotline-item">
                        <p class="product-info-title">Hotline</p>
                        <p class="product-hotline-list">0985.650.880&nbsp;|&nbsp;&nbsp;0912.543.455</p>
                    </div>
                    <div class="product-hotline-item">
                        <p class="product-info-title">Kỹ thuật</p>
                        <p class="product-ky-thuat-list">0985.650.880&nbsp;|&nbsp;&nbsp;0912.543.455</p>
                    </div>
                </div>
                <div class="product-btn">
                    <div class="product-btn-left">
                        <form action="<?= Url::to(['products/add-cart-pro'])?>" method="post">
                            <input type="hidden" value="<?= $model->id?>" name="pid">
                            <button type="submit" class="button btn-buy">Mua ngay</button>
                        </form>
                    </div>
                    <div class="product-btn-right">
                        <a href="javascript:void(0)" data-id="<?= $model->id?>" class="button btn-add-cart">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </div>

        <div class="product-bottom">
            <div class="box-content">
                <p class="product-single-box-title">Thông tin chi tiết</p>
                <div class="zing-content">
                   <?= $model->	content ? ucwords($model->	content) : ''?>
                </div>
                <div class="product-comment">
                    <div class="product-comment-header">
                        <p class="product-comment-title">Bình luận</p>
                        <div class="product-like">
                            <!-- facebook likke-->
                            <div class="fb-like" data-href="http://dienmaythanhloi.com:8080" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <!-- facebook comment-->
                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
            <div class="box-content product-similar">
                <p class="product-single-box-title">Sản phẩm liên quan</p>
                <div class="product-list product-list-5">
                    <div class="row">
                        <?php
                        if (!empty($models)){
                            foreach ($models as $item){ ?>
                                <div class="col-md-3 col-xs-6 product-item">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="<?= \yii\helpers\Url::to(['/products/view','slug'=>$item->slug]) ?>">
                                                <?php
                                                if(!empty($item->avatar)){?>
                                                    <img src="<?= Yii::getAlias('@fakelink/products/'.$item->avatar)?>" class="lazy-load"
                                                         style="display: block;">
                                                <?php }else{?>
                                                    <img src="https://via.placeholder.com/200x200" alt="avatar">
                                                <?php }
                                                ?>
                                            </a>
                                            <span class="icon-sale">-<?= $item->sale_number?>%</span> <span class="icon-label">
											<img src="/theme-v2/images/icon-new.png">
										</span>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="<?= \yii\helpers\Url::to(['/products/view','slug'=>$item->slug]) ?>"><?= ucwords($item->full_name)?></a></h3>
                                            <div class="product-price">
                                                <p class="gia"><?= number_format($item->price)?>đ</p>
                                                <p class="gia-cu"><?= number_format($item->exp_price)?>đ</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }
                        ?>

                    </div>
                </div>
                <div class="pagination">
                    <?=
                    LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>