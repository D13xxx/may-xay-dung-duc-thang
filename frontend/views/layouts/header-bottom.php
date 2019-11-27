<?php
use common\models\CatProducts;
use yii\helpers\Url;
$catProducts = CatProducts::find()->where(['parent_id'=>null])->orderBy(['sort'=>SORT_ASC])->all();
?>
<style>
    .search-box {
        width: 425px !important;
    }
    
</style>
<div class="header-bottom">
    <div class="container">
        <div class="fleft danh-muc-box">
            <div class="danh-muc-btn">Danh mục sản phẩm</div>
            <div class="danh-muc-menu"">
                <ul>
                    <?php
                    if (!empty($catProducts)){
                        foreach ($catProducts as $catProduct){ ?>
                            <li class=" li-parent">
                                <a href="<?= Url::to(['products/list-products-cat','slug'=>$catProduct->slug])?>" rel="category tag"><?= ucwords($catProduct->name) ?></a>
                                <ul class="sub-menu" style="min-height: 400px;">
                                    <?php
                                    $catProductParents = CatProducts::find()->where(['parent_id'=>$catProduct->id])->all();
                                    if (!empty($catProductParents)){
                                        foreach ($catProductParents as $catProductParent){ ?>
                                            <li class="">
                                                <a href="<?= Url::to(['products/list-products-cat','slug'=>$catProductParent->slug]) ?>" rel="category tag">
                                                    <span class="img">
                                                         <?php
                                                         if(!empty($catProductParent->avatar)){?>
                                                             <img src="<?= Yii::getAlias('@fakelink/cat-products/'.$catProductParent->avatar)?>" alt="<?= $catProductParent->avatar?>">
                                                         <?php }else{?>
                                                             <img src="https://via.placeholder.com/140x70" alt="avatar">
                                                         <?php }
                                                         ?>

                                                    </span>
                                                    <span class="text"><?= ucwords($catProductParent->name) ?></span>
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
        <div class="contact">
            <p class="header-address">
                <a href="#"><img src="/theme-v2/images/new-design/dia-chi.png" alt="dia-chi.png"> <span>170A Thạch Bàn, Long Biên, Hà Nội</span></a>
            </p>
            <p class="header-address">
                <a href="/"><img src="/theme-v2/images/new-design/sdt.png" alt="sdt.png"> <span>Hotline: 0985.650.880 | 0912.543.455</span></a>
            </p>
        </div>
    </div>
</div>