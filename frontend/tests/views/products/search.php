<?php

use yii\widgets\LinkPager;

?>
<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <h1 class="page-title text-center">Kết quả tìm kiếm với từ khóa "<?= $key?>":</h1>
        <div class="product-list product-list-5">
            <div class="row">
                <?php
                if (!empty($data)){
                    foreach ($data as $item){ ?>
                        <div class="col-md-3 col-xs-6 product-item">
                            <div class="product-box">
                                <div class="product-img">
                                    <a href="<?= \yii\helpers\Url::to(['products/view','slug'=>$item->slug])?>">
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
                                    <h3 class="product-title"><a href="<?= \yii\helpers\Url::to(['products/view','slug'=>$item->slug])?>">
                                            <?= ucwords($item->full_name)?>
                                        </a></h3>
                                    <div class="product-price">
                                        <p class="gia"><?= number_format($item->price)?>đ</p>
                                        <p class="gia-cu"><?= number_format($item->exp_price)?>đ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }else{?>
                    <p class="page-title text-center">Không tìm thấy kết quả. Vui lòng thử lại!</p>
                <?php }
                ?>
            </div>
        </div>
        <?=
        LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
    </div>
</section>