<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use \common\models\Products;
$this->title = 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng';

\Yii::$app->view->registerMetaTag([
  'name' => 'title',
  'content' => 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng',
]);
\Yii::$app->view->registerMetaTag([
  'name' => 'description',
  'content' => 'Máy xây dựng Đức Thắng chuyên cung cấp và phân phối linh kiện, các sản phẩm điện máy chính hãng, đảm bảo giá rẻ nhất thị trường.',
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng',
  ]);
  \Yii::$app->view->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Máy xây dựng Đức Thắng chuyên cung cấp và phân phối linh kiện, các sản phẩm điện máy chính hãng, đảm bảo giá rẻ nhất thị trường.',
  ]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:image',
    'content' => 'https://cms.mayxaydungducthang.vn/upload/banner/1569750984-tải xuống.jpg',
  ]);
  \Yii::$app->view->registerMetaTag([
    'property' => 'og:url',
    'content' => 'https://mayxaydungducthang.vn',
  ]);
  \Yii::$app->view->registerMetaTag([
    'rel' => 'canonical',
    'content' => 'https://mayxaydungducthang.vn',
  ]);
?>

<style>
    .slideshow .item img{
        min-height: 0 !important;
    }
    .owl-dots {
        text-align: center !important;
    }
    .header-address img {
        width: 20px;
        margin: 0;
        margin-top: -5px;
        margin-right: 4px;
    }
    .col-md-4.col-xs-6.product-item.Item3 {
        clear: inherit;
    }
</style>


<?= $this->render('/layouts/header-center')?>

<div class="header-bottom">
    <div class="container">
        <div class="fleft danh-muc-box">
            <div class="danh-muc-btn">Danh mục sản phẩm</div>
        </div>
        <div class="contact">
            <p class="header-address">
                <a href="/"><img class="lazy-load" data-original="/theme-v2/images/new-design/dia-chi.png" alt="dia-chi.png"> <span>170A Thạch Bàn,Long Biên, Hà Nội</span></a>
            </p>
            <p class="header-address">
                <a href="/"><img class="lazy-load" data-original="/theme-v2/images/new-design/sdt.png" alt="sdt.png"> <span>Hotline: 0985.650.880 | 0912.543.455</span></a>
            </p>
        </div>
    </div>
</div>
<div class="home-top">
    <div class="container">
        <div class="home-top-left">
            <div class="danh-muc-menu">
                <ul>
                    <?php
                    if (!empty($listCat)){
                        foreach ($listCat as $menu){ ?>
                            <li class=" li-parent">
                                <a href="<?= Url::to(['products/list-products-cat','slug'=>$menu->slug])?>" rel="category tag"><?= ucwords($menu->name)?></a>
                                <ul class="sub-menu" style="min-height: 400px;">
                                    <?php
                                        $subMenus = \common\models\CatProducts::find()->where(['parent_id'=>$menu->id])->all();
                                        if (!empty($subMenus)){
                                            foreach ($subMenus as $subMenu){ ?>
                                                <li class="">
                                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$subMenu->slug])?>" rel="category tag">
                                                        <span class="img">
                                                            <?php
                                                            if(!empty($subMenu->avatar)){?>
                                                                <img class="lazy-load lazy" alt="<?= $subMenu->avatar?>" src="<?= Yii::getAlias('@fakelink/cat-products/'.$subMenu->avatar)?>">
                                                            <?php }else{?>
                                                                <img class="lazy-load" data-original="https://via.placeholder.com/140x70" alt="avatar">
                                                            <?php }
                                                            ?>
                                                        </span>
                                                        <span class="text"><?= ucwords($subMenu->name)?></span>
                                                    </a>
                                                </li>
                                            <?php }
                                        }
                                    ?>
                                </ul>
                            </li>
                    <?php }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="home-top-right">
            <div class="slideshow">
                <div class="slider ">
                    <!-- slide -->
                    <div class="slider_main owl-theme owl-carousel">
                        <?php
                        if (!empty($banners)){
                            foreach ($banners as $banner){ ?>
                                <div class="item">
                                    <a><img class="lazy-load" alt="<?= $banner->image?>" src="<?= Yii::getAlias('@fakelink/banner/'.$banner->image)?>"> </a>
                                </div>
                           <?php  }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="home-bottom">
    <div class="container">
        <div class="slideshow">
            <div class="slider ">
                <!-- slide -->
                <div class="slider-doi-tac owl-theme owl-carousel">
                    
                    <div class="item slider-doi-tac-item">
                        <div class="slider-doi-tac-img">
                            <a><img class="lazy-load" alt="pentax.png" src="<?= Yii::getAlias('@fakelink/slide-doi-tac/pentax.png')?>"> </a>
                        </div>
                    </div>
                    <div class="item slider-doi-tac-item">
                        <div class="slider-doi-tac-img">
                            <a><img class="lazy-load" alt="slide1.png" src="<?= Yii::getAlias('@fakelink/slide-doi-tac/slide1.png')?>"> </a>
                        </div>
                    </div>
                    <div class="item slider-doi-tac-item">
                        <div class="slider-doi-tac-img">
                            <a><img class="lazy-load" alt="slide2" src="<?= Yii::getAlias('@fakelink/slide-doi-tac/1.png')?>"> </a>
                        </div>
                    </div>

                    <div class="item slider-doi-tac-item">
                        <div class="slider-doi-tac-img">
                            <a><img class="lazy-load" alt="pentax.png" src="<?= Yii::getAlias('@fakelink/slide-doi-tac/2.jpg')?>"> </a>
                        </div>
                    </div>
                    <div class="item slider-doi-tac-item">
                        <div class="slider-doi-tac-img">
                            <a><img class="lazy-load" alt="pentax.png" src="<?= Yii::getAlias('@fakelink/slide-doi-tac/3.jpg')?>"> </a>
                        </div>
                    </div>
                    <div class="item slider-doi-tac-item">
                        <div class="slider-doi-tac-img">
                            <a><img class="lazy-load" alt="slide1.png" src="<?= Yii::getAlias('@fakelink/slide-doi-tac/Maktec_logo.png')?>"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="main-content">
    <div class="container">
        
        <div class="home-box home-box-product-tab">
            <div class="zing-tab product-tab">
                <div class="tab-header">
                    <ul>
                        <li><a href="#tab1" class="active sanPhamKhuyeMai"> khuyến mại</a></li>
                        <li><a href="#tab2 " class="sanPhamBanChay"> bán chạy</a></li>
                        <li><a href="#tab3 " class="sanPhamMoi"> mới</a></li>
                    </ul>
                </div>
                <div class="clr"></div>
                <div class="tab-content zing-content">
                    <div id="tab1" class="tab">
                        <div class="home-product-left">
                            <div class="product-item">
                                <?php
                                if(!empty($sanPhamNoiBatKhuyenMai)){ ?>
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="<?= Url::to(['/products/view','slug'=>$sanPhamNoiBatKhuyenMai->slug])?>">
                                                <?php
                                                if(!empty($sanPhamNoiBatKhuyenMai->avatar)){?>
                                                    <img src="<?= Yii::getAlias('@fakelink/products/'.$sanPhamNoiBatKhuyenMai->avatar)?>" alt="<?= $sanPhamNoiBatKhuyenMai->avatar ?>" class="lazy lazy-load"
                                                         >
                                                <?php }else{?>
                                                    <img class="lazy-load" data-original="https://via.placeholder.com/300x400" alt="avatar">
                                                <?php }
                                                ?>
                                            </a>
                                            <span class="icon-sale">-<?= $sanPhamNoiBatKhuyenMai->sale_number?>%</span> <span class="icon-label">
                                            <img class="lazy-load lazy" src="/theme-v2/images/icon-new.png" alt="new">
                                        </span>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="<?= Url::to(['/products/view','slug'=>$sanPhamNoiBatKhuyenMai->slug])?>"><?= ucwords($sanPhamNoiBatKhuyenMai->full_name)?></a></h3>
                                            <div class="product-price">
                                                <p class="gia"><?= number_format($sanPhamNoiBatKhuyenMai->price)?>đ</p>
                                                <p class="gia-cu"><?= number_format($sanPhamNoiBatKhuyenMai->exp_price)?>đ</p>
                                            </div>
                                            <p class="product-excerpt">Thương hiệu : <?= $sanPhamNoiBatKhuyenMai->brandName->name ?><br>
                                                <?= $sanPhamNoiBatKhuyenMai->description ?><br>
                                                Bảo hành : <?= $sanPhamNoiBatKhuyenMai->guarantce ?> tháng</p>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <div class="home-product-right">
                            <div class="product-list product-list-3">
                                <div class="row">
                                    <?php
                                    if(!empty($sanPhamKhuyenMai)){
                                        foreach($sanPhamKhuyenMai as $item){?>
                                            <div class="col-md-4 col-xs-6 product-item Item3">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        <a href="<?= Url::to(['products/view','slug'=>$item->slug])?>">
                                                            <?php
                                                            if(!empty($item->avatar)){?>
                                                                <img src="<?= Yii::getAlias('@fakelink/products/'.$item->avatar)?>" alt="<?= $item->avatar?>" class="lazy lazy-load"
                                                                     >
                                                            <?php }else{?>
                                                                <img class="lazy-load" data-original="https://via.placeholder.com/300x400" alt="avatar">
                                                            <?php }
                                                            ?>
                                                        </a>
                                                        <span class="icon-sale">-<?= $item->sale_number ? $item->sale_number : '0'?>%</span> <span class="icon-label">
                                                    <img class="lazy lazy-load" src="/theme-v2/images/icon-new.png" alt="new">
                                                </span>
                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-title"><a
                                                                    href="<?= Url::to(['products/view','slug'=>$item->slug])?>"><?= $item->full_name ? ucwords($item->full_name) : '0'?></a></h3>
                                                        <div class="product-price">
                                                            <p class="gia"><?= $item->price ? number_format($item->price) : '0'?>đ</p>
                                                            <p class="gia-cu"><?= $item->exp_price ? number_format($item->exp_price) : '0'?>đ</p>
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
                        <div class="clr"></div>
                        <a href="<?= Url::to(['products/list-products-type','type'=>Products::T_SANPHAMKHUYENMAI])?>" class="button btn-xem-tat-ca">Xem tất cả</a>
                    </div>
                    <div id="tab2" class="tab">
                        <div class="home-product-left">
                            <div class="product-item">
                                <?php
                                if(!empty($sanPhamNoiBatBanChay)){ ?>
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="<?= Url::to(['products/view','slug'=>$sanPhamNoiBatBanChay->slug])?>">
                                                <?php
                                                if(!empty($sanPhamNoiBatBanChay->avatar)){?>
                                                    <img class="lazy lazy-load" alt="<?= $sanPhamNoiBatBanChay->avatar?>" data-original="<?= Yii::getAlias('@fakelink/products/'.$sanPhamNoiBatBanChay->avatar)?>">
                                                <?php }else{?>
                                                    <img class="lazy lazy-load" data-original="https://via.placeholder.com/300x400" alt="avatar">
                                                <?php }
                                                ?>
                                            </a>
                                            <span class="icon-sale">-<?= $sanPhamNoiBatBanChay->sale_number ?>%</span> <span class="icon-label">
                                            <img class="lazy lazy-load" src="/theme-v2/images/icon-new.png" alt="new">
                                        </span>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="<?= Url::to(['products/view','slug'=>$sanPhamNoiBatBanChay->slug])?>"><?= ucwords($sanPhamNoiBatBanChay->full_name)?></a></h3>
                                            <div class="product-price">
                                                <p class="gia"><?= number_format($sanPhamNoiBatBanChay->price)?>đ</p>
                                                <p class="gia-cu"><?= number_format($sanPhamNoiBatBanChay->exp_price)?>đ</p>
                                            </div>
                                            <p class="product-excerpt">Thương hiệu : <?= $sanPhamNoiBatBanChay->brandName->name ?><br>
                                                <?= $sanPhamNoiBatBanChay->description ?><br>
                                                Bảo hành : <?= $sanPhamNoiBatBanChay->guarantce ?> tháng</p>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="home-product-right">
                            <div class="product-list product-list-3">
                                <div class="row">
                                    <?php
                                    if(!empty($sanPhamBanChay)){
                                        foreach ($sanPhamBanChay as $item){?>
                                            <div class="col-md-4 col-xs-6 product-item">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        <a href="<?= Url::to(['products/view','slug'=>$item->slug])?>">
                                                            <?php
                                                            if(!empty($item->avatar)){?>
                                                                <img class="lazy lazy-load" alt="<?= $item->avatar?>" data-original="<?= Yii::getAlias('@fakelink/products/'.$item->avatar)?>">
                                                            <?php }else{?>
                                                                <img class="lazy lazy-load" data-original="https://via.placeholder.com/300x400" alt="avatar">
                                                            <?php }
                                                            ?>
                                                        </a>
                                                        <span class="icon-sale">-<?= $item->sale_number ? $item->sale_number : '0'?>%</span> <span class="icon-label">
                                                    <img class="lazy lazy-load" src="/theme-v2/images/icon-new.png" alt="new">
                                                </span>
                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-title">
                                                            <a href="<?= Url::to(['products/view','slug'=>$item->slug])?>"><?= $item->full_name ? ucwords($item->full_name) : '0'?></a></h3>
                                                        <div class="product-price">
                                                            <p class="gia"><?= $item->price ? number_format($item->price) : '0'?>đ</p>
                                                            <p class="gia-cu"><?= $item->exp_price ? number_format($item->exp_price) : '0'?>đ</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    }?>

                                </div>
                            </div>
                        </div>
                        <div class="clr"></div>
                        <a href="<?= Url::to(['products/list-products-type','type'=>Products::T_SANPHAMBANCHAY])?>" class="button btn-xem-tat-ca">Xem tất cả</a>
                    </div>
                    <div id="tab3" class="tab">
                        <div class="home-product-left">
                            <div class="product-item">
                                <?php
                                if(!empty($sanPhamNoiBatMoi)){ ?>
                                    <div class="product-box">
                                        <div class="product-img">
                                            <a href="<?= Url::to(['products/view','slug'=>$sanPhamNoiBatMoi->slug])?>">
                                                <?php
                                                if(!empty($sanPhamNoiBatMoi->avatar)){?>
                                                    <img class="lazy lazy-load" alt="<?= $sanPhamNoiBatMoi->avatar?>" data-original="<?= Yii::getAlias('@fakelink/products/'.$sanPhamNoiBatMoi->avatar)?>">
                                                <?php }else{?>
                                                    <img class="lazy lazy-load" data-original="https://via.placeholder.com/300x400" alt="avatar">
                                                <?php }
                                                ?>

                                            </a>
                                            <span class="icon-sale">-<?= $sanPhamNoiBatMoi->sale_number ?>%</span> <span class="icon-label">
                                            <img class="lazy lazy-load" src="/theme-v2/images/icon-new.png" alt="new">
                                        </span>
                                        </div>
                                        <div class="product-info">
                                            <h3 class="product-title"><a href="<?= Url::to(['products/view','slug'=>$sanPhamNoiBatMoi->slug])?>"><?= ucwords($sanPhamNoiBatMoi->full_name)?></a></h3>
                                            <div class="product-price">
                                                <p class="gia"><?= number_format($sanPhamNoiBatMoi->price)?>đ</p>
                                                <p class="gia-cu"><?= number_format($sanPhamNoiBatMoi->exp_price)?>đ</p>
                                            </div>
                                            <p class="product-excerpt">Thương hiệu : <?= $sanPhamNoiBatMoi->brandName->name ?><br>
                                                <?= $sanPhamNoiBatMoi->description ?><br>
                                                Bảo hành : <?= $sanPhamNoiBatMoi->guarantce ?> tháng</p>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="home-product-right">
                            <div class="product-list product-list-3">
                                <div class="row">
                                    <?php
                                    if(!empty($sanPhamMoi)){
                                        foreach($sanPhamMoi as $item){?>
                                            <div class="col-md-4 col-xs-6 product-item">
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        <a href="<?= Url::to(['products/view','slug'=>$item->slug])?>">
                                                            <?php
                                                            if(!empty($item->avatar)){?>
                                                                <img data-original="<?= Yii::getAlias('@fakelink/products/'.$item->avatar)?>" alt="<?= $item->avatar?>" class="lazy lazy-load -load"
                                                                     >
                                                            <?php }else{?>
                                                                <img class="lazy lazy-load" data-original="https://via.placeholder.com/300x400" alt="avatar">
                                                            <?php }
                                                            ?>
                                                        </a>
                                                        <span class="icon-sale">-<?= $item->sale_number ? $item->sale_number : '0'?>%</span> <span class="icon-label">
                                                    <img class="lazy lazy-load" src="/theme-v2/images/icon-new.png" alt="new">
                                                </span>
                                                    </div>
                                                    <div class="product-info">
                                                        <h3 class="product-title"><a
                                                                    href="#may-khoan-be-tong-gomes-gb-2603sre"><?= $item->full_name ? ucwords($item->full_name) : '0'?></a></h3>
                                                        <div class="product-price">
                                                            <p class="gia"><?= $item->price ? number_format($item->price) : '0'?>đ</p>
                                                            <p class="gia-cu"><?= $item->exp_price ? number_format($item->exp_price) : '0'?>đ</p>
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
                        <div class="clr"></div>
                        <a href="<?= Url::to(['products/list-products-type','type'=>Products::T_SANPHAMMOI])?>" class="button btn-xem-tat-ca">Xem tất cả</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if (!empty($listCat)){
            foreach($listCat as $listCats){ 
                $connection = Yii::$app->getDb();
                $command = $connection->createCommand("
                SELECT * from products where cat_id in(SELECT id FROM cat_products WHERE id= ".$listCats->id." or parent_id= ".$listCats->id.") ORDER BY RAND() LIMIT 8     
                ");
                
                $result = $command->queryAll();
                ?>
                <?php 
                if(!empty( $result)){?>
                        <div class="home-box home-box-product">
                            <div class="home-product-header">
                                <a href="<?= Url::to(['products/list-products-cat','slug'=>$listCats->slug]) ?>"><h2 class="home-box-title"><?= ucwords($listCats->name)?></h2></a>
                                <a href="<?= Url::to(['products/list-products-cat','slug'=>$listCats->slug]) ?>" class="btn-xem-tat-ca">Xem tất cả</a>
                                <div class="clr"></div>
                            </div>
                            <div class="home-product-body">
                                <div class="home-product-tax-left">
                                    <div class="home-product-tax-left-inner">
                                        <div class="home-product-tax-menu">
                                            <ul class="home-product-tax-scroll default-skin">
                                                
                                                <?php
                                                $listCatParents = \common\models\CatProducts::find()->where(['parent_id'=>$listCats->id])->all();
                                                if (!empty($listCatParents)){
                                                    foreach ($listCatParents as $listCatParent){?>
                                                        <li>
                                                            <a href="<?= Url::to(['products/list-products-cat','slug'=>$listCatParent->slug]) ?>"><?= ucwords($listCatParent->name)?></a>
                                                        </li>
                                                    <?php }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="home-product-tax-right">
                                    <div class="product-list">
                                        <div class="row">
                                            <?php
                                                // $itemCats = Products::find()->where(['cat_id'=>$listCats->id])->all();
                                                
                                            
                                                if(!empty($result)){
                                                    foreach ($result as $itemCat){ ?>
                                                        <div class="col-md-3 col-xs-6 product-item">
                                                            <div class="product-box">
                                                                <div class="product-img">
                                                                    <a href="<?= Url::to(['products/view','slug'=>$itemCat["slug"]]) ?>">
                                                                        <?php
                                                                        if(!empty($item->avatar)){?>
                                                                            <img data-original="<?= Yii::getAlias('@fakelink/products/'.$itemCat["avatar"])?>" alt="<?= $item->avatar?>" class="lazy lazy-load "
                                                                                >
                                                                        <?php }else{?>
                                                                            <img data-original="https://via.placeholder.com/300x400" alt="avatar">
                                                                        <?php }
                                                                        ?>
                                                                    </a>
                                                                    <span class="icon-sale">-<?= $itemCat["sale_number"] ?>%</span> <span class="icon-label">
                                                                    <img class="lazy-load lazy" src="/theme-v2/images/icon-new.png" alt="new">
                                                                </span>
                                                                </div>
                                                                <div class="product-info">
                                                                    <h3 class="product-title"><a href="<?= Url::to(['products/view','slug'=>$itemCat["slug"]]) ?>"><?= ucwords($itemCat["full_name"])?></a></h3>
                                                                    <div class="product-price">
                                                                        <p class="gia"><?= number_format($itemCat["price"])?>đ</p>
                                                                        <p class="gia-cu"><?= number_format($itemCat["exp_price"])?>đ</p>
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
                                <div class="clr"></div>
                            </div>
                        </div>
                <?php }
                ?>
                
            <?php }
        }
        ?>
    </div>
</section>
