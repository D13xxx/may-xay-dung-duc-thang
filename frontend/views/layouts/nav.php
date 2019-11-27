<?php
use yii\helpers\Url;
?>
<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= Url::to('/site/index')?>"><img src="/theme/images/logo.png?v=2" alt="logo.png"></a>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    SẢN PHẨM
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    $cats = \common\models\CatInsurrances::find()->all();
                    if (!empty($cats)){
                        foreach ($cats as $cat){?>
                            <a class="dropdown-item" href="<?= Url::to(['/products/list-products','code'=>$cat->code]) ?>"><?= ucwords($cat->name)?></a>
                        <?php }
                    }
                    ?>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link  <?=(Yii::$app->controller->action->id=='hop-dong'?'active':'')?>" href="#">HỢP ĐỒNG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?=(Yii::$app->controller->id=='offset'?'active':'')?>" href="<?= Url::to(['/offset/index']) ?>">BỒI THƯỜNG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=(Yii::$app->controller->action->id=='about-us'?'active':'')?>" href="<?= Url::to('/site/about-us')?>">VỀ CHÚNG TÔI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?=(Yii::$app->controller->action->id=='list-articles'?'active':'')?>" href="<?= Url::to('/articles/list-articles')?>">GÓC CHUYÊN GIA</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <div class="phone_header">
                <a href="tel:18001091">
                    <img class="ispc" src="/theme/images/icon-cell-phone.jpg" alt="icon-cell-phone.jpg">
                    <img class="ismb" src="/theme/images/icon-cell-phone-mb.jpg" alt="icon-cell-phone-mb.jpg">
                    <span>18001091</span>
                </a>
            </div>
            <div class="login_header">
                <a href="tel:18001091">
                    <img src="/theme/images/icon-user.jpg" alt="icon-user.jpg">
                    <span>Đăng nhập</span>
                </a>
            </div>
        </div>
    </div>
</nav>
