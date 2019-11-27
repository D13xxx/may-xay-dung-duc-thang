<?php

use common\models\Products;
use yii\widgets\LinkPager;
use yii\helpers\Url;
$type =  Yii::$app->getRequest()->getQueryParam('type');
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
  ?>
  
<style>
    .productsItemType{
        clear: inherit !important;
    }
</style>
<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<div class="breadcrumb-box">
    <div class="container">
        <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li><a href="<?= Url::to('site/index') ?>"><span>Trang chủ</span></a></li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemtype="https://schema.org/Thing" itemprop="item" >
                    <span itemprop="name"><?= Products::T_ARRAY()[(int)$type]?></span>
                </a>
                <meta itemprop="position" content="1">
            </li>
        </ul>
    </div>
</div>

<div id="banner">
    <div class="container">
        <img src="<?= Yii::getAlias('@fakelink/banner-type/banner.jpg')?>" alt="banner">
    </div>
</div>

<section id="main-content">
    <div class="container">
        <div class="product-tax-header">
            <h1 class="page-title"><?= Products::T_ARRAY()[(int)$type] ?></h1>
            <div class="sort-box">
                <div class="sort-select">
                    <span>Sắp xếp theo</span>
                    <ul>
                        <li><a href="<?= Url::to(['products/list-products-type','type'=>$type,'sort'=>'new'])?>" rel="nofollow">Mới nhất</a></li>
                        <li><a href="<?= Url::to(['products/list-products-type','type'=>$type,'sort'=>'old'])?>" rel="nofollow">Cũ nhất</a></li>
                        <li><a href="<?= Url::to(['products/list-products-type','type'=>$type,'sort'=>'price-asc'])?>" rel="nofollow">Giá tăng dần</a></li>
                        <li><a href="<?= Url::to(['products/list-products-type','type'=>$type,'sort'=>'price-desc'])?>" rel="nofollow">Giá giảm dần</a></li>
                    </ul>
                </div>
            </div>
            <div class="clr"></div>
        </div>
        <div class="product-list product-list-5">
            <div class="row">
                <?php
                if (!empty($models)){
                    foreach ($models as $model){ ?>
                        <div class="col-md-3 col-xs-6 product-item productsItemType">
                            <div class="product-box">
                                <div class="product-img">
                                    <a href="<?= Url::to(['products/view','slug'=>$model->slug])?>">
                                        <?php
                                        if(!empty($model->avatar)){?>
                                            <img src="<?= Yii::getAlias('@fakelink/products/'.$model->avatar)?>" alt="<?= $model->avatar?>" class="lazy-load"
                                                 style="display: block;">
                                        <?php }else{?>
                                            <img src="https://via.placeholder.com/200x200" alt="avatar">
                                        <?php }
                                        ?>
                                    </a>
                                    <span class="icon-sale">-<?= $model->sale_number?>%</span><span class="icon-label">
											<img src="/theme-v2/images/icon-new.png" alt="new">
										</span>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="<?= \yii\helpers\Url::to(['/products/view','slug'=>$model->slug])?>"><?= ucwords($model->full_name)?></a></h3>
                                    <div class="product-price">
                                        <p class="gia"><?= number_format($model->price)?>đ</p>
                                        <p class="gia-cu"><?= number_format($model->exp_price)?>đ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    }
                ?>
            </div>

        </div>

        <div class="pagination text-center">
            <?=
            LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
<!--            <span> 1 </span>-->
<!--            <a href="https://dienmaythanhloi.vn/khuyen-mai?page=2"> 2 </a><a href="https://dienmaythanhloi.vn/khuyen-mai?page=3"> 3 </a><a href="https://dienmaythanhloi.vn/khuyen-mai?page=4"> 4 </a><a href="https://dienmaythanhloi.vn/khuyen-mai?page=2">»</a></div>-->
    </div>
</section>