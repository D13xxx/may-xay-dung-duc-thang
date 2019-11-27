<?php
use common\models\Banner;
?>
<!-- nav menu   -->
<div class="banner_main">
    <div class="slider_banner owl-carousel owl-theme">
        <?php
        $banners = Banner::find()->where(['status'=>Banner::TT_ACTIVE])->all();
        foreach ($banners as $banner){?>
            <div class="item">
                <div class="banner">
                    <a href="<?= \yii\helpers\Url::to(['/articles','slug'=>$banner->slug])?>">
                        <img class="ispc" src="/theme/images/slide-banner.jpg" alt="">
                        <img class="ismb" src="/theme/images/banner-mb.jpg" alt="">
                    </a>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>
<!-- end header -->
