<div class="header-center">
    <div class="container">
        <div class="fleft logo">
            <a href="<?= \yii\helpers\Url::to('/site/index')?>">
                <img src="/theme-v2/img/logo.png" alt="">
            </a>
        </div>
        <div class="fleft header-info">

            <p class="header-address">
                <a href="<?= \yii\helpers\Url::to('/site/he-thong-showroom') ?>"><span>170A Thạch Bàn,Long Biên, Hà Nội</span></a>
                <font>0985.650.880 | 0912.543.455</font>
            </p>
            <p class="header-hotline">
                <span>Hotline</span>
                <font>0985.650.880 | 0912.543.455</font>
            </p>
        </div>
        <div class="fright cart-mini-box">
            <a href="<?= \yii\helpers\Url::to(['products/add-cart-pro'])?>" class="cart-mini">
                <font></font>

                <span>
                    <?php

                    $session = Yii::$app->session;
                    $temp = $session['cart'];
//                    var_dump($temp); die;
                    echo $count = count($temp);
                    ?></span>
                <font>Giỏ hàng</font>
            </a>
        </div>
    </div>
</div>