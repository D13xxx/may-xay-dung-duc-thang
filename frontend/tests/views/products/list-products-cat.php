<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = ($cat->title_seo !="")? $cat->title_seo : $cat->name;
\Yii::$app->view->registerMetaTag([
  'name' => 'title',
  'content' => ($cat->title_seo !="")? $cat->title_seo : $cat->name,
]);
\Yii::$app->view->registerMetaTag([
  'name' => 'description',
  'content' => ($cat->description_seo !="") ? $cat->description_seo :$cat->slug ,
]);

\Yii::$app->view->registerMetaTag([
  'name' => 'keywords',
  'content' => $cat->keyword_seo,
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'url',
    'content' => Url::to(['/products/list-products-cat','slug'=>$cat->slug]),
  ]);
  

$slug =  Yii::$app->getRequest()->getQueryParam('slug');
$code =  Yii::$app->getRequest()->getQueryParam('code');
$priceToPrice =  Yii::$app->getRequest()->getQueryParam('priceToPrice');
?>

<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<div class="breadcrumb-box">
    <div class="container">
        <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li><a href="<?= Url::to('/site/index')?>"><span>Trang chủ</span></a></li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemtype="https://schema.org/Thing" itemprop="item" href="<?= Url::to(['products/list-products-cat','slug'=>$cat->slug])?>"><span itemprop="name"><?= ucwords($cat->name)?></span></a>
                <meta itemprop="position" content="1">
            </li>
        </ul>
    </div>
</div>


<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="product-tax-header">
                <h1 class="page-title"><?= $cat->name?></h1>
                <div class="sort-box">
                    <div class="sort-select">
                        <span>sắp xếp theo</span>
                        <ul>
                            <li><a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'sort'=>'new'])?>" rel="nofollow">Mới nhất</a></li>
                            <li><a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'sort'=>'old'])?>" rel="nofollow">Cũ nhất</a></li>
                            <li><a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'sort'=>'price-asc'])?>" rel="nofollow">Giá tăng dần</a></li>
                            <li><a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'sort'=>'price-desc'])?>" rel="nofollow">Giá giảm dần</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clr">

                </div>
            </div>
            <div class="product-list">
                <div class="row">
                    <?php
                    if (!empty($models)){
                        foreach ($models as $model){ ?>
                            <div class="col-md-3 col-xs-6 product-item">
                                <div class="product-box">
                                    <div class="product-img">
                                        <a href="<?= Url::to(['products/view','slug'=>$model->slug])?>">
                                            <?php
                                            if(!empty($model->avatar)){?>
                                                <img src="<?= Yii::getAlias('@fakelink/products/'.$model->avatar)?>" class="lazy-load"
                                                     style="display: block;">
                                            <?php }else{?>
                                                <img src="https://via.placeholder.com/200x200" alt="avatar">
                                            <?php }
                                            ?>
                                        </a>
                                        <span class="icon-sale">-<?= $model->sale_number ?>%</span> <span class="icon-label">
                                            <img src="/theme-v2/images/icon-new.png">
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
            <?=
            LinkPager::widget([
                'pagination' => $pages,
            ]);
            ?>
<!--            <div class="pagination">-->
<!--                <span> 1 </span>-->
<!--                <a href="https://http://dienmaythanhloi.com/may-khoan-ban-vit?page=2"> 2 </a>-->
<!--                <a href="https://http://dienmaythanhloi.com/may-khoan-ban-vit?page=3"> 3 </a>-->
<!--                <a href="https://http://dienmaythanhloi.com/may-khoan-ban-vit?page=2">»</a>-->
<!--            </div>-->
        </div>
        <div class="sidebar">
            <div class="sidebar-widget widget-product-filter">
                <p class="widget-title">lọc sản phẩm theo</p>
                <div class="widget-sub filter-menu">
                    <ul>
                        <li>
                            <a>thương hiệu dcct</a>
                            <ul class="filter-scroll default-skin scrollable" tabindex="-1">
                                <div class="scroll-bar vertical" style="height: 253px; display: block;">
                                    <div class="thumb" style="top: 0px; height: 179.801px;">

                                    </div>
                                </div>
                                <div class="viewport" style="height: 253px; width: 208px;">
                                    <div class="overview" style="top: 0px; left: 0px;">
                                        <?php
                                            if(!empty($brands)){
                                                foreach ($brands as $brand){ ?>
                                                    <li>
                                                        <a href="<?= Url::to(['products/list-products-cat','code'=>$brand->code,'slug'=>$slug])?>" class="<?= $brand->code == $code ? 'active' : ''
                                                        ?>"><?= ucwords($brand->name)?></a>
                                                    </li>
                                                <?php }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="scroll-bar horizontal" style="width: 207px; display: none;">
                                    <div class="thumb" style="left: 0px; width: 510.107px;">

                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li>
                            <a>khoảng giá</a>
                            <ul class="filter-scroll default-skin">
                                <li>
                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'priceToPrice'=>'duoi-1-trieu'])?>" class="<?= $priceToPrice == 'duoi-1-trieu' ? 'active' : ''
                                    ?>">dưới 1 triệu</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'priceToPrice'=>'tu-1-trieu-den-3-trieu'])?>" class="<?= $priceToPrice == 'tu-1-trieu-den-3-trieu' ? 'active' : ''
                                    ?>">từ 1 triệu đến 3
                                        triệu</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'priceToPrice'=>'tu-3-trieu-den-5-trieu'])?>" class="<?= $priceToPrice == 'tu-3-trieu-den-5-trieu' ? 'active' : ''
                                    ?>">từ 3 triệu đến 5
                                        triệu</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'priceToPrice'=>'tu-5-trieu-den-10-trieu'])?>" class="<?= $priceToPrice == 'tu-5-trieu-den-10-trieu' ? 'active' : ''
                                    ?>">từ 5 triệu đến 10
                                        triệu</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'priceToPrice'=>'tu-10-trieu-den-15-trieu'])?>" class="<?= $priceToPrice == 'tu-10-trieu-den-15-trieu' ? 'active' : ''
                                    ?>">từ 10 triệu đến 15
                                        triệu</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'priceToPrice'=>'tu-15-trieu-den-20-trieu'])?>" class="<?= $priceToPrice == 'tu-15-trieu-den-20-trieu' ? 'active' : ''
                                    ?>">từ 15 triệu đến 20
                                        triệu</a>
                                </li>
                                <li>
                                    <a href="<?= Url::to(['products/list-products-cat','slug'=>$slug,'priceToPrice'=>'tren-20-trieu'])?>" class="<?= $priceToPrice == 'tren-20-trieu' ? 'active' : ''
                                    ?>">trên 20 triệu</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>