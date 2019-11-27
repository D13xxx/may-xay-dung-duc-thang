<?php 
use common\models\CatProducts;
use yii\helpers\Url;
use common\models\Products;
?>
<style>
a:hover{
    cursor: pointer;
}
.menu-bar-mobile {
    position: absolute;
    width: 300px;
    background: #fff;
    z-index: 9999999;
    box-shadow: 1px 0 1px #ccc;
    overflow-y: scroll;
    display: none;
}

.logo-menu {
    float: left;
    width: 100%;
    background: #fff;
    text-align: center;
}

.logo-menu img {
    width: 110px;
    margin-bottom: 15px;
    margin-top: 15px;
}

.menu-bar-lv-1 {
    float: left;
    width: 100%;
    position: relative;
}

.menu-bar-lv-1 a {
    float: left;
    width: 100%;
    text-align: left;
    height: 40px;
    line-height: 30px;
    background: #fff;
    margin-bottom: 1px;
    padding: 5px 15px;
    font-size: 14px;
    border-top: 1px solid #ebebeb;
}

.menu-bar-lv-1 a:hover {
    box-shadow: 0 0 2px #433;
}

.menu-bar-lv-1 span {
    position: absolute;
    right: 10px;
    top: 4px;
    width: 30px;
    height: 30px;
    font-size: 17px;
    text-align: center;
    padding-top: 9px;
    cursor: pointer;
    transition: all .5s ease-in-out 0s;
    -moz-transition: all .5s ease-in-out 0s;
    -o-transition: all .5s ease-in-out 0s;
    -webkit-transition: all .5s ease-in-out 0s;
    -ms-transition: all .5s ease-in-out 0s;
}

.menu-bar-lv-2,
.menu-bar-lv-2 a,
.menu-bar-lv-3,
.menu-bar-lv-3 a {
    position: relative;
    width: 100%;
    float: left;
}

.menu-bar-lv-2,
.menu-bar-lv-3 {
    display: none;
}

.menu-bar-lv-2 a {
    padding: 5px 15px;
}

.menu-bar-lv-2 i:last-child {
    margin-right: 7px;
}

.menu-bar-lv-3 a {
    padding: 5px 33px;
}

.rotate-menu {
    transform: rotate(180deg);
    top: 10px !important;
}

/* .menu-btn-show {
    position: absolute;
    width: 28px;
    height: 27px;
    float: left;
    margin-right: 15px;
    cursor: pointer;
    right: 24px;
    top: 130px;
    z-index: 9999;
} */

/* .menu-btn-show .border-style {
    width: 100%;
    height: 4px;
    background: #106d62;
    float: left;
    margin-bottom: 5px;
    border-radius: 10px;
    transition: all .5s ease-in-out 0s;
    -moz-transition: all .5s ease-in-out 0s;
    -o-transition: all .5s ease-in-out 0s;
    -webkit-transition: all .5s ease-in-out 0s;
    -ms-transition: all .5s ease-in-out 0s;
} */

/* .fixed-box .menu-btn-show .border-style {
    background: #707070;
} */

.box-login-logout {
    float: left;
    width: 100%;
    position: relative;
    background: #f9f9f9;
}

.boder-rotate {
    position: absolute;
    left: 50%;
    height: 40px;
    width: 1px;
    background: #ebebeb;
    transform: rotate(30deg);
}

.box-login-logout i {
    margin-right: 6px;
}

.box-login-logout .left {
    float: left;
    width: 50%;
    height: 40px;
    line-height: 40px;
    padding-left: 15px;
    font-size: 15px;
    border-top: 1px solid #ebebeb;
}

.shadow-open-menu {
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.51);
    z-index: 999;
    display: none;
}

.menu-btn-show.active .border-style {
    background: #fff;
    display: none;
}

.menu-btn-show.active .border-style:first-child {
    transform: rotate(42deg);
    margin-top: 5px;
    display: block;
}

.menu-btn-show.active .border-style:last-child {
    transform: rotate(-42deg);
    margin-top: -9px;
    display: block;
}

@media screen and (min-width: 992px) {
    .menu-btn-show {
        display: none;
    }
}

@media screen and (max-width: 992px) {
    .menu-btn-show {
        display: block;
        top: 77px;
    }

    .hide-mobile,
    .main-menu {
        display: none;
    }
}

@media screen and (max-width: 360px) {
    .menu-bar-mobile {
        width: 250px;
    }
}
</style>
<div class="header-top">
    <a href="<?= \yii\helpers\Url::to('/')?>">
        <img src="/theme-v2/images/new-design/logo-v2.png" alt="logo-v2.png">
    </a>
    <div class="main-menu-mobile">
        <div class="main-menu-left">
            <div class="menu-btn-show">
                <span class="border-style"></span>
                <span class="border-style"></span>
                <span class="border-style"></span>
            </div>
        </div>
        <div class="main-menu-right">
            <ul>
                <li>
                    <button id="btnSearch"><i class="fa fa-search" aria-hidden="true"></i></button>
                </li>
                <li>
                    <a href="<?= Url::to(['/products/add-cart-pro'])?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="search-box-pro">
        <form method="GET" action="<?= Url::to(['products/search'])?>" class="search-form">
            <input type="text" name="key" class="txt-search" autocomplete="on" placeholder="Tìm kiếm sản phẩm">
            <button type="submit" class="button btn-search">Tìm kiếm</button>
        </form>
    </div>
</div>

<?php 
$listCat = CatProducts::find()->where(['parent_id'=>null])->all();
?>

<!-- menu mobile -->
<div class="menu-bar-mobile" tabindex="-1">
    <?php 
    if(!empty($listCat )){
        foreach ($listCat  as $menu ) { ?>
            <div class="menu-bar-lv-1">
                <a class="a-lv-1" href="<?= Url::to(['products/list-products-cat','slug'=>$menu->slug])?>"><?= ucwords($menu->name)?></a>
                <div class="menu-bar-lv-2">
                    <?php 
                    $subMenus = CatProducts::find()->where(['parent_id'=>$menu->id])->all();
                    if(!empty($subMenus)){
                        foreach ($subMenus as $subMenu) { ?>
                        <a class="a-lv-2" href="<?= Url::to(['products/list-products-cat','slug'=>$menu->slug])?>"><i class="fa fa-minus" aria-hidden="true"></i><?= ucwords($subMenu->name)?></a>
                    <?php }
                    }
                    ?>
                </div>
                <span class="span-lv-1 fa fa-angle-down"></span>
            </div>
        <?php }
        }
    ?>
</div>
<!-- end menu mobile -->
<div class="shadow-open-menu"></div>

<!-- end menu mobile -->
