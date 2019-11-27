<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;
use app\views\widgets\Rating;
use common\models\OrderProducts;

$this->title = ($model->title_seo != "") ? $model->title_seo : $model->full_name;
\Yii::$app->view->registerMetaTag([
    'name' => 'title',
    'content' => ($model->title_seo != "") ? $model->title_seo : $model->full_name,
]);
\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => ($model->description_seo != "") ? $model->description_seo : $model->description,
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->keyword_seo,
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'url',
    'content' => Url::to(['products/view', 'slug' => $model->slug]),
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'og:title',
    'content' => ($model->title_seo != "") ? $model->title_seo : $model->full_name,
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:description',
    'content' => ($model->description_seo != "") ? $model->description_seo : $model->description,
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:image',
    'content' => 'https://cms.mayxaydungducthang.vn/upload' . (($model->img_share != "") ? '/products/img-share/' . ($model->img_share) : '/products/' . $model->avatar),
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
    .zing-content h2 {
        font-size: 20px !important;
        font-weight: bold !important;
    }

    .zing-content ul li {
        list-style-type: circle;
    }

    .zing-content h3 {
        font-size: 18px !important;
        font-weight: bold !important;
    }

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
        border: none
    }

    .zing-content table {
        width: 100%;
    }

    .col-md-3.col-xs-6.product-item.itemm {
        clear: inherit;
    }

    .pagination {
        display: flex !important;
        justify-content: center !important;
    }

    span#u_0_6 {
        display: none !important;
    }

    tr._51mx {
        float: right !important;
    }

    @media only screen and (max-width: 500px) {
        .product-slider .img-main img {
            position: absolute !important;
            margin: auto !important;
            top: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            height: auto !important;
            width: 100% !important;
            /* min-height: 50%; */
        }
    }

    .keyword a {
        color: #5c5c5c;
        background: #e9e9eb;
        padding: 5px 15px;
        margin: 5px 5px;
        display: inline-block;
        border-radius: 2px;
    }

    /* style modal */
    .modal-content {
        width: 75%;
        margin: 0 auto;
        margin-top: 20%;
    }

    .modal-header {
        width: 100%;
        min-height: 50px;
    }

    .modal-header img {
        width: 30%;
        margin: 0 auto;
        margin-left: 35%;
    }

    .modal-body img {
        width: 16%;
        margin-left: 42%;
    }

    div#thong-in-chi-tiet {
        padding: 10px;
    }

    div#thong-so-ky-thuat {
        padding: 10px;
    }

    p.gia {
        text-align: left !important;
    }

    p.gia-cu {
        text-align: left !important;
    }
    .btnMobile {
            display: none;
        }
        .btnDesk{
            display: block;
        }
    @media only screen and (max-width: 900px) {
        .btnMobile {
            display: block;
        }
        .btnDesk{
            display: none;
        }
    }
    
</style>

<?php if (Yii::$app->session->hasFlash('success')) : ?>
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
                        <b><?= Yii::$app->session->getFlash('success'); ?></b>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>mayxaydungducthang.vn - 2019</p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->render('/layouts/header-center') ?>

<?= $this->render('/layouts/header-bottom') ?>

<div class="breadcrumb-box">
    <div class="container">
        <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li><a href="https://http://dienmaythanhloi.com/"><span>Trang chủ</span></a></li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemtype="https://schema.org/Thing" itemprop="item" href="<?= \yii\helpers\Url::to(['products/list-products-cat', 'slug' => $model->cat->slug]) ?>"><span itemprop="name"><?= ucwords($model->cat->name) ?></span></a>
                <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemtype="https://schema.org/Thing" itemprop="item" href="https://http://dienmaythanhloi.com/may-duc-be-tong-amax-am-0810"><span itemprop="name"><?= ucwords($model->full_name) ?></span></a>
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
                        if (!empty($model->avatar)) { ?>
                            <img src="<?= Yii::getAlias('@fakelink/products/' . $model->avatar) ?>" alt="<?= $model->avatar ?>" class="lazy-load" style="display: block;">
                        <?php } else { ?>
                            <img src="https://via.placeholder.com/200x200" alt="avatar">
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="product-right">
                <h1 class="product-single-title"><?= ucwords($model->full_name) ?></h1>
                <div class="product-price product-single-price">
                    <p class="gia"><?= number_format($model->price) ?>đ</p>
                    <p class="gia-cu"><?= number_format($model->exp_price) ?>đ</p>
                </div>
                <div class="product-parameter">
                    <p>
                        <span>Mã sản phẩm:</span>
                        <font><?= $model->code ?></font>
                    </p>
                    <p>
                        <span>Tình trạng:</span>
                        <font><?= $model->is_empty == 1 ? 'Còn hàng' : 'Hết hàng' ?></font>
                    </p>
                    <p>
                        <span>Bảo hành:</span>
                        <font><?= $model->guarantce ?> tháng</font>
                    </p>
                </div>
                <div class="product-btn btnMobile">
                    <div class="product-btn-left">
                        <form action="<?= Url::to(['products/add-cart-pro']) ?>" method="post">
                            <input type="hidden" value="<?= $model->id ?>" name="pid">
                            <button type="submit" class="button btn-buy">Mua ngay</button>
                        </form>
                    </div>
                    <div class="product-btn-right">
                        <a href="javascript:void(0)" data-id="<?= $model->id ?>" class="button btn-add-cart">Thêm vào giỏ hàng</a>
                    </div>
                </div>
                <div class="product-address">
                    <p class="product-info-title">Showroom</p>
                    <b>Địa chỉ 1: 170A Thạch Bàn, Long Biên, Hà Nội</b>
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
                <div class="product-btn btnDesk">
                    <div class="product-btn-left">
                        <form action="<?= Url::to(['products/add-cart-pro']) ?>" method="post">
                            <input type="hidden" value="<?= $model->id ?>" name="pid">
                            <button type="submit" class="button btn-buy">Mua ngay</button>
                        </form>
                    </div>
                    <div class="product-btn-right">
                        <a href="javascript:void(0)" data-id="<?= $model->id ?>" class="button btn-add-cart">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="clr"></div>
        </div>

        <div class="product-bottom">
            <div class="box-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active" id="thong-in-chi-tiet-tab" data-toggle="tab" href="#thong-in-chi-tiet" role="tab" aria-controls="thong-in-chi-tiet" aria-selected="true"><h4 style="margin-bottom: 5px;">THÔNG TIN CHI TIẾT</h4></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" id="thong-so-ky-thuat-tab" data-toggle="tab" href="#thong-so-ky-thuat" role="tab" aria-controls="thong-so-ky-thuat" aria-selected="false"><h4 style="margin-bottom: 5px;">THÔNG SỐ KỸ THUẬT</h4></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade in active" id="thong-in-chi-tiet" role="tabpanel" aria-labelledby="thong-in-chi-tiet-tab">
                        <p class="product-single-box-title">Thông tin chi tiết</p>
                        <div class="zing-content">
                            <?= $model->content ? $model->content : '' ?>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="thong-so-ky-thuat" role="tabpanel" aria-labelledby="thong-so-ky-thuat-tab">
                        <p class="product-single-box-title">Thông số kỹ thuật</p>
                        <div class="zing-content">
                            <?= $model->thong_so_ky_thuat ? $model->thong_so_ky_thuat : '' ?>
                        </div>  
                    </div>
                </div>

                <div class="keyword">
                    <p>Từ khóa:
                        <?php
                        if (!empty($tagNames)) {
                            foreach ($tagNames as $tagName) { ?>
                                <a href="<?= Url::to(['products/list-products-tag', 'tag' => $tagName->tag_name]) ?>"><?= $tagName->tag_name ?></a>
                        <?php }
                        }
                        ?>

                    </p>
                </div>
                <?= Rating::widget([
                    'table' => 'product',
                    'post_id' => $model->id,
                    'href' => 'http://mayxaydungducthang.vn/' . $model->slug . '.html',
                    'images' => Yii::getAlias("@fakelink/products/" . $model->avatar),
                    'description' => ($model->description_seo != "") ? $model->description_seo : $model->description,
                    'name' => $model->full_name,
                    'price'=> $model->price

                ]) ?>
                <div class="product-comment">
                    <div class="product-comment-header">
                        <p class="product-comment-title">Bình luận</p>
                        <div class="product-like">
                            <!-- facebook likke-->
                            <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fmayxaydungducthang.vn/<?= $model->slug ?>.html&layout=button_count&size=small&appId=254423978768118&width=78&height=20" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <!-- facebook comment-->
                    <div class="fb-comments" data-href="http://mayxaydungducthang.vn/<?= $model->slug ?>" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
            <div class="box-content product-similar">
                <p class="product-single-box-title">Sản phẩm liên quan</p>
                <div class="product-list product-list-5">
                    <div class="row">
                        <?php
                        if (!empty($models)) {
                            foreach ($models as $item) { ?>
                                <div class="col-md-3 col-xs-6 product-item itemm">
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="<?= \yii\helpers\Url::to(['/products/view', 'slug' => $item->slug]) ?>">
                                                <?php
                                                        if (!empty($item->avatar)) { ?>
                                                    <img src="<?= Yii::getAlias('@fakelink/products/' . $item->avatar) ?>" alt="<?= $item->avatar ?>" class="lazy-load" style="display: block;">
                                                <?php } else { ?>
                                                    <img src="https://via.placeholder.com/200x200" alt="avatar">
                                                <?php }
                                                        ?>
                                            </a>
                                            <span class="icon-sale">-<?= $item->sale_number ?>%</span> <span class="icon-label">
                                                <img src="/theme-v2/images/icon-new.png" alt="new">
                                            </span>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="<?= \yii\helpers\Url::to(['/products/view', 'slug' => $item->slug]) ?>"><?= ucwords($item->full_name) ?></a></h3>
                                            <div class="product-price">
                                                <p class="gia"><?= number_format($item->price) ?>đ</p>
                                                <p class="gia-cu"><?= number_format($item->exp_price) ?>đ</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
$script = <<<JS
// $('.modal').modal('show');
$(".modal").show();
setTimeout(function(){
    $(".modal").hide();
}, 3000);
JS;
$this->registerJs($script, yii\web\view::POS_READY);
?>